<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light navigation">
						<a class="navbar-brand" href="index.html">
							<img src="{{url('assets/images/logo.png')}}" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse"
							data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto main-nav  ">
								<li class="nav-item links ">
									<a class="nav-link" href="{{route('home')}}">الرئيسية</a>
								</li>
								<li class="nav-item links active">
									<a class="nav-link"   data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">طلب جديد</a>
								</li>
						 
								<li class="nav-item links ">
									<a class="nav-link" href="{{route('bloges')}}" >المقالات</a>
								</li>

							</ul>
 

							@if (Auth::check())
							<ul class="navbar-nav ml-auto mt-10">
								<div class="dropdown">
									<div>
										<button class="btn btn-secondary dropdown-toggle" type="button"
											data-bs-toggle="dropdown" aria-expanded="false">
											{{Auth::user()->name}}<br><span>966{{Auth::user()->phone}}+</span>
										</button>
									</div>
									<ul class="dropdown-menu">
										<li class="d-flex"><img class="mr-2" width="20"
												src="{{url('assets/images/blog/frame.svg')}}" alt=""><a class="dropdown-item"
												href="{{route('profile')}}">الحساب الشخصي</a></li>
										<li class="d-flex"><img class="mr-2" width="20"
												src="{{url('assets/images/blog/element-4.svg')}}" alt=""><a class="dropdown-item"
												href="{{route('orders')}}">طلباتي</a></li>
										<li class="d-flex"><img class="mr-2" width="20"
												src="{{url('assets/images/blog/login.svg')}}" alt="">
												<a class="dropdown-item"
												href="{{ route('logout') }}"
												
												> تسجيل الخروج </a></li>
 
									</ul>
								</div>
							</ul>


							@else
 
 							<ul class="navbar-nav ml-auto mt-10">
								<li class="nav-item">
									<a class="nav-link login-button" href="{{url('login')}}">تسجيل دخول</a>
								</li>
								<li class="nav-item">
									<a class="nav-link  add-button" href="{{route('register')}}"> حساب جديد </a>
								</li>
							</ul>
							@endif

 
 


                         





						</div>
					</nav>
				</div>
			</div>
		</div>