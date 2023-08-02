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
        
        try {

            // if($request->hasFile('passport'))
            {
                    $image = $request->passport;
                    $imgName = rand() . '_' . time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('course_photos');
                    $imagePath = $destinationPath . "/" . $imgName;
                    $image->move($destinationPath, $imgName);
                    $path = basename($imagePath);
                    $image = 'course_photos/'.$path;
            }

            if($request->hasFile('image'))
            {
                    $profileImage = $request->image;
                    $imgName = rand() . '_' . time() . '.' . $profileImage->getClientOriginalExtension();
                    $destinationPath = public_path('course_photos');
                    $imagePath = $destinationPath . "/" . $imgName;
                    $profileImage->move($destinationPath, $imgName);
                    $path = basename($imagePath);
                    $profileImage = 'course_photos/'.$path;
            }

            DB::beginTransaction();
            
            $user = new User;
            $user->role_id = 2;
            $user->name = $request->name ?? null;
            $user->email = $request->email ?? null;
            $user->password = isset($request->password) ? Hash::make($request->password) : null;
            $user->phone = $request->phone ?? null;
            $user->emirates_id = $request->emirates_id ?? null;
            $user->passport = $request->hasFile('passport') ? $image : null;
            $user->image = $request->hasFile('image') ? $profileImage : null;
            $user->save();

            DB::commit();

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
