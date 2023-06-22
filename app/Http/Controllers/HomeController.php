<?php

namespace App\Http\Controllers;

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
        return view('front.home',$data);
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
