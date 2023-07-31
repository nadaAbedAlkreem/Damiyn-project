@extends('dashborad.layouts.app')

@section('content')
<style>
.video-container {
    width: 100%; /* Adjust the width as needed */
    height: auto; /* The height will adjust automatically based on the video aspect ratio */
    max-width: 800px; /* Set a maximum width for the video container */
    margin: 0 auto; /* Center the video container horizontally */
}
 </style>   
<div class="main-content app-content">

<!-- container -->
     <div class="main-container container-fluid">

<!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
          <div class="my-auto">
           <h4 class="page-title">Tables</h4>
             <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Tables</li>
           </ol>
          </div>
            <div class="d-flex my-xl-auto right-content align-items-center">
        <div class="pe-1 mb-xl-0">
            <button type="button" class="btn btn-info btn-icon me-2 btn-b"><i class="mdi mdi-filter-variant"></i></button>
        </div>
        <div class="pe-1 mb-xl-0">
            <button type="button" id = "add-item"  data-bs-toggle="modal" data-bs-target="#ModalImgaeAdd" data-bs-whatever="@mdo" class="btn btn-danger btn-icon me-2 buttons"><i class="mdi mdi-plus-circle"></i></button>
        </div>
 
       
    </div>
</div>
<!-- breadcrumb -->

<div class="row">
                            <div class="col-lg-12">
                           
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Basic Edit Table</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="modal-body">
                                            <table class="table table-bordered  data-table   table-sm">
                                                                        <thead>
                                                                          <tr>
                                                                        
                                                                                <th>id</th>
                                                                                <th>image</th>
                                                                                <th>created</th>
                                                                                <th>action</th>
                                                                            </tr>
                                                                         </thead>
                                                                          <tbody>
                                                                            <tr>
                                                                        
                                                                            </tr>
                                                                          </tbody>
                                                              
                                                                     </table>
                                              <form id="SubmitFormSetting"  enctype="multipart/form-data">
                                                <div class="card">
                                                  <div class="card-body">
                                                    <div id="wizard1">
                                                      <section>
                                                        <h2 class="d-none">setting Information</h2>
                                                        <div class="control-group form-group">
                                                                      @if(!empty($data))	
                                                                        @foreach($data as $item)
                                                                              @switch ($item->key) 
                                                                                @case ('logoFooter')
                                                                                <label class="form-label">{{$item->key}}    <i class="bi bi-eye-fill"  data-bs-toggle="modal" data-bs-target="#modalImageLogoFooter"></i></label>
                                                                                <input type="file" id = "{{$item->key}}"  class="form-control "    name="{{$item->key}}"  >
                                                                                  <div class="modal fade" id="modalImageLogoFooter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="assets/images/blog/close-circle.svg" alt=""></button>
                                                                                            <div class="modal-body modal-body-edit   ">
                                                                                              <img class="profile-user-img img-fluid "  style = "width: 125%; height: 125%;"  src='/storage_upload/{{$item->value}}'   alt="User  picture">
                                                                                            </div>
                                                                                        </div>
                                                                                  </div>
                                                                            
                                                                            
                                                                                  @break
                                                                                @case ('logoHeader')
                                                                                <label class="form-label">{{$item->key}} <i class="bi bi-eye-fill"  data-bs-toggle="modal" data-bs-target="#modalImageLogoHeader"></i> </label>
                                                                                  <input type="file" id = "{{$item->key}}" class="form-control required"     name="{{$item->key}}"  >
                                                                                  <div class="modal fade" id="modalImageLogoHeader" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="assets/images/blog/close-circle.svg" alt=""></button>
                                                                                            <div class="modal-body modal-body-edit   ">
                                                                                              <img class="profile-user-img img-fluid "  style = "width: 125%; height: 125%;"  src='/storage_upload/{{$item->value}}'   alt="User  picture">
                                                                                            </div>
                                                                                        </div>
                                                                                  </div>
                                                
                                                                                  @break
                                                                            @case('video')
                                                          
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                              <div class="control-group form-group">
                                                                                                      <label class="form-label">{{$item->key}}<i class="bi bi-eye-fill"  data-bs-toggle="modal" data-bs-target="#modalVideo"></i>  </label>
                                                                                                    <div class="col-sm-12 col-md-12">
                                                                                                      <input type="file"  id = "{{$item->key}}"  name="{{$item->key}}"  class="dropify" data-height="200">
                                                                                                    </div>
                                                                                      </div>  
                                                                                </div> 
                                                                                <div class="modal fade" id="modalVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                        <div class="modal-dialog">
                                                                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="assets/images/blog/close-circle.svg" alt=""></button>
                                                                                            <div class="modal-body modal-body-edit   ">
                                                                                            <video controls autoplay name="media"  style = "width: 125%; height: 125%;" >
                                                                                            <source src='/videos/{{$item->value}}' type="video/mp4">
                                                                                            </video>                 
                                                                                            </div>
                                                                                        </div>
                                                                                  </div>

                                                                        
                                                                                @break 
                                                                                  @default
                                                                            <label class="form-label">{{$item->key}}</label>
                                                                                  <textarea type="text"  id = "{{$item->key}}" name="{{$item->key}}"  class="form-control required"  >{{$item->value}}</textarea>
                                                                                @endswitch
                                                                                  @endforeach
                                                                        @endif
                                                         
                                                                                <button type="button" id = "close" class="btn-close" data-bs-dismiss="modal" aria-label="Close" hidden></button>
                                                                          </section>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                              </div>
                                                                  <div class="modal-footer d-flex justify-content-center">
                                                                            <button type="submit" class="btn btn-indigo" id="submitForm">save change  <i class="fas fa-paper-plane-o ml-1"></i></button>
                                                                    </div>
                                                           </form>
                                                                 
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                              
                                                          <div class="modal fade" id="ModalImgaeAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                  <form id="SubmitFormAddImage"  enctype="multipart/form-data">
                                                                      <div class="card">
                                                                        <div class="card-body">
                                                                          <div id="wizard1">
                                                                                  <section>
                                                                                    <div class="control-group form-group">
                                                                                      <label class="form-label">icon</label>
                                                                                      <input type="file"  id = "image" class="form-control required"     name="image[]" placeholder="image" multiple>
                                                                                      <span class=" text-danger" role="alert" >
                                                                                      <i class="fas fa-exclamation-circle mr-1" id ="errorImage"  hidden></i>
                                                                                      </span>
                                                                                    </div>
                                                                                    <button type="button" id = "close-add-btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close" hidden></button>
                                                                                  </section>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                        <div class="modal-footer d-flex justify-content-center">
                                                                              <button type="submit" class="btn btn-indigo" id="submitForm">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                                                                        </div>
                                                                  </form> 
                                                              </div>
                                                            </div>	
                                                          </div>
                                                        
            </div> 
         
 <script type="text/javascript">
 $('#SubmitFormProfile').on('submit',function(e)
{
 
    e.preventDefault();
    tinymce.triggerSave(); 
    let formData = new FormData($('#SubmitFormSetting')[0]);
     $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              } });
    $.ajax(
    {
    type:"POST",
    url: "update",
    data:formData,
    contentType:false, // determint type object 
    processData: false,  // processing on response 
    success:function(response)
    {
       console.log(response);
       document.getElementById("SubmitFormSetting").reset(); 
      swal({  
         title: " success",  
          icon: "success",  
         button: "ok",  
         });  
         location.reload();

   
    },
 
   error: function(response) 
    {
     var jsonData = response.responseJSON.message;
       console.log(jsonData);    
         swal({  
         title: " Oops!",  
         text:jsonData,  
         icon: "error",  
         button: "oh no!",  
         });  
    
    },
   });
  
 
});
 


 
           
 
 
</script>                 
  </div>
 
  @endsection
