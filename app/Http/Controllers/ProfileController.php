<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;
use Auth; 
use App  ; 

class ProfileController extends Controller
{
    

    public function index()
    {
        $id =  Auth::user()->id  ; 
        $data = User::where('id' , $id)->get();
   
        return view('profile' , ['data' =>$data]) ; 
    }
    public function updateDataProfile(Request $request)
    {
        
  
        $id = $request['id'] ; 
        $user = User::find($id);
        $user->fill($request->all());
        $status = $user->update() ; 
        return response()->json(['status'=>$status]);
      

     
        return view('profile' ) ; 
    }
    

}
