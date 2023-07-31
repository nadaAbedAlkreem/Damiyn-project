@extends('layouts.app')

@section('content')
<section class="login py-5 border-top-1 " style="direction: rtl;">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-lg-3 col-md-8 align-item-center register-bg border-ptofile">
			<h5 class="new-profile">البيانات الشخصية</h5>
		</div>
		<div class="col-lg-7 col-md-8 align-item-center border-profile1">
		  <div >
			<form  id ="SubmitUpdateProfile" action="#">
			@if(!empty($data))	
			@foreach($data as $item)

			  <fieldset class="p-4">
				<div class="class-group text-align-right">
                 <input class="form-control mb-3"  id ="id" value ="{{$item->id}}" type="text" placeholder="الإسم كامل" required="" hidden>
 
					<label for="">الإسم</label>
					<input class="form-control mb-3"  id ="name" value ="{{$item->name}}" type="text" placeholder="الإسم كامل" required="">
				</div>
				<div class="class-group text-align-right">
					<label for="">البريد الإلكتروني</label>
					<input class="form-control mb-3" id = "email" value ="{{$item->email}}" type="email" placeholder="البريد الإلكتروني" required="">
				</div>
				<div class="class-group text-align-right">
					<label for="">رقم الجوال </label>
					<input class="form-control mb-3"  id ="phone"  value ="{{$item->phone}}" type="phone" placeholder="رقم الجوال " required="">
				</div>
				<button type="submit"  class="w-100 btn btn-primary  mt-3 btn-blue"> حفظ التعديلات</button>
			  </fieldset>

			@endforeach
			@endif
			</form>
		  </div>
		</div>
	  </div>
	</div>
  </section>
  <script type="text/javascript">

  $('#SubmitUpdateProfile').on('submit',function(e){
    e.preventDefault();
       let id = $('#id').val();
       let name = $('#name').val();
       let email= $('#email').val();
       let phone = $('#phone').val();
       var token = $("meta[name='csrf-token']").attr("content");
       

    
// Set CSRF in header
// $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

       $.ajax({
       url: "{{route('profile.update')}}",
       method:"post",
       cache: false,
        data:{
			id:id,
			name:name,
            email:email,
            phone:phone,
         "_token": token,
        },
        success:function(response){
        $('#successMsg').show();
        console.log(response);

        swal({
           title:  '   تم تحديث المعلومات  ',
           icon: "success",
           buttons: true,
           dangerMode: false,
         })

         },
        error: function(response ) {
        var jsonData = response.responseJSON.message;
         console.log(jsonData);  

           swal({
          title:  jsonData ,
          icon: "warning",
          buttons: true,
         dangerMode: true,
             })

 },
 });


});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha512-7VTiy9AhpazBeKQAlhaLRUk+kAMAb8oczljuyJHPsVPWox/QIXDFOnT9DUk1UC8EbnHKRdQowT7sOBe7LAjajQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection
