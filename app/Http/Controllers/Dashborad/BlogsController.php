<?php

namespace App\Http\Controllers\dashborad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Blog ;
use App\Http\Requests\BlogRequest ; 
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
   public function view(Request $request)
   {
    if ($request->ajax())
     {
        $data = Blog::select('*');
        
        return Datatables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                //    if (!empty($request->get('search')) ) { 
                //       $search =$request->get('search');
                //      $instance->where('code','like' , "%$search%");
                //  }
                   })
                ->addColumn('action', function ($data) {
                  return '
                  <button type="button"  class="btn btn-xs btn-primary"    data-title="'.$data->title.'" data-content="'.$data->content.'"    data-id="'.$data->id.'"         
                  id="form-edit" data-bs-toggle="modal" data-bs-target="#exampleModal"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                </svg></a>
                  <meta name="csrf-token" content="{{ csrf_token() }}">
    
                  <button name="bstable-actions" class="deleteRecord btn btn-xs btn-danger show_confirm"    data-id="'.$data->id.'" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg> </button>
                
                <meta name="csrf-token" content="{{ csrf_token() }}">
                     ';
                  
                })
                ->addColumn('image', function ($data) { 
   
                     $url=asset("/storage_upload/$data->image"); 
                     return '<img class="profile-user-img img-fluid "
                     src='.$url.'   alt="User  picture"> '; 
                 
                })
                ->addColumn('content', function ($data) { 
                  
                  return '<a href="#" class="show"     data-content="'.$data->content.'" id = "show-content"    data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-whatever="@mdo">مشاهدة التفاصيل</a>'; 
                      })
            
                ->addColumn('create', function ($data) {  
                    return  date('d M Y', strtotime($data->created_at)); 
               
                })    
                ->rawColumns(['image' , 'action'  , 'content'])
                   
                 ->make(true);
                        }
    return view('dashborad.blogs.view') ; 
   }


   public function view_index()
   {

    $bloges = Blog::get() ; 
    return view ('bloges'  , ['bloges'  => $bloges]) ; 
  
   }


public function store(BlogRequest $request)
{
  $blog = new Blog;
 $image = $request->file('image') ; 
 $blog->title =  $request['title']  ;
  $blog->content =  $request['content']  ;

 $path = 'uploads/images/';
 $name_image = time()+rand(1,10000000).'.'.$image->getClientOriginalExtension();
 Storage::disk('public')->put($path.$name_image, file_get_contents( $image ));

 $blog->image =$name_image ;

 $save =$blog->save();
 if($save){
 return response()->json(['success'=>'Successfully']);

    }else{
     return response()->json(['error'=>$validator->errors()]);

          } 

}


public function delete($id)
{
 $result =  Blog::find($id)->delete($id);

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
public function update(Request $request)
{
   $id = $request['id'] ; 
   $result =  Blog::find($id); 
   $image = $request->file('image') ;
   if($request['title'] != null ) $result->title = $request['title'] ; 
   if($request['content'] != null ) $result->content = $request['content'] ; 

   if(isset($image))
   {
     $path = 'uploads/images/';
     $name_image = time()+rand(1,10000000).'.'.$image->getClientOriginalExtension();
     Storage::disk('public')->put($path.$name_image, file_get_contents( $image ));
   
     $result->image =$name_image ;
   
   } 
   $status =  $result->update() ;
   if($status)
   {
    return response()->json([
         'success' => 'Record updated  successfully!'
     ]);
   }else
   {
   return response()->json([
     'falid ' => 'Record updated falid!'
  ]);
    }

}





}
