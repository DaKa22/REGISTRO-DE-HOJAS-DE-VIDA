@extends('layouts.app')
@section('titulo') Movimientos @endsection

@section('content')
<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Movimientos</h4>
                {{-- <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                <li class="breadcrumb-item active">Basic Tables</li> --}}
                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-light btn-rounded" type="button" data-toggle="modal" data-target="#modal_crearMovimiento">
                            <i class="mdi mdi-plus mr-1"></i> Agregar
                        </button>
                        <a href="{{route('imprimir.movimientos')}}">
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
                        <h4 class="header-title">Reporte de Movimientos</h4>

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
                                        <th>Tipo de Movimiento</th>
                                        <th>Cedula de Movimiento</th>
                                        <th>Nombre de Movimiento</th>
                                        <th>Fecha de Movimiento</th>
                                        <th>Valor Total del Movimiento</th>
                                        <th>Configuracion</th>
                                        <th><i class="fa fa-settings"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movimientos as $movimiento)
                                        <tr>
                                            <th scope="row">{{ $movimiento->id }}</th>
                                            <td>
                                                @if ($movimiento->tipo_movimiento == 0)
                                                    Entrada
                                                @else
                                                Salida
                                                @endif


                                             </td>
                                            <td>{{ $movimiento->cedula_movimiento }}</td>
                                            <td>{{ $movimiento->nombre_movimiento }}</td>
                                            <td>{{ $movimiento->fecha_movimiento }}</td>
                                            <td>{{ $movimiento->valor_total_movimiento }}</td>

                                            <td>
                                                <button class="btn btn-danger" onclick="deleteMovimiento({{ $movimiento->id }})"><i class="fa fa-trash"></i></button>
                                                <button class="btn btn-info" onclick="updateMovimiento({{ $movimiento->id }})"><i class="fa fa-edit"></i></button>

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

{{-- Modal para crear Movimientos o editarlos --}}
<div class="modal fade bs-example-modal-center" id="modal_crearMovimiento" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titulo" >Agregar Movimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="tipo_movimiento">Tipo de Movimiento</label>
                            <select class="form-control" name="tipo_movimiento" id="tipo_movimiento" >
                                <option value="0">Entrada</option>
                                <option value="1">Salida</option>
                            </select>

                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="cedula_movimiento">Cedula de Movimiento</label>
                            <input type="number" class="form-control" id="cedula_movimiento" name="cedula_movimiento" placeholder="Escriba la Cedula de Movimiento" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="nombre_movimiento">Nombre de Movimiento</label>
                            <input type="text" class="form-control" id="nombre_movimiento" name="nombre_movimiento" placeholder="Escriba El Nombre de Movimiento" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="valor_total_movimiento">Valor Total del Movimiento</label>
                            <input type="number" class="form-control" id="valor_total_movimiento" name="valor_total_movimiento" placeholder="Escriba el valor total del movimiento" required>
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
