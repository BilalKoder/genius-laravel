<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;
use App\Traits\EmailTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class MyAuthController extends Controller
{
    use EmailTrait;

    public function login(){
        $data['title'] = 'Login | Management Consultants';
        return view('auth.login', $data);
    }

    public function register(){
        // dd('a');
        $data['title'] = 'Register | RHMC';
        // $data['roles'] = Role::where('id', '!=', 1)->get();
        return view('auth.basic-register', $data);
    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|same:cpassword',

        ]); 
        
        // dd($request->all());
        try {
            DB::beginTransaction();
            $user = new User;
            $user->role_id = 2;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // $user->identity_token = Str::random(12, 'alphaNum');
            $user->save();
            DB::commit();
            // $this->sendMail(['name' => $request->name, 'email' => $request->email, 'password' => $request->password, 'role' => $user->role->slug], 'emails.basic-register');
            if(Auth::user() === null){
                Auth::loginUsingId($user->id);    
            }
            
            $notification = array(
                'message' => 'Registered Successfully',
                'alert-type' => 'success'
            );
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            $notification = array(
                'message' => 'Some error occured',
                'alert-type' => 'error'
            );
            $redirect = 'register';
            return redirect()->back()->with($notification);
        }
        return redirect('/admin/dashboard')->with($notification);
    }
}
