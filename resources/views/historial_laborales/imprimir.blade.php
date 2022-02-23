<!doctype html>
<html lang="es">
    <style>

        @page {
		margin-left: 0rem;
		margin-right: 0rem;
	    }
    </style>

    <head>
        <meta charset="utf-8" />
        <title>SisenSecurity | Historial Laboral

        <!-- App favicon -->



        <!-- Bootstrap Css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Icons Css -->

        <!-- App Css-->


        <!-- CSRF TOKEN-->

    </head>

    <body data-topbar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">



            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <div class="page-content-wrapper">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Reporte Historial Laboral </h4>



                                            <div class="table-responsive">
                                                {{-- <table class="table w-auto small  mb-0" style="font-size: .7.5rem;"   id="user_impresion"> --}}
                                                    <table class="table w-auto small  mb-0" style="font-size: 15px;"   id="historial_laboral_impresion">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle" style="min-width: 3rem">#</th>
                                                                <th class="text-center align-middle" style="min-width: 10rem">Usuario</th>
                                                                <th class="text-center align-middle" style="min-width: 10rem">Identificacion</th>
                                                                <th class="text-center align-middle" style="min-width: 8rem">empresa</th>
                                                                <th class="text-center align-middle" style="min-width: 8rem">cargo</th>
                                                                <th class="text-center align-middle" style="min-width: 8rem">Fecha Inicio</th>
                                                                <th class="text-center align-middle" style="min-width: 8rem">Fecha Terminacion</th>
                                                                <th class="text-center align-middle" style="min-width: 8rem"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                                                                </svg></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($historial_laborales as $historial_laboral)
                                                                <tr>
                                                                    <th scope="row">{{ $historial_laboral->id }}</th>

                                                                    <td>{{ $historial_laboral['users']['nombre1'].' '.$historial_laboral['users']['apellido1'] }}</td>
                                                                    <td>{{ $historial_laboral['users']['cedula'] }}</td>
                                                                    <td>{{ $historial_laboral->empresa }}</td>
                                                                    <td>{{ $historial_laboral->cargo }}</td>
                                                                    <td>{{ $historial_laboral->fecha_inicio }}</td>
                                                                    <td>{{ $historial_laboral->fecha_terminacion }}</td>

                                                                </tr>
                                                            @endforeach

                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                        </div>
                        <!-- end container-fluid -->
                    </div>

                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->



            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->

        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>








