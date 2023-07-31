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
                                        <!-- <input type="text"  id='search' class="form-control" placeholder=" name" aria-label=" name"
							     	                     	aria-describedby="basic-addon1"> -->

                                            <table class="table table-bordered border text-nowrap mb-0 data-table"  id="basic-edit">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>name</th>
                                                        <th>logo</th>
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
			       <form id="SubmitFormPartner"  enctype="multipart/form-data">
			         <div class="card">
				    		<div class="card-body">
							   	<div id="wizard1">
										<section>
											<h2 class="d-none">Partner Information</h2>
											<div class="control-group form-group">
												<label class="form-label">Name</label>
                        <input type="text"  id = "id" name="id" class="form-control required" hidden>
												<input type="text"  id = "name" name="name" class="form-control required" placeholder="Name">
								
                        <span class=" text-danger" role="alert" >
                        <i class="fas fa-exclamation-circle mr-1" id ="errorName"  hidden></i>
                        </span>
                      </div>
											<div class="control-group form-group">
												<label class="form-label"></label>
												<input type="file" id = "logo" class="form-control required"     name="logo" placeholder="logo">
                        <span class=" text-danger" role="alert" >
                        <i class="fas fa-exclamation-circle mr-1" id ="errorLogo"  hidden></i>
                        </span>
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
 
 $('#SubmitFormPartner').on('submit',function(e)
{
  if(document.querySelector('#submitForm').innerHTML == "Send")
  {
    e.preventDefault();
    let formData = new FormData($('#SubmitFormPartner')[0]);
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
      var errorName = document.getElementById('errorName');
      errorName.textContent =   response.responseJSON.errors.name;  
 
     if( response.responseJSON.errors.name)
        {
        
         errorName.hidden = false;

       }else
       {
        errorName.hidden = true;

       }
       var errorLogo = document.getElementById('errorLogo');
       errorLogo.textContent =   response.responseJSON.errors.logo;  
       if( response.responseJSON.errors.logo)
       {
        errorLogo.hidden = false;

       }else
       {
        errorLogo.hidden = true;

       }
    
    },
   });
  }
  else if(document.querySelector('#submitForm').innerHTML == "update")
  {
    e.preventDefault();
    let formData = new FormData($('#SubmitFormPartner')[0]);
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
     $('#successMsg').show();
      console.log(response);
      var btn_close = document.getElementById('close');  
      btn_close.click();


      swal({  
         title: " success",  
          icon: "success",  
         button: "ok",  
         });  


      var table = $('.data-table').DataTable();
      table.draw();
    },
 
   error: function(response) 
    {
     var jsonData = response.responseJSON.message;
       console.log(jsonData);    
      
    
    },
   });

  }


 
});
 
 $(function () 
 {
  
   $.ajaxSetup(
    {
       headers: {
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
                 url: "{{ route('partners.view') }}",
                 data: function (d) {
                      d.search = $('#search').val()
                 }
           },
     columns: [
         {data: 'id', name: 'id'},
         {data: 'name', name: 'name'},
         {data: 'logo', name: 'logo'},
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


$(document).on("click" , "#add-item" ,function(e)
 {
  document.querySelector('#submitForm').innerHTML = 'Send';
  document.getElementById("name").value =  '';
  var fileInput = document.getElementById('icon');
  fileInput.value = null;

 
	});
 $(document).on("click" , "#form-edit" ,function(e)
 {
  document.querySelector('#submitForm').innerHTML = 'update';
		e.preventDefault();
		var name  = $(this).data("name");
    var id  = $(this).data("id");

 		console.log(name);
 
 		document.getElementById("name").value = name;
    document.getElementById("id").value = id;
    var fileInput = document.getElementById('icon');
    fileInput.value = null;

 
 
	});

  
</script>                 
  </div>
 
            @endsection
