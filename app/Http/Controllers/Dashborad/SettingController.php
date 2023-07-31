<?php

namespace App\Http\Controllers\Dashborad;
use App\Http\Controllers\Controller;
use App\Models\Setting ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image ;
use DataTables;

class SettingController extends Controller
{

 public function view(Request $request)  
  {     
     if ($request->ajax()) 
     {
 
      $data =  Image::select('*');
      return Datatables::of($data)
      
              ->addIndexColumn()

             
              ->addColumn('action', function ($data) 
              {
                return '
                <button type="button"   data-bs-toggle="modal" data-bs-target="#ModalImgaeAdd" class="btn btn-xs btn-primary"    data-id="'.$data->id.'"         
                id="form-edit" data-bs-toggle="modal" data-bs-target="#exampleModal"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
              </svg></a>
                   ';       
              })
              ->addColumn('create', function ($data) 
              {  
                return  date('d M Y', strtotime($data->created_at)); 
           
              })    
              ->addColumn('image', function ($data) 
              {    
                $url=asset("/storage_upload/$data->image"); 
                return ' <img class="profile-user-img img-fluid "
                src='.$url.'   alt="User  picture"> '; 
              })
            ->rawColumns(['image' ,'action'  ])
            ->make(true);
       } 
        $data = Setting::get() ; 
        return view('dashborad.setting.view' , ['data' => $data]) ; 
     }
     public function update(Request $request)  
     {   
          setting($request) ;                      
     }


     public function store(Request $request)
     {
   
         $image = new Image();
         $images = $request->file('image');
         foreach ($images as $imagefile) {
          $image = new image();
          $path = 'uploads/images/';
          $name_image = time()+rand(1,10000000).'.'.$imagefile->getClientOriginalExtension();
          Storage::disk('public')->put($path.$name_image, file_get_contents( $imagefile ));
          
          $image->image = $name_image;
            $status=$image->save();
        }
              if($status)
            {
                return response()->json(['success'=>'Successfully']);
            
            }else
            {
                return response()->json(['error'=>$validator->errors()]);
            
            } 
     
     }

     public function updateImageSetting(Request $request)
     {
         $image_item =Image::find($request['id']);
         $images = $request->file('image');
         if(isset($images))
         {
          $images = $request->file('image')[0];

            $path = 'uploads/images/';
            $name_image = time()+rand(1,10000000).'.'.$images->getClientOriginalExtension();
            Storage::disk('public')->put($path.$name_image, file_get_contents( $images ));
            

       
            $image_item->image = $name_image ; 
             $status=$image_item->save();
     
              if($status)
            {
                return response()->json(['success'=>'Successfully']);
            
            }else
            {
                return response()->json(['error'=>$validator->errors()]);
            
            } 

          }else
          {
             return response()->json(['success'=>'Successfully']);

          }
     
     }
     public function delete($id)
     {
      $result =  Setting::find($id)->delete($id);
    
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






function setting(Request $request)
{
  foreach ($request->except(['logoFooter', 'logoHeader', 'video'  , 'images']) as $key=> $value)
   {
    $data = Setting::where('key',  $key)->first();
    $data->value = $value;
   }
  
    
    if ($request->hasFile('logoFooter'))
    {
         $file=   $request->file('logoFooter') ; 
         $data = Setting::where('key', 'logoFooter')->first();

         $path = 'uploads/images/';
        $name_image = time() + rand(1, 10000000) . '.' .   $file->getClientOriginalExtension();
        Storage::disk('public')->put($path . $name_image, file_get_contents($file));
        $data->value = $name_image;
    }
    if ($request->hasFile('logoHeader'))
    {
         $file=   $request->file('logoHeader'); 
         $data = Setting::where('key', 'logoHeader')->first();

         $path = 'uploads/images/';
          $name_image = time() + rand(1, 10000000) . '.' .   $file->getClientOriginalExtension();
          Storage::disk('public')->put($path . $name_image, file_get_contents($file));
          $data->value = $name_image;
    }
    if ($request->hasFile('video'))
       {
          $data = Setting::where('key', 'video')->first();
          $video = $request->file('video');
          $filename = uniqid() . '.' . $video->getClientOriginalExtension();
          $video->move(public_path('videos'), $filename);

         $data->value =  $filename;
    
       }

  if(  $data->update()  )
  {
    return response()->json(['success'=>'Successfully']);

  }else
  {
      return response()->json(['error'=>$validator->errors()]);

  } 


}
