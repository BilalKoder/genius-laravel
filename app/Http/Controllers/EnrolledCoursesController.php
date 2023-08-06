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
use Illuminate\Http\Request;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use DB;
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
            DB::beginTransaction();
            $course = new EnrolledCourses;
            $course->course_id = $request->courseId;
            $course->user_id = auth()->user()->id;
            $course->name = $request->name;
            $course->email = $request->email;
            $course->phone = $request->phone;
            $course->address = $request->address;
            $course->save();

            $course = Courses::find($request->courseId);

            $this->enrolledCourse(['name' => auth()->user()->name, 'email' => auth()->user()->email, 'course' => $course->title], 'emails.enroll');

            DB::commit();
            return response()->json(["Success"], 200);

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([$th->getMessage()], 500);
        }
    }
}
