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
        <title>SisenSecurity | Tabla de Estudios

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
                                            <h4 class="header-title">Reporte Tabla de Estudio </h4>



                                            <div class="table-responsive">
                                                {{-- <table class="table w-auto small  mb-0" style="font-size: .7.5rem;"   id="user_impresion"> --}}
                                                    <table class="table w-auto small  mb-0" style="font-size: 15px;"   id="user_impresion">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle" style="min-width: 3rem">#</th>
                                                            <th class="text-center align-middle" style="min-width: 10rem">Usuario</th>
                                                            <th class="text-center align-middle" style="min-width: 10rem">Identificacion</th>
                                                            <th class="text-center align-middle" style="min-width: 8rem">Titulo</th>
                                                            <th class="text-center align-middle" style="min-width: 8rem">Entidad Educativa</th>
                                                            <th class="text-center align-middle" style="min-width: 8rem">Fecha Terminacion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tabla_estudios as $tabla_estudio)
                                                        <tr>
                                                            <th scope="row">{{ $tabla_estudio->id }}</th>

                                                            <td>{{ $tabla_estudio['users']['nombre1'].' '.$tabla_estudio['users']['apellido1'] }}</td>
                                                            <td>{{ $tabla_estudio['users']['cedula'] }}</td>
                                                            <td>{{ $tabla_estudio->titulo }}</td>
                                                            <td>{{ $tabla_estudio->entidad_educativa }}</td>
                                                            <td>{{ $tabla_estudio->fecha_terminacion }}</td>
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








