@extends('layouts.app')

@section('content')


<section class="login py-5 border-top-1 " style="direction: rtl;">

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


		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-2 col-md-8 align-item-center register-bg border-ptofile">
					<h5 class="new-profile">طلباتي</h5>
				</div>
				<div class="col-lg-8 col-md-8 align-item-center border-profile1">
					<div class="row">
						<div class="col-md-7">
							<div class="input-group mb-3 mt-3 direction-ltr">
								<button class="input-group-text" id="basic-addon1"><img
										src="{{url('assets/images/blog/search-normal.svg')}}" alt=""></button>
								<input type="text"  id='search' class="form-control" placeholder="رقم الطلب" aria-label="رقم الطلب"
									aria-describedby="basic-addon1">

							</div>
						</div>
						<div class="col-md-5 mt-3 text-right">
							<select name="type_order" id="type_order" class="profile-select">
								<option value="">نوع الطلب</option>
								<option value="p">منتح </option>
								<option value="s">خدمة</option>
 							</select>
						</div>
 					 
						<select name="type_order" id="type_order">
						<option value="">نوع الطلب</option>
  <option value="p">منتح </option>
								<option value="s">خدمة</option>
</select>
					</div>
					<div class="row">
						<div class="col-lg-8">
							<div class="row">
								<div class="col cols-2 text-left all">الكل<span>({{TotalNumberOfUserOrders()}})</span></div>
								<div class="col  cols-2">قيد التنفيد<span>({{TotalNumberOfProgressOrders()}})</span></div>
								<div class="col cols-2">بانتظار الدفع<span>({{TotalNumberOfWaitOrders()}})</span></div>
								<div class="col cols-2">مكتمل<span>({{TotalNumberOfCompleteOrders()}})</span></div>
							</div>
						</div>

							<div class="col-lg-12">
								<table class="table  data-table">
								<thead>

									<tr class="table-header">
										<th>رقم الطلب</th>
										<th>رقم واتس البائع</th>
										<th>حالة الطلب</th>
										<th>تاريخ الطلب</th>
										<th>نوع الطلب</th>
										<th>تفاصيل الطلب</th>
									</tr>
								 
									</thead>
									<tbody>

									<tr class="table-body">
								 
									</tr>
                                    </tbody>

								</table>
							</div>

					</div>
				</div>
			
				
			</div>
		</div>
 

  <script type="text/javascript">
	$(document).ready(function(){
	$(document).on("click" , "#show_des" ,function(e){
		e.preventDefault();
		var des = $(this).data("des");
		var code = $(this).data("code");
		console.log(des);
		console.log(des);
		document.getElementById("des").innerHTML  = des;
		document.getElementById("code").innerHTML  = code;

 
	});
	 
	});
	 

    $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });
	   $.noConflict();
       $(document).ready(function($) {
        var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
		paging: false,
        ordering: false,
		searching: false,
        info: false,
 
		ajax: {
                    url: "{{ route('orders') }}",
                    data: function (d) {
                        d.type_order = $('#type_order').val(),
                        d.search = $('#search').val()
                    }
              },
        columns: [
            {data: 'code', name: 'code'},
            {data: 'mobile_phone_vendor', name: 'mobile_phone_vendor'},
            {data: 'status_order', name: 'status_order'},
			{data: 'created_at', name: 'created_at'},
            {data: 'type_order', name: 'type_order'},
			{data: 'description', name: 'description'},

         ]

    });
	
    	$('#search').keyup(function(){
              table.draw();
             });
		$('#type_order').change(function(){
                table.draw();
         });
	
	
	 
    
});
 
    
   
 
     
  });

</script>

	</section>




@endsection