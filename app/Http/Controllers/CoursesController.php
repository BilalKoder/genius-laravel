<?php

namespace App\Http\Controllers;

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
class CoursesController extends Controller
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
        $data['courses'] = Courses::with('categories')->orderBy('id','DESC')->get();
        $data['page_title'] = "Courses";

        return view('admin.courses.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Add Blogs";
        $data['course'] = new Courses;
        $data['categories'] = Categories::where('type',"COURSES")->get();
        return view('admin.courses.form',$data);
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
            'title' => 'required'
        ]); 

        // $includesArray = [];
        // dd($request->includes);

        $includesArray = [];

        foreach ($request->includes as $key => $value) {
            $decodedValue = json_decode($value, true);
            foreach ($decodedValue as $item) {
                $includesArray[] = $item['value'];
            }
        }
        
        $languagesArray = [];

        foreach ($request->languages as $key => $value) {
            $decodedValue = json_decode($value, true);
            foreach ($decodedValue as $item) {
                $languagesArray[] = $item['value'];
            }
        }
        
        // dd($languagesArray);
        
       
            $input = $request->all();
            $input['media'] = isset($input['profile_avatar'])?$input['profile_avatar']:null;
            unset($input['profile_avatar_remove'], $input['_token'], $input['profile_avatar']);
      
            try {
                DB::beginTransaction();
                if($input['media'] != null)
                {
                    // $input['media'] = $this->uploadImage($input['media'], $input['name'] , '/uploads/courses/', 'public');
                        $image = $input['media'];
        
                            //store Image to directory
                            $imgName = rand() . '_' . time() . '.' . $image->getClientOriginalExtension();
                            $destinationPath = public_path('course_photos');
                            $imagePath = $destinationPath . "/" . $imgName;
                            $image->move($destinationPath, $imgName);
                            $path = basename($imagePath);
                            $input['media'] = 'course_photos/'.$path;
                    
                }
                else{
                    $input['media'] = '';
                }
                // dd($request->categories);
                $input['slug'] = $this->slugify($input['title']);
                $input['includes'] = json_encode($includesArray);
                $input['languages'] = json_encode($languagesArray);
                $input['created_by'] = auth()->user()->id;
                $course = Courses::create($input);
                
                $categories = $request->categories;
                if(count($categories) > 0){
                    foreach($categories as $value){
                        $category = new CourseCategories();
                        $category->course_id = $course->id;
                        $category->category_id = $value;
                        $category->save();
                    }
                }

            DB::commit();

            $notification = array(
                'message' => 'Form Submitted Successfully!',
                'alert-type' => 'success'
            );


        } catch (\Throwable $th) {
            // dd($th->getMessage());

           
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            
            DB::rollback();

        }
       
        return redirect('/admin/courses')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['page_title'] = "Edit Blogs";
        $data['course'] = Courses::findOrFail($id);
        // dd(json_decode($data['course']->includes));
        $data['categories'] = Categories::where('type',"COURSES")->get();
        return view('admin.courses.form',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$course)
    {
        
        $courses = Courses::where('id',$course)->first(); 
        // dd($courses);

        $input = $request->all();
        $input['slug'] = $this->slugify($input['title']);
        $input['media'] = isset($input['profile_avatar'])?$input['profile_avatar']:null; 
        unset($input['profile_avatar_remove'], $input['_token'], $input['profile_avatar']);
        try {
            DB::beginTransaction();
            if($input['media'] != null)
            {
                // $input['media'] = $this->uploadImage($input['media'], $input['name'] , '/uploads/courses/', 'public');
                    $image = $input['media'];
    
                        //store Image to directory
                        $imgName = rand() . '_' . time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('course_photos');
                        $imagePath = $destinationPath . "/" . $imgName;
                        $image->move($destinationPath, $imgName);
                        $path = basename($imagePath);
                        $input['media'] = 'course_photos/'.$path;
                
            }
            else{
                $input['media'] = $courses->media;
            }

            $includesArray = [];

            foreach ($request->includes as $key => $value) {
                $decodedValue = json_decode($value, true);
                foreach ($decodedValue as $item) {
                    $includesArray[] = $item['value'];
                }
            }
            
            $languagesArray = [];
    
            foreach ($request->languages as $key => $value) {
                $decodedValue = json_decode($value, true);
                foreach ($decodedValue as $item) {
                    $languagesArray[] = $item['value'];
                }
            }
            
            $input['includes'] = json_encode($includesArray);
            $input['languages'] = json_encode($languagesArray);

            $course = $courses->update($input);

            
            $categories = isset($request->categories) ? $request->categories : [];
            if(count($categories) > 0){
                
                DB::table('course_categories')->where('course_id', $courses->id)->delete();

                foreach($categories as $value){
                    $category = new CourseCategories();
                    $category->course_id = $courses->id;
                    $category->category_id = $value;
                    $category->save();
                }
            }


            $notification = array(
                'message' => 'Course updated!',
                'alert-type' => 'success'
            );
            DB::commit();

        } catch (\Throwable $th) {
            // dd($th->getMessage());
            $notification = array(
                // 'message' => $th->getMessage(),
                'message' => $th->getMessage(),
                'alert-type' => 'error'
            );
            DB::rollback();
        }
        return redirect('admin/courses')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $id)
    {
        $id->delete();
        $notification = array(
            'message' => 'Course deleted!',
            'alert-type' => 'success'
        );
        return redirect('admin/courses')->with($notification);
    }
}
