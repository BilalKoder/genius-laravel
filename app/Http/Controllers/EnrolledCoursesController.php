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

    public function index() {

        if(auth()->user()->role->id === 1){
            $data['enrolled'] = EnrolledCourses::orderBy('id','DESC')->get();
        }else{
            $data['enrolled'] = EnrolledCourses::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
        }
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
            DB::commit();
            return response()->json(["Success"], 200);

        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([$th->getMessage()], 500);
        }
    }
}
