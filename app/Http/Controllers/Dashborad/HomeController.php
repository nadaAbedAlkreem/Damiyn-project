<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth ; 
class HomeController extends Controller
{
    public function index1()
    {
        $admin = Auth::guard('admin')->user();
     
   
        return view('dashborad.home');
    }
}
