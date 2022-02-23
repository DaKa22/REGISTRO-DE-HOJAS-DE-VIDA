@extends('layouts.app')
@section('titulo') Articulos de Movimiento @endsection

@section('content')
<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Articulos de Movimiento</h4>

                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-light btn-rounded" type="button" data-toggle="modal" data-target="#modal_crearArticulos_movimiento">
                            <i class="mdi mdi-plus mr-1"></i> Agregar
                        </button>
                        <a href="{{route('imprimir.articulos')}}">
                            <button class="btn btn-light btn-rounded" type="button" >
                                <i class="mdi mdi-plus mr-1"></i> PDF
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="page-content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Reporte Articulos Movimiento </h4>

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
                                        <th>Cantidad</th>
                                        <th>Valor</th>
                                        <th>Datos del Producto</th>
                                        <th>Movimientos</th>
                                        <th>Configuracion</th>
                                        <th><i class="fa fa-settings"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articulos_movimientos as $articulos_movimiento)
                                        <tr>
                                            <th scope="row">{{ $articulos_movimiento->id }}</th>

                                            <td>{{ $articulos_movimiento->cantidad }}</td>
                                            <td>{{ $articulos_movimiento->valor }}</td>
                                            <td>{{ $articulos_movimiento->datos_productos->descripcion }}</td>
                                            <td>{{ $articulos_movimiento->movimientos->nombre_movimiento }}</td>

                                            <td>
                                                <button class="btn btn-danger" onclick="deleteArticulos_movimiento({{ $articulos_movimiento->id }})"><i class="fa fa-trash"></i></button>
                                                <button class="btn btn-info" onclick="updateArticulos_movimiento({{ $articulos_movimiento->id }})"><i class="fa fa-edit"></i></button>

                                            </td>
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

{{-- Modal para crear articulos_movimiento o editarlos --}}
<div class="modal fade bs-example-modal-center" id="modal_crearArticulos_movimiento" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titulo" >Agregar Articulo de Momiviento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Escriba La Cantidad" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="valor">Valor</label>
                            <input type="number" class="form-control" id="valor" name="valor" placeholder="Escriba El Valor" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="datos_productos_id">Datos del Producto ID</label>
                            <input type="number" class="form-control" id="datos_productos_id" name="datos_productos_id" placeholder="Escriba El ID del Datos de Producto" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="movimientos_id">Movimientos ID</label>
                            <input type="number" class="form-control" id="movimientos_id" name="movimientos_id" placeholder="Escriba El ID del Movimiento" required>
                        </div>

                    </div>
                    <input type="hidden" id="id" name="id" value="">
                    <button class="btn btn-primary" type="submit">Enviar</button>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection
