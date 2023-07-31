


 
<footer class="footer section section-sm">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-footer">
					<ul class=" ">
						<li class="nav-item ">
							<a class="nav-link text-white" href="index.html" data-bs-toggle="modal" data-bs-target="#exampleModal1">الشروط والاحكام</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link text-white" href="index.html" data-bs-toggle="modal" data-bs-target="#exampleModal2"> سياسة الخصوصية</a>
						</li>
						</li>

					</ul>
				</div>

				<div class="col-md-6 col-footer">
					<ul class=" list-footer">
						<li class="nav-item li-text with-footer-link">
							<a class="nav-link" href="Blogs.html">المقالات</a>
						</li>
						<li class="nav-item li-text with-footer-link">
							<a class="nav-link action" href="index.html">من نحن</a>
						</li>
						<li class="nav-item li-text bg-active with-footer-link">
							<a class="nav-link" href="index.html" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</a>
						</li>
						<li class="nav-item li-text">
							<a class="nav-link" href="index.html">الرئيسية</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 icon-footer col-footer-image">
					<img class="image-footer" src="{{url('assets/images/footer/icon-footer.png')}}" alt="">
				</div>
			</div>
		</div>
		<!-- Container End -->
	</footer>
	<footer class="footer-bottom">
		<!-- Container Start -->
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<!-- Copyright -->
					<div class="copyright">
						<p>
							<script>

							</script>جميع الحقوق محفوظة لدى <a class="text-white" href="https://themefisher.com">ضمين @2023</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- Container End -->
		<!-- To Top -->
		<div class="scroll-top-to" style="display: block;">
			<i class="fa fa-angle-up"></i>
		</div>
	</footer>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header d-block modal-header-edit " style="border: 0;">
			  <h1 class="modal-title fs-5" id="exampleModalLabel">طلب جديد </h1>
			  <p>أدخل رقم البائع ونوع وتفاصيل الطلب</p>
			</div>
		         <div class="modal-body">
			  <form method="post"   id="SubmitFormOrder">
 			  <meta name="csrf-token" content="{{ csrf_token() }}" />

			   <input type="text" class="form-control" name="auth"  id="auth" value="{{Auth::check()}}"  hidden>

 				<div class="form-group label-right mb-3">
				  <label >رقم واتس البائع</label>
				  <input type="text" class="form-control" name="phone" placeholder="رقم واتس البائع" id="recipient-name">
				  <span class="text-danger error-text mobile_err"></span>
				</div>
				<div class="form-group label-right mb-3">
					<label >نوع الطلب</label><br>
					<select class="form-select" name ="form-select" aria-label="Default select example">
						<option selected>إختر نوع الطلب</option>
						<option value="p">منتج</option>
						<option value="s">خدمة</option>
					  </select>
					  <span class="text-danger error-text pswd_err"></span>

				  </div>
				<div class="form-group label-right mb-3">
				  <label >تفاصيل الطلب</label>
				  <textarea class="form-control" id="message-text">تفاصيل الطلب</textarea>
				  <span class="text-danger error-text address_err"></span>

				</div>
				<div class="modal-footer" style="border: 0;">
			  <button type="submit" class="btn btn-send w-100">ارسال </button>
			  </form>

		        </div>
			</div>	
		  </div>
		</div>
     </div>
	  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header modal-header-edit1">
			  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{url('assets/images/blog/close-circle.svg')}}" alt=""></button>
			</div>
			<div class="modal-body modal-body-edit">
			  <h5> الشروط والأحكام</h5>
			 <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header modal-header-edit1">
			  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><img src="{{url('assets/images/blog/close-circle.svg')}}" alt=""></button>
			</div>
			<div class="modal-body modal-body-edit">
			  <h5>  سياسة الخصوصية</h5>
			 <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.</p>
			</div>
		  </div>
		</div>
	  </div>
 
