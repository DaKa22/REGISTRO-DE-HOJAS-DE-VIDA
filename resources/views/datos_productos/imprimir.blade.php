<!doctype html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <title>RyanCompany | Linea

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
                                            <h4 class="header-title">Reporte Datos de Productos </h4>

                                            @if (session()->has('created') && session()->has('mensaje'))
                                                <div class="alert {{ session('created') == 1 ? 'alert-success' : 'alert-danger' }} mb-2" role="alert">
                                                    {{ session('mensaje') }}
                                                </div>
                                            @endif

                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Codigo de Producto</th>
                                                            <th>Descripcion</th>
                                                            <th>Ultimo Costo</th>
                                                            <th>Stock</th>
                                                            <th>Linea</th>
                                                            <th>Sublinea</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($datos_productos as $datos_producto)
                                                            <tr>
                                                                <th scope="row">{{ $datos_producto->id }}</th>

                                                                <td>{{ $datos_producto->codigo_producto }}</td>
                                                                <td>{{ $datos_producto->descripcion }}</td>
                                                                <td>{{ $datos_producto->costo_ultimo }}</td>
                                                                <td>{{ $datos_producto->stock }}</td>
                                                                <td>{{ $datos_producto->lineas->descripcion }}</td>
                                                                <td>{{ $datos_producto->sublineas->descripcion }}</td>


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

        <script src="{{asset('assets/js/CRUD.js')}}">  </script>



    </body>
</html>








