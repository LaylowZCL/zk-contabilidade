@extends('layouts.master-without-nav')
@section('title')
    Reset Password
@endsection
@section('body')

    <body class="auth-bg 100-vh">
    @endsection
    @section('content')
        <div class="account-pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="auth-full-page-content d-flex min-vh-100 py-sm-5 py-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100 py-0 py-xl-4">

                                    <div class="text-center mb-5">
                                        <a href="index">
                                            <span class="logo-lg">
                                                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt=""
                                                    height="21">
                                            </span>
                                        </a>
                                    </div>

                                    <div class="card my-auto overflow-hidden">
                                        <div class="row g-0">
                                            <div class="col-lg-6">
                                                <div class="p-lg-5 p-4">
                                                    <div class="text-center">
                                                        <h5 class="mb-0">Forgot Password?</h5>
                                                        <p class="text-muted mt-2">Reset password with Invoika</p>
                                                    </div>

                                                    <div class="text-center my-5">
                                                        <div class="alert alert-borderless alert-warning text-center mb-2 mx-2"
                                                            role="alert">
                                                            Enter your email and instructions will be sent to you!
                                                        </div>
                                                    </div>

                                                    <div class="mt-4">
                                                        <form action="{{ url('forget-password') }}" method="POST"
                                                            name="loginForm" class="auth-input">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                                <input type="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    id="email" name="email" placeholder="Enter your registered email">

                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert"
                                                                        id="emailError">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="mt-2">
                                                                <button class="btn btn-primary w-100" type="submit">Send
                                                                    Reset Link</button>
                                                            </div>

                                                            <div class="mt-4 text-center">
                                                                <p class="mb-0">Wait, I remember my password... <a
                                                                        href="{{ url('/') }}"
                                                                        class="fw-medium text-primary text-decoration-underline">
                                                                        Click here </a> </p>
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
                                                            <div id="reviewcarouselIndicators"
                                                                class="carousel slide auth-carousel"
                                                                data-bs-ride="carousel">
                                                                <div
                                                                    class="carousel-indicators carousel-indicators-rounded">
                                                                    <button type="button"
                                                                        data-bs-target="#reviewcarouselIndicators"
                                                                        data-bs-slide-to="0" class="active"
                                                                        aria-current="true" aria-label="Slide 1"></button>
                                                                    <button type="button"
                                                                        data-bs-target="#reviewcarouselIndicators"
                                                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                                    <button type="button"
                                                                        data-bs-target="#reviewcarouselIndicators"
                                                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                                </div>

                                                                <!-- end carouselIndicators -->
                                                                <div class="carousel-inner mx-auto">
                                                                    <div class="carousel-item active">
                                                                        <div class="testi-contain text-center">
                                                                            <h5 class="fs-20 text-white mb-0">“I feel
                                                                                confident
                                                                                imposing
                                                                                on myself”
                                                                            </h5>
                                                                            <p class="fs-15 text-white-50 mt-2 mb-0">
                                                                                Vestibulum auctor orci in risus iaculis
                                                                                consequat suscipit felis rutrum aliquet
                                                                                iaculis
                                                                                augue sed tempus In elementum ullamcorper
                                                                                lectus vitae pretium Nullam ultricies diam
                                                                                eu ultrices sagittis.</p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="carousel-item">
                                                                        <div class="testi-contain text-center">
                                                                            <h5 class="fs-20 text-white mb-0">“Our task must
                                                                                be to
                                                                                free widening circle”</h5>
                                                                            <p class="fs-15 text-white-50 mt-2 mb-0">
                                                                                Curabitur eget nulla eget augue dignissim
                                                                                condintum Nunc imperdiet ligula porttitor
                                                                                commodo elementum
                                                                                Vivamus justo risus fringilla suscipit
                                                                                faucibus orci luctus
                                                                                ultrices posuere cubilia curae ultricies
                                                                                cursus.
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="carousel-item">
                                                                        <div class="testi-contain text-center">
                                                                            <h5 class="fs-20 text-white mb-0">“I've learned
                                                                                that
                                                                                people forget what you”</h5>
                                                                            <p class="fs-15 text-white-50 mt-2 mb-0">
                                                                                Pellentesque lacinia scelerisque arcu in
                                                                                aliquam augue molestie rutrum Fusce
                                                                                dignissim dolor id auctor accumsan
                                                                                vehicula dolor
                                                                                vivamus feugiat odio erat sed quis Donec nec
                                                                                scelerisque magna
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
                                            <script>
                                                document.write(new Date().getFullYear())
                                            </script> Invoika. Crafted with <i
                                                class="mdi mdi-heart text-danger"></i> by Themesbrand
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
        <!-- JAVASCRIPT -->
        <script src={{ URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js') }}></script>
        <script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ URL::asset('build/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ URL::asset('build/js/plugins.js') }}"></script>
        <!-- password-addon init -->
        <script src="{{ URL::asset('build/js/pages/password-addon.init.js') }}"></script>
    @endsection
