@include('asset.css')


	<!-- Loader -->
 
	<!-- /Loader -->

	<!-- Page -->
	<div class="page">

		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{url('assets/img/pngs/8.png')}}"
								class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white py-4">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex">
											<a href="{{route('admin.index')}}"><img src="{{url('assets/img/brand/favicon.png')}}"
													class="sign-favicon-a ht-40" alt="logo">
												<img src="{{url('assets/img/brand/favicon-white.png')}}"
													class="sign-favicon-b ht-40" alt="logo">
											</a>
											<h1 class="main-logo1 ms-1 me-0 my-auto tx-28">Va<span>le</span>x</h1>
										</div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>Welcome back!</h2>
												<h5 class="fw-semibold mb-4">Please sign in to continue.</h5>
												<form action = "{{route('login')}}" method = "post">
												@csrf

													<div class="form-group">
														<label>Email</label> 
														<input  name="{{config('fortify.username')}}" class="form-control"
															placeholder="Enter your email" type="text">
													</div>
													<div class="form-group">
														<label>Password</label> <input name =  "password" class="form-control"
															placeholder="Enter your password" type="password">
													</div>
													<!-- <a href="index.html"  class="btn btn-main-primary btn-block">Sign In</a> -->
													<button   type="submit" class="btn btn-main-primary btn-block">  Sign In</button>

													<div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i
																	class="fab fa-facebook-f"></i> Signup with
																Facebook</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block btn-b"><i
																	class="fab fa-twitter"></i> Signup with
																Twitter</button>
														</div>
													</div>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="forgot.html">Forgot password?</a></p>
													<p>Don't have an account? <a href="signup.html">Create an
															Account</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>

	</div>
	@include('asset.js')

	</div>
 