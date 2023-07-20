<?php

namespace App\Http\Controllers;
use App\User;
use App\Transaction;
use App\Interviews;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
use App\Traits\EmailTrait;


class PagesController extends Controller
{
    use EmailTrait;
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        $user = User::count();
        $interview = 0;
        $total_transaction = Transaction::count();
        $total_amount_invested = User::SUM('invested_amount');
        $users = User::all();
        $total_amount_invested = 0;
        foreach($users as $u){
            if($u->package_id == 1 && $u->is_payment_done == 1){
                $total_amount_invested += $u->invested_amount;
            }else if($u->package_id == 2 && $u->is_deposit_payment_done == 1 && $u->is_payment_done == 0){
                $total_amount_invested += 10000;
            }else if($u->package_id == 2 && $u->is_deposit_payment_done == 1 && $u->is_payment_done == 1){
                $total_amount_invested += $u->invested_amount;
            }

        }
        return view('admin.app', compact('page_title', 'page_description','user','interview','total_transaction','total_amount_invested'));
    }

    public function send_document_link(Request $request){
        $user = User::where('reference_id', $request->user)->firstOrFail();
        \Session::put('user_id', $user->id);
        $url = "https://demo.docusign.net/Member/PowerFormSigning.aspx?PowerFormId=b1a788a0-f0e7-4c99-bbbb-33bfd3fbb8cd&env=demo&acct=d069fc45-6eb6-4652-9692-58f9bc019296&v=2&Signer_Email=$user->email&Signer_UserName=$user->name";
        return redirect($url);
    }

    public function thankyou(Request $request)
    {
        
        $user_id = Session::get('user_id');
        $user = User::findOrFail($user_id);
        $amountToCharage = 0;

        if($user->package_id == 2 && $user->is_signed_deposit_doc == 0){
            $user->is_signed_deposit_doc = 1;
            $amountToCharage = 10000;
        }elseif($user->package_id == 2 && $user->is_signed_doc == 0 ){
            $user->is_signed_doc = 1;
            $amountToCharage = $user->invested_amount - 10000;
        }else{
            $user->is_signed_doc = 1;
            $amountToCharage = $user->invested_amount;
        }
        // $amountToCharage *= 100;
        $user->save();
        return view('front.payment', compact('user','amountToCharage'));
    }


    public function submitPayment(Request $request)
    {
        try {
            DB::beginTransaction();
            $redirectUrl = '';
            $post_data =  json_decode($request->data,true);
            $user_details = json_decode($post_data['user_details'],true);
            $user = User::findOrFail($user_details['id']);
            if($user->package_id == 2 && $user->is_deposit_payment_done == 0){
                $user->is_deposit_payment_done = 1;
                $redirectUrl = route('deposit-successfull');
            }else{
                $user->is_payment_done = 1;
                $redirectUrl = route('payment-successfull');
            }
            $user->save();
            $transaction = new Transaction();
            $transaction->user_id = $user_details['id'];
            $transaction->type = 'capture';
            $transaction->details = json_encode($post_data['payment_details']);
            $transaction->save();
            DB::commit();
            
            
            $this->sendMail(['name' => $user['name'], 'user_email' => $user['email'], 'phone_number' => $user['phone'] , 'email' => $user['email'], 'subject' => 'Payment Successfull', 'reference_number' => $user['reference_id']], 'emails.order');
            return response()->json(['status'=>200, 'message'  => 'success','redirect_url' => $redirectUrl]);
            
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json(['status'=>500, 'message'  => $th->getMessage() ]);
        }
    }

    public function sendInterviewInvitation($user_id){
        $user = User::findOrFail($user_id);
        return view('admin.users.send-interview-invitation', compact('user'));
    }

    public function submitInterviewInvitation(Request $request){
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'link' => 'required',
            'user_id' => 'required',
        ]);
        try {
            DB::beginTransaction();

            $user = User::findOrFail($request->user_id);
            $user->interview_link_send = 1;
            $user->save();


            $interview = new Interviews();
            $interview->date    = $request->date;
            $interview->user_id = $request->user_id;
            $interview->time    = $request->time;
            $interview->link    = $request->link;
            $interview->save();

            $this->sendMail(['name' => $user->name ,'date' =>  $interview->date, 'time' => $interview->time, 'link' => $interview->link , 'email' => $user->email, 'subject' => 'Interview Invitation'], 'emails.interview-invitation');
            
            $notification = array(
                'message' => 'Form Submitted Successfully!',
                'alert-type' => 'success'
            );
            DB::commit();

            
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            
            DB::rollback();            
        }
        return redirect()->route('users')->with($notification);
    }

    public function payment_successfull(){
        return view('front.payment-successfull');
    }



    public function deposit_successfull(){
        return view('front.deposit-successfull');
    }

    public function interviews(){
        $interviews = Interviews::all();
        return view('admin.users.interviews',compact('interviews'));
    }

    public function interview_status($interview_id, $status){

        try {
            DB::beginTransaction();

            $interview = Interviews::findOrFail($interview_id);
            $interview->status = $status;
            $interview->save();

            $user = User::findOrFail($interview->user_id);
            $user->is_interview_done = 1;
            $user->save();
            if($status == 'pass'){
                $this->sendMail(['name' => $user->name ,'route' =>  route('send-document-link',['user' => $user->reference_id]), 'email' => $user->email, 'subject' => 'Interview Result And Payment Link'], 'emails.interview-result');
            }
            $notification = array(
                'message' => 'Result Saved Successfully!',
                'alert-type' => 'success'
            );
            DB::commit();

            
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            
            DB::rollback();            
        }
        return redirect()->back()->with($notification);
        
    }


    public function faqs(){
        return view('front.faqs');
    }

    public function privacy_policy(){
        return view('front.privacy-policy');
    }

    public function terms_and_conditions(){
        return view('front.terms-and-conditions');
    }


    /**
     * Demo methods below
     */

    // Datatables
    public function datatables()
    {
        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('pages.datatables', compact('page_title', 'page_description'));
    }

    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // Select2
    public function select2()
    {
        $page_title = 'Select 2';
        $page_description = 'This is Select2 test page';

        return view('pages.select2', compact('page_title', 'page_description'));
    }

    // custom-icons
    public function customIcons()
    {
        $page_title = 'customIcons';
        $page_description = 'This is customIcons test page';

        return view('pages.icons.custom-icons', compact('page_title', 'page_description'));
    }

    // flaticon
    public function flaticon()
    {
        $page_title = 'flaticon';
        $page_description = 'This is flaticon test page';

        return view('pages.icons.flaticon', compact('page_title', 'page_description'));
    }

    // fontawesome
    public function fontawesome()
    {
        $page_title = 'fontawesome';
        $page_description = 'This is fontawesome test page';

        return view('pages.icons.fontawesome', compact('page_title', 'page_description'));
    }

    // lineawesome
    public function lineawesome()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';

        return view('pages.icons.lineawesome', compact('page_title', 'page_description'));
    }

    // socicons
    public function socicons()
    {
        $page_title = 'socicons';
        $page_description = 'This is socicons test page';

        return view('pages.icons.socicons', compact('page_title', 'page_description'));
    }

    // svg
    public function svg()
    {
        $page_title = 'svg';
        $page_description = 'This is svg test page';

        return view('pages.icons.svg', compact('page_title', 'page_description'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }
}
