<?php

namespace App\Http\Controllers\Dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating ;
use App\Models\User ;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RatingRequest ; 

class RatingController extends Controller
{
    
    public function view(Request $request)
    {
     $users = User::select('*')->get();
       if ($request->ajax()) {
         $data = Rating::with('user')->select('*');
         
         return Datatables::of($data)
                 ->addIndexColumn()
                 ->filter(function ($instance) use ($request) {
                 //    if (!empty($request->get('search')) ) { 
                 //       $search =$request->get('search');
                 //      $instance->where('code','like' , "%$search%");
                 //  }
                    })
                 ->addColumn('action', function ($data)
                  {
                   return '
                        <button name="bstable-actions" class="deleteRecord btn btn-xs btn-danger show_confirm"    data-id="'.$data->id.'" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg> </button>
                          <meta name="csrf-token" content="{{ csrf_token() }}">
                      ';
                   
                 })
                 ->addColumn('name', function ($data) { 
                  return    $data->user->name ; 
             
                  })    
             
                 ->addColumn('create', function ($data) {  
                     return  date('d M Y', strtotime($data->created_at)); 
                
                 })    
                 ->rawColumns(['action'  ])
                    
                  ->make(true);
                         }
           return view('dashborad.ratings.view' , ['users' => $users]) ; 
 
    }
    
 
    public function store(Request $request)
    {
  
        $rating = new Rating();
        $rating->user_id =  $request['name']  ;
        $rating->comment =  $request['comment']  ;
      
      
      
      $save =$rating->save();
      if($save)
      {
          return response()->json(['success'=>'Successfully']);
      
      }else
      {
          return response()->json(['error'=>$validator->errors()]);
      
      } 
    
    }
    public function delete($id)
    {
     $result =  Rating::find($id)->delete($id);
   
     if($result)
     {
       return response()->json([
           'success' => 'Record deleted successfully!'
       ]);
      }else
      {
       return response()->json([
         'falid ' => 'Record deleted falid!'
     ]);
      }
   
    }


}