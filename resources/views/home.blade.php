@extends('layouts.app')

@section('content')
<section class="hero-area bg-1 text-center ">
		<div class="slider">
			<div class="slide_viewer">
				<div class="slide_group">
					<div class="slide">
					</div>
					<div class="slide">
					</div>

				</div>
			</div>
		</div><!-- End // .slider -->

		<div class="slide_buttons">
		</div>
	</section>


	<!--===========================================
=            Popular deals section            =
============================================-->

	<section class="popular-deals section bg-gray">
		<div class="container">
			<div class="row">
			@if(!empty($ser))
					@foreach($ser as $item)
				<div class="col-md-4">
					<div data-aos="fade-right">
						<div class="card task1 ">
							<div class="card-body padding-card">
								<div>
									<img width="50"  src="{{('/storage_upload/'.$item->icon)}}"alt="">
									<h5>  {{$item->header}}  </h5>
									<p>         {{$item->body}}       </p>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif
				<!-- <div class="col-md-4">
					<div data-aos="fade-up" data-aos-duration="3000">
						<div class="card task1 ">
							<div class="card-body padding-card">
								<div>
									<img width="50" src="{{url('assets/images/blog/Group 119 (1).png')}}" alt="">
									<h5>إتفق مع البائع</h5>
									<p>سننشأ جروب <span class="new">واتساب</span> بينك أنت والبائع لتقومو بالإتفاق على تفاصيل الطلب</p>
								</div>
							</div>
						</div>
					</div>

				</div> -->

				<!-- <div class="col-md-4">
					<div data-aos="fade-left">
						<div class="card task1 ">
							<div class="card-body padding-card">
								<div>
									<img width="50" src="{{URL('assets/images/blog/Group 5.png')}}" alt="">
									<h5>طلب جديد</h5>
									<p>إطلب الأن <span class="new">طلب جديد </span> أو <span class="new">خدمة</span> وأدخل رقم البائع وبيانات الطلب</p>
								</div>
							</div>
						</div>
					</div>

				</div> -->
			</div>

		</div>
		</div>
		
	</section>



	<!--==========================================
=            All Category Section            =
===========================================-->

	<section class=" section">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
						<div class="card padding-video">
							<div class="card-body card-video">

								<a id="play-video" class="video-play-button" href="#">
									<span></span>
								  </a>
								  
								  
								  <div id="video-overlay" class="video-overlay">
									<a class="video-overlay-close">&times;</a>
								  </div>
							</div>
						</div>
					</div>

				</div>
				<div class="allows col-md-5">
					<div data-aos="zoom-out-left">
						<div class="card">
							<div class="card-body">
								<div class="image_bg">
									<img width="40" src="{{url('assets/images/blog/Group 99.png')}}" alt="">
								</div>
								<div class="about">
									<h5><span class="new">ضمين</span>, ضمينك الدائم</h5>
									<p> يضمن لك ضمين عملية الشراء أو طلب خدمة من جودة البضاعة والسعر والتوصيل لعندك</p>
									</p>
									<button class="buttons" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</button>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
		<!-- Container End -->
	</section>

	<section class="section">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 abouts task2">
					<div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
						<div class="image_bg">
							<img width="40" src="{{url('assets/images/blog/_Compound Path_.png')}}" alt="">
						</div>
						<div class="about1">
							<h5><span class="new">ضمين</span>, دايم واقف بصفك </h5>
							<p>ضمين دايم واقف بصفك من لحظة إنشائك للطلب حتى وصوله لحد عندك</p>
							<button class="buttons" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</button>
						</div>
						<div class="test">
							<img class="path" src="{{url('assets/images/blog/path.png')}}" alt="">
						</div>
					</div>

				</div>
				<div class="col-md-4">
					<div data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
						<img class="image-card1" src="{{url('assets/images/blog/Group 105.png')}}" alt="">

					</div>
				</div>
				<div class="col-md-4 ">
					<div data-aos="zoom-out-down">
						 <img class="image-card image-card2" src="{{url('assets/images/blog/Group 106.png')}}" alt="">
					</div>

					<div data-aos="zoom-out-left">
						<img class="mt-3 image-card3" src="{{url('assets/images/blog/Group 107.png')}}" alt="">
					</div>

				</div>


			</div>
		</div>
	</section>

	<section class="section">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 abouts ">
					<div class="image_bg">
						<img width="60" src="{{url('assets/images/blog/Group 100.png')}}" alt="">
					</div>
					<div class="about2 ">
						<h5>ماذا قالو عن <span class="new">ضمين</span></h5>
						<p>ماذا قال عنا عملاؤنا وعن خدمات ضمين ...</p>
					</div>
				</div>
			</div>
			<div class="row row-cols-1 row-cols-md-3 g-4 mb-3">

				<div class="col">
					<div data-aos="zoom-in-right">
						<div class="card h-100">
							<div class="card-body backgroud-text">
								<p class="card-text">“هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
									هذا
									النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
									إضافة إلى زيادة عدد الحروف التى يولدها ”</p>
							</div>
							<div class="card-footer backgroud-text-footer">
								<small class="text-body-secondary">عماد العنزي</small>
							</div>
						</div>
					</div>

				</div>
				<div class="col">
					<div data-aos="zoom-in-up">
						<div class="card h-100">

							<div class="card-body backgroud-text">

								<p class="card-text">“هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
									هذا
									النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
									إضافة إلى زيادة عدد الحروف التى يولدها ”</p>
							</div>
							<div class="card-footer backgroud-text-footer">
								<small class="text-body-secondary">عماد العنزي</small>
							</div>
						</div>
					</div>

				</div>
				<div class="col">
					<div data-aos="zoom-in-left">
						<div class="card h-100">

							<div class="card-body backgroud-text">

								<p class="card-text">“هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
									هذا
									النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
									إضافة إلى زيادة عدد الحروف التى يولدها ”</p>
							</div>
							<div class="card-footer backgroud-text-footer">
								<small class="text-body-secondary">عماد العنزي</small>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="blues row row-cols-1 row-cols-md-3 g-4">
				<div class="colse col">
					<div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
						<div class="card h-100">

							<div class="card-body backgroud-text">

								<p class="card-text">“هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
									هذا
									النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
									إضافة إلى زيادة عدد الحروف التى يولدها ”</p>
							</div>
							<div class="card-footer backgroud-text-footer">
								<small class="text-body-secondary">عماد العنزي</small>
							</div>
						</div>
					</div>

				</div>
				<div class="colse col">
					<div data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300"
						data-aos-offset="0">
						<div class="card h-100">

							<div class="card-body backgroud-text">

								<p class="card-text">“هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
									هذا
									النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
									إضافة إلى زيادة عدد الحروف التى يولدها ”</p>
							</div>
							<div class="card-footer backgroud-text-footer">
								<small class="text-body-secondary">عماد العنزي</small>
							</div>
						</div>
					</div>

				</div>
				<div class="colse col">
					<div data-aos="fade-up" data-aos-anchor-placement="top-center">
						<div class="card h-100">

							<div class="card-body backgroud-text">

								<p class="card-text">“هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد
									هذا
									النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
									إضافة إلى زيادة عدد الحروف التى يولدها ”</p>
							</div>
							<div class="card-footer backgroud-text-footer">
								<small class="text-body-secondary">عماد العنزي</small>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<!-- Container Start -->

		<img class="path2" src="{{url('assets/images/blog/_Path_.svg')}}" alt="">

		<div class="container">
			<div class="row">
				<div class="col-md-12 abouts">
					<div class="about2">
						<h5>شركاء ضمين</h5>
						<p>شركاء نجاح ضمين دائما وأبدا...</p>
					</div>
				</div>
			</div>
			<div class="grid text-center d-flex">
				<div class="total"></div>
				<div class="total"></div>
				<div class="total"></div>
				<div class="total"></div>
				<div class="total"></div>

			</div>
			<div class="grid text-center mt-2 d-flex justify-content-center">
				<div class="total"></div>
				<div class="total"></div>


			</div>
		</div>
	</section>

@endsection
