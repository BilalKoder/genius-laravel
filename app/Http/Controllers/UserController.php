<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
use App\Country;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Session;
use Illuminate\Validation\Validator;

class UserController extends Controller
{
    use EmailTrait;
    use SlugTrait;
    use UploadTrait;


    public function index()
    {
        $data['users'] = User::where('role_id', '!=', 1)->get();
        $data['page_title'] = "Users";
        $data['countries'] = Country::all();
        return view('admin.users.list', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['countries'] = Country::all();
        return view('admin.users.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitForm(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'invested_amount' => 'required',
            'passport_number' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'document_image' => 'image|mimes:jpeg,png,jpg,svg,jfif|max:2048',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make("click123");
        $input['reference_id'] = Str::random(26, 'alphaNum');
        $input['image'] = "";

        try {

            DB::beginTransaction();

            if ($request->hasFile('document_image')) {

                $image = $request->file('document_image');

                //store Image to directory
                $imgName = rand() . '_' . time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('uploads/documents/');
                $imagePath = $destinationPath . "/" . $imgName;
                $image->move($destinationPath, $imgName);
                $path = basename($imagePath);
                $input['image'] = 'uploads/documents/' . $path;
            }

            $user = new User;
            $user->name = $input['name'] ?? '';
            $user->email = $input['email'] ?? '';
            $user->password = $input['password'] ?? '';
            $user->reference_id = $input['reference_id'] ?? '';
            $user->passport_number = $input['passport_number'] ?? '';
            $user->invested_amount = $input['invested_amount'] ?? '';
            $user->phone = $input['phone'] ?? '';
            $user->address = $input['address'] ?? '';
            $user->city = $input['city'] ?? '';
            $user->state = $input['state'] ?? '';
            $user->country = $input['country'] ?? '';
            $user->document_image = $input['image'] ?? '';
            $user->package_id = $input['package_id'] ?? 1;
            $user->save();
            // $response = new Response('Set Cookie');
            // $response->withCookie(cookie('user_id', $user->id, 100000));
            \Session::put('user_id', $user->id);
            // dd( $response)
            DB::commit();

            $notification = array(
                'message' => 'Form Submitted Successfully!',
                'alert-type' => 'success'
            );
            if ($user->package_id == 1) {
                $url = "https://demo.docusign.net/Member/PowerFormSigning.aspx?PowerFormId=b1a788a0-f0e7-4c99-bbbb-33bfd3fbb8cd&env=demo&acct=d069fc45-6eb6-4652-9692-58f9bc019296&v=2&Signer_Email=$request->email&Signer_UserName=$request->name";
            } else if ($user->package_id == 2) {
                //user other form for this (Deposit Document)
                $url = "https://demo.docusign.net/Member/PowerFormSigning.aspx?PowerFormId=b1a788a0-f0e7-4c99-bbbb-33bfd3fbb8cd&env=demo&acct=d069fc45-6eb6-4652-9692-58f9bc019296&v=2&Signer_Email=$request->email&Signer_UserName=$request->name";
            }



            DB::commit();

        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );

            DB::rollback();

            return redirect()->back()->with($notification);
        }

        return redirect($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::where('id', $id)->first();
        $data['roles'] = Role::all();
        $data['countries'] = Country::all();
        return view('admin.users.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $input = $request->all();
        $input['image'] = isset($input['profile_avatar']) ? $input['profile_avatar'] : null;
        if ($request->password !== null)
            $input['password'] = Hash::make($input['password']);
        else
            unset($input['password']);
        unset($input['profile_avatar_remove'], $input['_token'], $input['cpassword'], $input['profile_avatar']);
        try {
            DB::beginTransaction();
            if ($input['image'] != null) {
                $input['image'] = $this->uploadImageUpdate($input['image'], $user, '/uploads/users/', 'public');

            } else {
                $input['image'] = $user->image;
            }
            $user = $user->update($input);
            if ($request->password !== null) {
                $this->sendMail(['name' => $request->name, 'email' => $request->email, 'password' => $request->password], 'emails.userupdate');
            }
            $notification = array(
                'message' => 'User updated!',
                'alert-type' => 'success'
            );
            DB::commit();
        } catch (\Throwable $th) {
            $notification = array(
                'message' => $th->getMessage(),
                'alert-type' => 'error'
            );
            DB::rollback();
            return redirect()->back()->with($notification);
        }
        if (Auth::user()->role->slug == 'admin') {
            if ($request->role_id == 2 || $request->role_id == 3) {
                $redirect = '/users';
            }
            if ($request->role_id == 4) {
                $redirect = '/users/million-member';
            }
            if ($request->role_id == 5) {
                $redirect = '/users/team';
            }
        } else {
            $redirect = '/dashboard';
        }

        return redirect($redirect)->with($notification);
    }

    public function loginAjax(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json("Email does not exist!", 400);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json("Incorrect Password!", 400);
        }
        if (Auth::user() === null) {
            Auth::loginUsingId($user->id);
        }
        return response()->json("Successfully Logged In !", 200);

    }
    public function registerAjax(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = new User;
            $user->role_id = 2;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            // $user->identity_token = Str::random(12, 'alphaNum');
            $user->save();
            DB::commit();
            // $this->sendMail(['name' => $request->name, 'email' => $request->email, 'password' => $request->password, 'role' => $user->role->slug], 'emails.basic-register');
            if (Auth::user() === null) {
                Auth::loginUsingId($user->id);
            }

            return response()->json(["Success"], 200);

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([$th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $notification = array(
            'message' => 'User deleted!',
            'alert-type' => 'success'
        );
        return redirect('users')->with($notification);
    }

    public function checkIfUserExist(Request $request)
    {
        // dump($request->all());
        $result = User::where('email', $request->email)->first();
        if ($result)
            return response()->json(200);
        else
            return response()->json(404);
    }
}