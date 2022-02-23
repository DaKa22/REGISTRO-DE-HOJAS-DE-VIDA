<!doctype html>
<html lang="es">

    @include('layouts.src.head')

    <body data-topbar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('layouts.src.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.src.menu')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">


                    @yield('content')

                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->

                @include('layouts.src.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->

        @include('layouts.src.scripts')

    </body>
</html>
