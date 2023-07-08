<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use DB;

class CategoriesController extends Controller
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
        $data['categories'] = Categories::orderBy('id','DESC')->get();
        $data['page_title'] = "Categories";

        return view('admin.categories.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Add Categories";
        $data['category'] = new Categories;
        return view('admin.categories.form',$data);
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

        try {

            DB::beginTransaction();
      
            $category = new Categories;
            $category->name = $input['name']??'';
            $category->type = $input['type']??'';
            $category->slug = $this->slugify($input['name']);
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
       
        return response()->json($notification);

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$category)
    {
        $category = Categories::where('id',$category)->first();
        // dd($category);
        $category->name = $request->name;
        $category->type = $request->type;
        $category->slug = $this->slugify($request->name);
        $category->save();

        $notification = array(
            'message' => 'Category Updated Successfully!',
            'alert-type' => 'success'
        );

        return response()->json($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $id)
    {
        $id->delete();
        $notification = array(
            'message' => 'Category deleted!',
            'alert-type' => 'success'
        );
        return redirect('admin/categories')->with($notification);
    }
}
