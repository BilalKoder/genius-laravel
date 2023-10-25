<?php

namespace App\Http\Controllers;

use App\EnrolledCourses;
use Carbon\Carbon;
use App\User;
use App\Courses;
use App\Blogs;
use App\BlogCategories;
use App\CourseCategories;
use App\Categories;
use App\Transaction;
use Illuminate\Http\Request;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use DB;
use Stripe\Stripe;
use Illuminate\Support\Facades\Hash;

class EnrolledCoursesController extends Controller
{
    use EmailTrait;

    public function index(Request $request) {

        $query = EnrolledCourses::query();

            if ($request->has('user')) {
                $userId = $request->input('user');
                $query->where('user_id', $userId);
            }

            if ($request->has('courses')) {
                $courseId = $request->input('courses');
                $query->where('course_id', $courseId);
            }

             if(auth()->user()->role->id != 1){
                $query->where('user_id',auth()->user()->id);
            }
        

        $data['enrolled'] = $query->orderBy('id', 'DESC')->get();

        $data['users'] = User::where('role_id', '!=', 1)->get();
        $data['courses'] = Courses::with('categories')->orderBy('id','DESC')->get();;
        $data['page_title'] = "Enrolled Courses";

        return view('admin.enrolled.list',$data);
    }
    public function enrollCourseAjax(Request $request)
    {
        try {
            $course_details = Courses::findOrFail($request->courseId);
            
            DB::beginTransaction();
            $course = new EnrolledCourses;
            $course->course_id  = $course_details->id;
            $course->user_id    = auth()->user()->id;
            $course->name       = auth()->user()->name;
            $course->email      = auth()->user()->email;
            $course->phone      = auth()->user()->phone;
            $course->address    = auth()->user()->address;
            $course->save();

            $stripe = new Stripe;
            $stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $payment_intent = \Stripe\PaymentIntent::create([
                'amount' => ($course_details->sale_price??$course_details->price)*100,
                'currency' => 'usd',
                // 'customer' => $user->stripe_id,
                'payment_method' => $request->payment_method,
                'off_session' => true,
                'confirm' => true,
            ]);
                            
            $transaction                = new Transaction;
            $transaction->user_id       = auth()->user()->id;
            // $transaction->course_id     = $course_details->id;
            $transaction->type          = 'transaction';
            $transaction->details       = json_encode($payment_intent);
            // $transaction->registeration_id = $course->id;
            $transaction->save();

            $course = Courses::find($request->courseId);

            // $this->enrolledCourse(['name' => auth()->user()->name, 'email' => auth()->user()->email, 'course' => $course->title], 'emails.enroll');

            DB::commit();
            return response()->json(["Success"], 200);

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([$th->getMessage()], 500);
        }
    }
}
