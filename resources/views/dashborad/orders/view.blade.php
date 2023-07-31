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
                                       
                                        <div class="col-md-7">
                                              <div class="input-group mb-3 mt-3 direction-ltr">
                                                        <button class="input-group-text" id="basic-addon1"><img
                                                                src="{{url('assets/images/blog/search-normal.svg')}}" alt=""></button>
                                                        <input type="text"  id='search' class="form-control" placeholder="name-code "  
                                                            aria-describedby="basic-addon1">

                                                            
                                                </div>
                                        
                                              <!-- <div class="form-group">
                                                <label><strong>type order :</strong></label>
                                                <select id='type_order' class="form-control" style="width: 200px">
                                                    <option value="-1"></option>
                                                    <option value="P">prodact</option>
                                                    <option value="s">servies</option>
                                                </select>
                                              </div>  -->
                                              <div class="container">
                                              <div class="row">

                                               <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><strong>type order :</strong></label>
                                                    <select id='type_order' class="form-control" style="width: 200px">
                                                        <option value="-1"></option>
                                                        <option value="P">prodact</option>
                                                        <option value="s">servies</option>
                                                    </select>
                                                </div> 
                                              </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>status :</strong></label>
                                                        <select id='status' class="form-control" style="width: 200px">
                                                            <option value="-1"></option>
                                                            <option value="Wait">Wait</option>
                                                            <option value="Progress">progress</option>
                                                            <option value="Complete">complete</option>
                                                        </select>
                                                    </div> 
                                                </div>
                                                </div> 
                                                </div>
                                            </div>
                                            <table class="table table-bordered border text-nowrap mb-0 data-table-order"  id="basic-edit">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>user</th>
                                                        <th>code</th>
                                                        <th>mobile</th>
                                                        <th>status</th>
                                                        <th>type</th>
                                                        <th>description</th>
                                                        <th>create</th>
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
                    </div> 
                      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header modal-header-edit1">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{url('assets/images/blog/close-circle.svg')}}" alt=""></button>
                          </div>
                          <div class="modal-body modal-body-edit">
                            <h5> <span class="modal-span"  id ="code">P8754</span> تفاصيل الطلب </h5>
                            <p  id = "des"  ></p>
                          </div>
                          </div>
                        </div>
                        </div>
 
 <script type="text/javascript">



 
  
  $(document).ready(function($) {
      var table = $('.data-table-order').DataTable({
        processing: true,
        serverSide: true,
        paging: false,
        ordering: false,
        searching: false,
        info: false,

   ajax: {
        url: "{{ route('order.view') }}",
                   data: function (d) {
                       d.type_order = $('#type_order').val(),
                       d.search = $('#search').val()
                       d.status = $('#status').val()

                   }
             },
       columns: [
         {data: 'id', name: 'id'},
         {data: 'user', name: 'user'},
         {data: 'code', name: 'code'},    
         {data: 'mobile', name: 'mobile'},
         {data: 'status', name: 'status'},
         {data: 'type', name: 'type'},
         {data: 'description', name: 'description'},
         {data: 'create', name: 'create'},
         {data: 'action', name: 'action'},]     
   

   });
     $('#search').keyup(function(){
             table.draw();
            });
     $('#type_order').change(function(){
           table.draw();
        });
     $('#status').change(function(){
           table.draw();
        });
      });

	$(document).on("click" , "#show_des" ,function(e){
		e.preventDefault();
		var des = $(this).data("des");
		var code = $(this).data("code");
		console.log(des);
		console.log(des);
		document.getElementById("des").innerHTML  = des;
		document.getElementById("code").innerHTML  = code;
 
	});
	 
   
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

 

  
</script>                 
  </div>
              @endsection
