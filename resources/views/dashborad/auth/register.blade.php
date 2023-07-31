@extends('layouts.app')

@section('content')

<section class="login py-5 border-top-1 " style="direction: rtl;">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-lg-7 col-md-8 align-item-center register-bg">
		  <div >
			<h3 class="bg-h2 p-4 text-start">حساب جديد</h3>
			<p class="p-text">أدخل بياناتك لإنشاء حساب</p>
			<form method="POST" action="{{ route('register') }}">
			@csrf
			  <fieldset class="p-4">
				<div class="class-group text-align-right">
					<label for="">الإسم كامل</label>
					<input id="name"   type="text" name="name" :value="old('name')" 
					  autofocus   class="form-control mb-3  "  placeholder="الإسم كامل" required="">
				         	 
 
				</div>
				<div class="class-group text-align-right">
					<label for="">البريد الإلكتروني</label>
					<input   id="email" type="email" name="email" :value="old('email')"     class="form-control mb-3   " type="email" placeholder="البريد الإلكتروني" required="">
					 
		      	</div>
					<div class="class-group text-align-right">
					<label for="phone"> رقم الجوال  </label>
					<input   id="phone" type="phone" name="phone" :value="old('phone')"     class="form-control mb-3    "  placeholder=" رقم الجوال  " required="">
				 
			</div>
		 
				<div class="loggedin-forgot">
				  <p  class="pt-3 pb-2 register-text">عند إنشائك للحساب فأنت توافق على <a href=""> شروط الإستخدام و سياسة الخصوصية</a></p>
				</div>
				<button type="submit" class="w-100 btn btn-primary  mt-3 btn-blue">إنشاء حساب</button>
				<div class="text-center mt-0 register-par">
					<p class="parah">لدي حساب ?	<a class="mt-3 d-inline-block text-primary" href="{{route('login')}}"> تسجيل الدخول</a>
					</p>
				</div>
			  </fieldset>
			</form>
		  </div>
		</div>
	  </div>
	</div>
  </section>




@endsection


 