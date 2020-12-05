<?php

namespace App\Http\Controllers;

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
        return view('welcome');
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function about()
    {
        return view('user.about');
    }
    public function account()
    {
        return view('user.my-account');
    }
      public function all_products()
    {
        return view('user.all-products');
    }
    
    
    

}
