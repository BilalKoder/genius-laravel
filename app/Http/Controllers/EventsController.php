<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Events;
use App\Traits\EmailTrait;
use App\Traits\SlugTrait;
use App\Traits\UploadTrait;
use App\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
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
        $data['events'] = Events::orderBy('id','DESC')->get();
        $data['page_title'] = "Events";

        return view('admin.events.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Add Events";
        $data['events'] = new Events;
        $data['categories'] = Categories::where('type',"EVENTS")->get();
        return view('admin.events.form',$data);
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
            'title' => 'required',
            'event_date' => 'required',
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
              
                $input['created_by'] = auth()->user()->id;
                $blog = Events::create($input);


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
            // dd($th->getMessage());

           
            $notification = array(
                'message' => 'Error Occured!',
                'alert-type' => 'error'
            );
            
            DB::rollback();

        }
       
        return redirect('/admin/events')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['page_title'] = "Edit Events";
        $data['events'] = Events::findOrFail($id);
        $data['categories'] = Categories::where('type',"EVENTS")->get();
        return view('admin.events.form',$data);
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
        
        $blogs = Events::where('id',$blog)->first(); 

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
                $input['media'] = $blogs->media;
            }
            
            $blog = $blogs->update($input);

            $notification = array(
                'message' => 'Events updated!',
                'alert-type' => 'success'
            );
            DB::commit();

        } catch (\Throwable $th) {
            // dd($th->getMessage());
            $notification = array(
                'message' => $th->getMessage(),
                'alert-type' => 'error'
            );
            DB::rollback();
        }
        return redirect('admin/events')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $id)
    {
        $id->delete();
        $notification = array(
            'message' => 'Events deleted!',
            'alert-type' => 'success'
        );
        return redirect('admin/events')->with($notification);
    }
}
