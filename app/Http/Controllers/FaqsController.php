<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use DB;
use App\Faqs;

class FaqsController extends Controller
{
    use EmailTrait;
    use SlugTrait;
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faqs'] = Faqs::orderBy('id','DESC')->get();
        $data['page_title'] = "FAQ's";

        return view('admin.faq.list',$data);
    }
   
    public function fronFaq()
    {
        $data['faqs'] = Faqs::orderBy('id','DESC')->get();
        $data['page_title'] = "FAQ's";

        return view('front.faqs',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Add FAQ's";
        $data['faq'] = new Faqs;
        return view('admin.faq.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]); 
       
        $input = $request->all();

        try {

            DB::beginTransaction();
      
            $category = new Faqs;
            $category->question = $input['question']??'';
            $category->answer = $input['answer']??'';
            $category->save();

            DB::commit();

            $notification = array(
                'message' => 'Form Submitted Successfully!',
                'alert-type' => 'success'
            );


        } catch (\Throwable $th) {
           
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            
            DB::rollback();

        }
       
        return redirect('admin/faqs')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['page_title'] = "Edit FAQ";
        $data['faq'] = Faqs::findOrFail($id);
        return view('admin.faq.form',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$faq)
    {
        //
        $faq = Faqs::where('id',$faq)->first();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        $notification = array(
            'message' => 'FAQs Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect('admin/faqs')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faqs $id)
    {
        $id->delete();
        $notification = array(
            'message' => 'FAQs deleted!',
            'alert-type' => 'success'
        );
        return redirect('faqs')->with($notification);
    }
}
