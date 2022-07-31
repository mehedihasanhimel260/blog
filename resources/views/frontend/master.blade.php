@include('frontend.includes.style')
<!-- START main-wrapper -->
<section class="d-flex">

    <!-- start of sidenav -->
    @include('frontend.includes.aside')
    <!-- end of sidenav -->
    <div class="main-content">
        <!-- start of mobile-nav -->
        @include('frontend.includes.mobilenav')
        <!-- end of mobile-nav -->
        @yield('content')
        <!-- start of footer -->
        @include('frontend.includes.footer')
        <!-- end of footer -->
    </div>

</section>
<!-- END main-wrapper -->
@include('frontend.includes.script')
