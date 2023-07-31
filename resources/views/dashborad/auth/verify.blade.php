@extends('layouts.app')

@section('content')

<section class="login py-5 border-top-1 " style="direction: rtl;">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-lg-5 col-md-8 align-item-center register-bg">
		  <div >
			<h3 class="bg-h3 p-4 text-start">كود التحقق </h3>
			<p class="p-text">أدخل كود التحقق المرسل إلى رقم الجوال
				<br><span class="color-number">966123456789+</span></p>

			<form action="#">
			  <fieldset class="p-4">
				<div class="row valdaiton">
					<div class="col">
						<input class="form-control mb-3" type="text" required="">
					</div>
					<div class="col">
						<input class="form-control mb-3" type="text"  required="">
					</div>
					<div class="col">
						<input class="form-control mb-3" type="text"  required="">
					</div>
					<div class="col">
						<input class="form-control mb-3" type="text"  required="">
					</div>
					<div class="col">
						<input class="form-control mb-3" type="text"  required="">
					</div>
				</div>

				<button type="submit" class="w-100 btn btn-primary  mt-3 btn-blue">تحقق </button>
				<div class="text-center mt-0 register-par">
					<p class="parah"><a class="mt-3 d-inline-block text-primary" href="login.html"> إعادة ارسال كود تحقق </a>
					</p>
				</div>
			  </fieldset>
			</form>
		  </div>
		</div>
	  </div>
	</div>
  </section>
  <script>

	</script>


@endsection
