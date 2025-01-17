@extends('layouts.master-without-nav')
@section('title') Sign Up @endsection
@section('body') <body class="auth-bg 100-vh"> @endsection
    @section('content')

        <div class="bg-overlay bg-light"></div>
    
        <div class="account-pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100 py-0 py-xl-4">
    
                                    <div class="text-center mb-5">
                                        <a href="{{url('/')}}">
                                            <span class="logo-lg">
                                                <img src="{{URL::asset('build/images/logo-dark.png')}}" alt="" height="21">
                                            </span>
                                        </a>
                                    </div>
    
                                    <div class="card my-auto overflow-hidden">
                                            <div class="row g-0">
                                                <div class="col-lg-6">
                                                    <div class="p-lg-5 p-4">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">Create New Account</h5>
                                                            <p class="text-muted mt-2">Get your free Invoika account now</p>
                                                        </div>
                                                    
                                                        <div class="mt-4">
                                                            <form action="{{url('signup')}}" method="POST" class="auth-input" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="mb-3 col-lg-6">
                                                                        <label for="first_name " class="form-label">First Name  </label>
                                                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Enter First Name" autocomplete="off">

                                                                        @error('first_name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3 col-lg-6">
                                                                        <label for="last_name " class="form-label">Last Name <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Enter Last Name" autocomplete="off">

                                                                        @error('last_name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="mb-3 col-lg-6">
                                                                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Enter username" autocomplete="off">

                                                                        @error('username')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3 col-lg-6">
                                                                        <label for="mobile_number" class="form-label">Mobile <span class="text-danger">*</span></label>
                                                                        <input type="tel" class="form-control @error('mobile_number') is-invalid @enderror" id="mobile_number" name="mobile_number" placeholder="Enter Mobile" autocomplete="off">

                                                                        @error('mobile_number')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="email " class="form-label">Email <span class="text-danger">*</span></label>
                                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" autocomplete="off">

                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                            
                                                                <div class="mb-2">
                                                                    <label for="userpassword" class="form-label">Password <span class="text-danger">*</span></label>
                                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                                        <input type="password" class="form-control pe-5 password-input @error('password') is-invalid @enderror" placeholder="Enter password" id="password-input" name="password">
                                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="las la-eye align-middle fs-18"></i></button>
                                                                   </div>

                                                                    @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="profile_image " class="form-label">Profile Image <span class="text-danger">*</span></label>
                                                                    <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image" name="profile_image">

                                                                    @error('profile_image')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                    
                                                                <div class="fs-16 pb-2">
                                                                    <p class="mb-0 fs-14 text-muted fst-italic">By registering you agree to the Invoika <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a></p>
                                                                </div>
                    
                                                                <div class="mt-2">
                                                                    <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                                                </div>
                    
                                                                <div class="mt-4 text-center">
                                                                    <div class="signin-other-title">
                                                                        <h5 class="fs-15 mb-3 title">Create account with</h5>
                                                                    </div>
                                    
                                                                    <ul class="list-inline">
                                                                        <li class="list-inline-item">
                                                                            <a href="javascript:void()" class="social-list-item bg-primary text-white border-primary">
                                                                                <i class="mdi mdi-facebook"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="javascript:void()" class="social-list-item bg-info text-white border-info">
                                                                                <i class="mdi mdi-twitter"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="javascript:void()" class="social-list-item bg-danger text-white border-danger">
                                                                                <i class="mdi mdi-google"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                    
                                                                <div class="mt-4 text-center">
                                                                    <p class="mb-0">Already have an account ? <a href="{{url('/')}}" class="fw-medium text-primary text-decoration-underline"> Signin </a> </p>
                                                                </div>
                                                            </form>
                                                        </div>
                                    
                                                    </div>
                                                </div>
                    
                                                <div class="col-lg-6">
                                                    <div class="d-flex h-100 bg-auth align-items-end">
                                                        <div class="p-lg-5 p-4">
                                                            <div class="bg-overlay bg-primary"></div>
                                                            <div class="p-0 p-sm-4 px-xl-0 py-5">
                                                                <div id="reviewcarouselIndicators" class="carousel slide auth-carousel" data-bs-ride="carousel">
                                                                    <div class="carousel-indicators carousel-indicators-rounded">
                                                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                                    </div>
                                                                
                                                                    <!-- end carouselIndicators -->
                                                                    <div class="carousel-inner mx-auto">
                                                                        <div class="carousel-item active">
                                                                            <div class="testi-contain text-center">
                                                                                <h5 class="fs-20 text-white mb-0">“I feel confident
                                                                                    imposing
                                                                                    on myself”
                                                                                </h5>
                                                                                <p class="fs-15 text-white-50 mt-2 mb-0">Vestibulum auctor orci in risus iaculis consequat suscipit felis rutrum aliquet iaculis
                                                                                    augue sed tempus In elementum ullamcorper lectus vitae pretium Nullam ultricies diam
                                                                                    eu ultrices sagittis.</p>
                                                                            </div>
                                                                        </div>
                        
                                                                        <div class="carousel-item">
                                                                            <div class="testi-contain text-center">
                                                                                <h5 class="fs-20 text-white mb-0">“Our task must be to
                                                                                    free widening circle”</h5>
                                                                                <p class="fs-15 text-white-50 mt-2 mb-0">
                                                                                    Curabitur eget nulla eget augue dignissim condintum Nunc imperdiet ligula porttitor commodo elementum
                                                                                    Vivamus justo risus fringilla suscipit faucibus orci luctus
                                                                                    ultrices posuere cubilia curae ultricies cursus.
                                                                                </p>
                                                                            </div>
                                                                        </div>
                        
                                                                        <div class="carousel-item">
                                                                            <div class="testi-contain text-center">
                                                                                <h5 class="fs-20 text-white mb-0">“I've learned that
                                                                                    people forget what you”</h5>
                                                                                <p class="fs-15 text-white-50 mt-2 mb-0">
                                                                                    Pellentesque lacinia scelerisque arcu in aliquam augue molestie rutrum Fusce dignissim dolor id auctor accumsan
                                                                                    vehicula dolor
                                                                                    vivamus feugiat odio erat sed  quis Donec nec scelerisque magna
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end carousel-inner -->
                                                                </div>
                                                                <!-- end review carousel -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                    </div>
                                    <!-- end card -->
                                    
                                    <div class="mt-5 text-center">
                                        <p class="mb-0 text-muted">©
                                            <script>document.write(new Date().getFullYear())</script> Invoika. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

    @endsection
    @section('scripts')
        <!-- password-addon init -->
        <script src="{{URL::asset('build/js/pages/password-addon.init.js')}}"></script>
    @endsection