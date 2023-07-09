<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\User;
use App\Blogs;
use App\BlogCategories;
use App\Categories;
use Illuminate\Http\Request;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use DB;


class BlogsController extends Controller
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
        $data['blogs'] = Blogs::orderBy('id','DESC')->get();
        $data['page_title'] = "Blogs";

        return view('admin.blogs.list',$data);
    }


    public function frontBlogs(Request $request)
        {
            $query = Blogs::query();

            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where('name', 'like', "%$searchTerm%");
            }

            if ($request->has('category')) {
                $categoryId = $request->input('category');
                $blogIds = BlogCategories::where('category_id', $categoryId)->pluck('blog_id');
                $query->whereIn('id', $blogIds);
            }


            $query->where('status',1);

            $data['blogs'] = $query->orderBy('id', 'DESC')->get();
            $data['categories'] = Categories::where('type', "BLOGS")->orderBy('id', 'DESC')->get();
            $data['page_title'] = "Blogs";

            return view('front.blogs', $data);
        }

        public function frontBlogsSingle($id){
         
            $currentBlog = Blogs::findOrFail($id);
    
            $previousBlog = Blogs::where('id', '<', $currentBlog->id)
                ->orderBy('id', 'desc')
                ->first();
            
            $nextBlog = Blogs::where('id', '>', $currentBlog->id)
                ->orderBy('id', 'asc')
                ->first();
            
            $categories = Categories::where('type', "BLOGS")->orderBy('id', 'DESC')->get();

            $data = [
                'blog' => $currentBlog,
                'previousBlog' => $previousBlog,
                'nextBlog' => $nextBlog,
                'page_title' => $currentBlog->meta_title??'',
                'categories' => $categories,
                'meta_description' =>  $currentBlog->meta_description??''
            ];

            return view('front.blog-detail', $data);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Add Blogs";
        $data['blog'] = new Blogs;
        $data['categories'] = Categories::where('type',"BLOGS")->get();
        return view('admin.blogs.form',$data);
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
            'name' => 'required'
        ]); 
       
            $input = $request->all();
            $input['media'] = isset($input['profile_avatar'])?$input['profile_avatar']:null;
            unset($input['profile_avatar_remove'], $input['_token'], $input['profile_avatar']);
      
            try {
                DB::beginTransaction();
                if($input['media'] != null)
                {
                    // $input['media'] = $this->uploadImage($input['media'], $input['name'] , '/uploads/blogs/', 'public');
                        $image = $input['media'];
        
                            //store Image to directory
                            $imgName = rand() . '_' . time() . '.' . $image->getClientOriginalExtension();
                            $destinationPath = public_path('blog_photos');
                            $imagePath = $destinationPath . "/" . $imgName;
                            $image->move($destinationPath, $imgName);
                            $path = basename($imagePath);
                            $input['media'] = 'blog_photos/'.$path;
                    
                }
                else{
                    $input['media'] = '';
                }
                // dd($request->categories);
                $input['slug'] = $this->slugify($input['name']);
                $input['created_by'] = auth()->user()->id;
                $blog = Blogs::create($input);
                
                $categories = $request->categories;
                if(count($categories) > 0){
                    foreach($categories as $value){
                        $category = new BlogCategories();
                        $category->blog_id = $blog->id;
                        $category->category_id = $value;
                        $category->save();
                    }
                }


                $notification = array(
                    'message' => 'Information created!',
                    'alert-type' => 'success'
                );
            DB::commit();

            $notification = array(
                'message' => 'Form Submitted Successfully!',
                'alert-type' => 'success'
            );


        } catch (\Throwable $th) {
            dd($th->getMessage());

           
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            
            DB::rollback();

        }
       
        return redirect('/admin/blogs')->with($notification);

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
        $data['blog'] = Blogs::findOrFail($id);
        $data['categories'] = Categories::where('type',"BLOGS")->get();
        return view('admin.blogs.form',$data);
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
    public function update(Request $request,$blog)
    {
        
        $blogs = Blogs::where('id',$blog)->first(); 
        // dd($blogs);

        $input = $request->all();
        $input['slug'] = $this->slugify($input['name']);
        $input['media'] = isset($input['profile_avatar'])?$input['profile_avatar']:null; 
        unset($input['profile_avatar_remove'], $input['_token'], $input['profile_avatar']);
        try {
            DB::beginTransaction();
            if($input['media'] != null)
            {
                // $input['media'] = $this->uploadImage($input['media'], $input['name'] , '/uploads/blogs/', 'public');
                    $image = $input['media'];
    
                        //store Image to directory
                        $imgName = rand() . '_' . time() . '.' . $image->getClientOriginalExtension();
                        $destinationPath = public_path('blog_photos');
                        $imagePath = $destinationPath . "/" . $imgName;
                        $image->move($destinationPath, $imgName);
                        $path = basename($imagePath);
                        $input['media'] = 'blog_photos/'.$path;
                
            }
            else{
                $input['media'] = $blogs->media;
            }
            
            $blog = $blogs->update($input);

            
            $categories = isset($request->categories) ? $request->categories : [];
            if(count($categories) > 0){
                
                DB::table('blog_categories')->where('blog_id', $blogs->id)->delete();

                foreach($categories as $value){
                    $category = new BlogCategories();
                    $category->blog_id = $blogs->id;
                    $category->category_id = $value;
                    $category->save();
                }
            }


            $notification = array(
                'message' => 'Blog updated!',
                'alert-type' => 'success'
            );
            DB::commit();

        } catch (\Throwable $th) {
            dd($th->getMessage());
            $notification = array(
                // 'message' => $th->getMessage(),
                'message' => $th->getMessage(),
                'alert-type' => 'error'
            );
            DB::rollback();
        }
        return redirect('admin/blogs')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogs $id)
    {
        $id->delete();
        $notification = array(
            'message' => 'Blog deleted!',
            'alert-type' => 'success'
        );
        return redirect('admin/blogs')->with($notification);
    }
}
