<!-- JAVASCRIPT -->
<script src="{{URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('build/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{URL::asset('build/libs/node-waves/waves.min.js')}}"></script>
<script src="{{URL::asset('build/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{URL::asset('build/js/plugins.js')}}"></script>
<script src="{{ URL::asset('build/libs/toastify-js/src/toastify.js') }}"></script>

@yield('scripts')

<!-- App js -->
<script src="{{URL::asset('build/js/app.js')}}"></script>

<script>

    @if (Session::has('success'))
        Toastify({
        text: "{{ session('success') }}",
        duration: 3000,
        close: true,
        gravity: "top", // `top` or `bottom`
        positionLeft: false, // `true` or `false`
        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
        }).showToast();
    @endif
    @if (Session::has('error'))
        Toastify({
        text: "{{ session('error') }}",
        duration: 3000,
        close: true,
        gravity: "top", // `top` or `bottom`
        positionLeft: false, // `true` or `false`
        backgroundColor: "linear-gradient(to right, #ff947d, #f06548)",
        }).showToast();
    @endif

</script>
@yield('script-bottom')