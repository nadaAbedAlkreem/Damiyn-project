
@extends('layouts.app')

@section('content')
<section class="popular-deals section1 section bg-gray">
        <div class="container">
            <div class="row justify-content-center align-items-center row-height">
                <div class="col-md-7 ">
                    <div class="card card-background col-height">
                        <div class="card-title login-title">
                            <h4 class="login-header">تسجيل دخول</h4>
                            <p class="login-par">أدخل رقم الجوال لتسجيل الدخول</p>
                        </div>
                        <div class="card-body pt-0">
                            <!-- action="{{route('login2')}}" -->
						<form method="POST" action="{{route('login2')}}" >
                        @csrf
                                <div class="form-group">
                                    <label class="label-text1">رقم الجوال</label>
									<input type="text" name="phone"  id="phone" 
                                    class="form-control mb-3  @error('phone') is-invalid @enderror"  
                                    placeholder=" رقم الجوال" required="">
                                	@error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
								</div>
                                <div>
                                    <button   type="submit"  class="buttton-login w-100">تسجيل دخول</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center footer-bg">
                        @if (Route::has('register'))
                                <p class="card-footer-p"> ليس لدي حساب؟  <a href="{{route('register') }}" class="text-blue">إنشاء حساب</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <script type="text/javascript">

            $(document).ready(function() {

                     $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                } });
                $.ajax({
                    type: "post",
                    url: "{{route('login2')}}",
                    dataType: "json",
                    success: function (data) {
                        console.log(data); // Output the received JSON data to the console
                        // You can now use the 'data' object as needed in your JavaScript code
                        // For example, access specific properties like data.name, data.age, etc.
                    },
                    error: function (error) {
                        console.error(error);
                    },
                });
            });

//    $('#SubmitFormLogin').on('submit',function(e)
// {
   
//      e.preventDefault();
//     let formData = new FormData($('#SubmitFormLogin')[0]);
//      $.ajaxSetup({
//      headers: {
//      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//               } });
//     $.ajax(
//     {
//     type:"POST",
//     url: "{{route('login2')}}",
//     data:formData,
//     contentType:false, // determint type object 
//     processData: false,  // processing on response 
//     success:function(response)
//     {
//        console.log(response);
//        window.location.href = "{{ route('home') }}";

//        },
 
//    error: function(response) 
//     {  
 
//         swal({
//             icon: 'error',
//             title: 'Oops...',
//             text: response.responseJSON.message
//              })
       
  
    
//     },
//    });
  
// });
 </script>
    </section>
     
@endsection

