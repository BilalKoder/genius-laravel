<?php

namespace App\Http\Controllers;

use App\Blogs;
use App\CourseCategories;
use App\Courses;
use App\Categories;
use App\Faqs;
use Carbon\Carbon;
use App\User;
use App\Advertisement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['page_title'] = 'Home';
        $data['courses'] = Courses::where('status',1)->limit(4)->get();
        $data['blogs'] = Blogs::where('status',1)->limit(2)->get();
        $data['faqs'] = Faqs::limit(4)->get();
        return view('front.home',$data);
    }
    
    public function learning(Request $request)
    {
        $data['page_title'] = 'Learning';

        $query = Courses::query();

            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where('title', 'like', "%$searchTerm%");
            }

            if ($request->has('category')) {
                $categoryId = $request->input('category');
                $blogIds = CourseCategories::where('category_id', $categoryId)->pluck('course_id');
                $query->whereIn('id', $blogIds);
            }

            $query->where('status',1);

        $data['courses'] = $query->orderBy('id', 'DESC')->get();

        $data['categories'] = Categories::where('type', "COURSES")->orderBy('id', 'DESC')->get();
        return view('front.learning',$data);
    }

    public function courseDetail($id){
        // Store the course ID in the session or cookie
        $course = Courses::where('id',$id)->first();
        // if (auth()->check()) {
        //     // For authenticated users, you can store the course ID in the session
        //     session()->push('recently_viewed_courses', $id);
        // } else {
        //     // For unauthorized users, you can store the course ID in a cookie
        //     $recentlyViewedCourses = request()->cookie('recently_viewed_courses', []);
        //     $recentlyViewedCourses[] = $id;
        //     cookie()->queue('recently_viewed_courses', $recentlyViewedCourses, 1440); // 1440 minutes = 24 hours
        // }

        $data = [
            'course' => $course,
            'page_title' => $course->meta_title??'',
            // 'categories' => $categories,
            'meta_description' =>  $course->meta_description??''
        ];

        return view('front.learning-detail',$data);
    }

    public function knowYourCustomer($package_id = null){
        $data['package_id'] = $package_id;
        return view('front.know-your-customer',$data);
    }
    
    public function landing()
    {
        return view('landing');
    }
}
