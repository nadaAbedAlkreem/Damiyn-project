@extends('dashborad.layouts.app')

@section('content')
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
            <button type="button" id = "add-item"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" class="btn btn-danger btn-icon me-2 buttons"><i class="mdi mdi-plus-circle"></i></button>
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
        

                                            <table class="table table-bordered border text-nowrap mb-0 data-table"  id="basic-edit">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>name</th>
                                                        <th>comment</th>
                                                        <th>create </th>
                                                        <th>action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
  
 
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
		       <div class="modal-body">
			       <form id="SubmitFormRating"   >
			         <div class="card">
				    		<div class="card-body">
							   	<div id="wizard1">
										<section>
 											<div class="control-group form-group">
 
                      <label class="form-label">comment</label>
                        <input type="text"  id = "comment" name="comment" class="form-control required" placeholder="comment">
                        <label class="form-label">Name</label>
                        <!-- <input type="text"  id = "name" name="name" class="form-control required" placeholder="name"> -->
                        <select class="form-select"  id="name" name = "name" >
                        <option value="0"  > </option>

                          @if(!empty($users))
                            @foreach($users as $user)
                            <option value="{{$user->id}}"  >{{$user->name}}</option>
                            @endforeach                         
                          @endif
                          </select> 
											</div>
                        <button type="button" id = "close" class="btn-close" data-bs-dismiss="modal" aria-label="Close" hidden ></button>

										</section>
								</div>
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

            </div> 

 <script type="text/javascript">
 
 $('#SubmitFormRating').on('submit',function(e)
{
  
 
     e.preventDefault();
    let formData = new FormData($('#SubmitFormRating')[0]);
 
     $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              } });
    $.ajax(
    {
    type:"POST",
    url: "add",
    data:formData,
    contentType:false, // determint type object 
    processData: false,  // processing on response 
    success:function(response)
    {
 
     $('#successMsg').show();
      console.log(response);
      var btn_close = document.getElementById('close');  
      btn_close.click();
      var table = $('.data-table').DataTable();
      table.draw();
    },
 
   error: function(response) 
    {
 
      
      //  var errorIcon = document.getElementById('errorIcon');
      //  errorIcon.textContent =   response.responseJSON.errors.icon;  
      //  if( response.responseJSON.errors.icon){
        
      //   errorIcon.hidden = false;

      //  }else{
      //   errorIcon.hidden = true;

      //  }

    
    },
   });
  
  // else if(document.querySelector('#submitForm').innerHTML == "update")
  // {
  //   e.preventDefault();
  //   let formData = new FormData($('#SubmitFormPartner')[0]);
  //    $.ajaxSetup({
  //    headers: {
  //    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //             } });
  //   $.ajax(
  //   {
  //   type:"POST",
  //   url: "update",
  //   data:formData,
  //   contentType:false, // determint type object 
  //   processData: false,  // processing on response 
  //   success:function(response)
  //   {
  //    $('#successMsg').show();
  //     console.log(response);
  //     var btn_close = document.getElementById('close');  
  //     btn_close.click();


  //     swal({  
  //        title: " success",  
  //         icon: "success",  
  //        button: "ok",  
  //        });  


  //     var table = $('.data-table').DataTable();
  //     table.draw();
  //   },
 
  //  error: function(response) 
  //   {
  //    var jsonData = response.responseJSON.message;
  //      console.log(jsonData);    
  //        swal({  
  //        title: " Oops!",  
  //        text:jsonData,  
  //        icon: "error",  
  //        button: "oh no!",  
  //        });  
    
  //   },
  //  });

  // }


 
});
 
 $(function () 
 {
  
   $.ajaxSetup(
    {
       headers:
        {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.noConflict();
    $(document).ready(function($) 
    {
      var table = $('.data-table').DataTable(
      {
     processing: true,
     serverSide: true,
     paging: false,
     ordering: false,
     searching: false,
     info: false,

     ajax: {
                 url: "{{ route('rating.view') }}",
                 data: function (d) {
                      d.search = $('#search').val()
                 }
           },
     columns: [
         {data: 'id', name: 'id'},
         {data: 'name', name: 'name'},
         {data: 'comment', name: 'comment'},
         {data: 'create', name: 'create'},
         {data: 'action', name: 'action'},

      ]

       });
        $('#search').keyup(function()
        {
           table.draw();
        });
  
 
  
 
    });

 

 })

           
$(".data-table").on('click', '.deleteRecord[data-id]', function (e)
 { 
      e.preventDefault();
      
  $('.show_confirm').click(function(event)
    {

      swal(
        {
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
         dangerMode: true,
        
         })
        .then((willDelete) => 
     { 
         if (willDelete)
        {
           var id = $(this).data("id");
           var token = $("meta[name='csrf-token']").attr("content");
   
         $.ajax(
        {
          url: "delete/"+id,
           type: 'DELETE',
          data: 
          {
            "id": id,
             "_token": token,
          },
          success: function ()
          {
            console.log("it Works");
 
            $('.data-table').DataTable().ajax.reload();
         }
        });

       }
     });

    
    });

    
 });


// $(document).on("click" , "#add-item" ,function(e)
//  {
//   document.querySelector('#submitForm').innerHTML = 'Send';
//   document.getElementById("name").value =  '';
//   var fileInput = document.getElementById('icon');
//   fileInput.value = null;

//  });
//  $(document).on("click" , "#form-edit" ,function(e)
//  {
  // document.querySelector('#submitForm').innerHTML = 'update';
	// 	e.preventDefault();
	// 	var name  = $(this).data("name");
  //   var id  = $(this).data("id");

 	// 	console.log(name);
 
 	// 	document.getElementById("name").value = name;
  //   document.getElementById("id").value = id;
  //   var fileInput = document.getElementById('icon');
  //   fileInput.value = null;

 
 
	// });

  
</script>                 
  </div>
 
            @endsection
 