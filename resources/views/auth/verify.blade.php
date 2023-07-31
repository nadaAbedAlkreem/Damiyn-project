@extends('layouts.app')

@section('content')
 
<section class="login py-5 border-top-1 " style="direction: rtl;">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-lg-5 col-md-8 align-item-center register-bg">
		  <div >
			<h3 class="bg-h3 p-4 text-start">كود التحقق </h3>
			<p class="p-text">أدخل كود التحقق المرسل إلى رقم الجوال
				<br><span class="color-number">966 {{$phone}}+</span></p>
			<form   action="{{route('verification.action')}}" method = "post">
			@csrf
			  <fieldset class="p-4">
			  <input name = "phone" value = "{{$phone}}" class="form-control mb-3" type="text"  hidden>

				<div class="row valdaiton">
					<div class="col">
						<input name = "num5" class="form-control mb-3" type="text" required="">
					</div>
					<div class="col">
						<input  name = "num4" class="form-control mb-3" type="text"  required="">
					</div>
					<div class="col">
						<input  name = "num3" class="form-control mb-3" type="text"  required="">
					</div>
					<div class="col">
						<input  name = "num2" class="form-control mb-3" type="text"  required="">
					</div>
					<div class="col">
						<input  name = "num1" class="form-control mb-3" type="text"  required="">
					</div>
				</div>

				<button  type="submit" class="w-100 btn btn-primary  mt-3 btn-blue">تحقق </button>
 						<div style="justify-content: center;   display: flex;   align-items: center;" id="countdown"></div>
 				<div class="text-center mt-0 register-par">
					<p class="parah" id = "reload-send-btn"><a class="mt-3 d-inline-block text-primary"  > إعادة ارسال كود تحقق </a>
					</p>
				</div>
			  </fieldset>
			</form>
		  </div>
		</div>
	  </div>
	</div>
  </section>
  
 
  <script type="text/javascript">
		

		var totalSeconds = 60; // Total seconds for 1 minute
		var timeLeft = totalSeconds;
		var countdownTimer = setInterval(function() {
		var minutes = Math.floor(timeLeft / 60);
		var seconds = timeLeft % 60;
		var countdownElement = document.getElementById("countdown");
		
		if (timeLeft <= 0) {
			clearInterval(countdownTimer);
			swal(
				{
				title: ` انتهت المهلة `,
				text: " اضغط على اعادة الارسال ",
				icon: "warning",
				dangerMode: true,
				
				})   
	 
			countdownElement.innerHTML = "00:00";
			location.reload();

		} else {
			countdownElement.innerHTML = minutes + ":" + seconds + "";
		}
		
		timeLeft -= 1;
		}, 1000);
		const  btn_send = document.getElementById("reload-send-btn");
		btn_send.addEventListener("click", function() {
			location.reload();
		 
	});

 
		

 
</script>

@endsection
