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
        <title>SisenSecurity | Usuarios

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
                                            <h4 class="header-title">Reporte de Usuario</h4>



                                            <div class="table-responsive">
                                                {{-- <table class="table w-auto small  mb-0" style="font-size: .7.5rem;"   id="user_impresion"> --}}
                                                    <table class="table w-auto small  mb-0" style="font-size: 13px;"   id="user_impresion">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center align-middle" style="max-width: 1rem">#</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">Cedula</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">Primer Nombre</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">Segundo Nombre</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">Primer Apellido</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">Segundo Apellido</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">telefono</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">direccion</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">email</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">genero</th>
                                                            <th class="text-center align-middle" style="max-width: 10rem">nacionalidad</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">estado civil</th>
                                                            <th class="text-center align-middle" style="max-width: 8rem">fecha nacimiento</th>
                                                            <th class="text-center align-middle">rh</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $user)
                                                            <tr>
                                                                <th scope="row">{{ $user->id }}</th>

                                                                <td>{{ $user->cedula }}</td>
                                                                <td>{{ $user->nombre1 }}</td>
                                                                <td>{{ $user->nombre2 }}</td>
                                                                <td>{{ $user->apellido1 }}</td>
                                                                <td>{{ $user->apellido2 }}</td>
                                                                <td>{{ $user->telefono }}</td>
                                                                <td>{{ $user->direccion }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>{{ $user->genero }}</td>
                                                                <td>{{ $user->nacionalidad }}</td>
                                                                <td>{{ $user->estado_civil }}</td>
                                                                <td>{{ $user->fecha_nacimiento }}</td>
                                                                <td>{{ $user->rh }}</td>
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








