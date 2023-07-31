<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth ; 
use App\Models\Advertisement ;
use App\Models\Services;
use App\Models\Image ;
use App\Models\Rating ;
use App\Models\Partner ;
use App\Models\Setting ;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
   //     $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = Auth::user();
        $advertisements = Advertisement::select('image')->get();
        $services = Services::get();
        $images = Image::get();
        $rating = Rating::get();
        $partner = Partner::get();
        $setting = Setting::get();

        return view('home',[
          'adv'=> $advertisements  ,
          'ser' => $services ,
          'images' => $images ,  
          'rating'=>  $rating   , 
          'setting'=>  $setting   , 
          'partner'=>  $partner]);
    }
  
  
}
