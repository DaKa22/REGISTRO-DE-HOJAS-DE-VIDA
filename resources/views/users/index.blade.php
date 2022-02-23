@extends('layouts.app')
@section('titulo') Usuarios @endsection

@section('content')
<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Usuarios</h4>

                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-light btn-rounded" type="button" data-toggle="modal" data-target="#modal_crearUser">
                            <i class="mdi mdi-plus mr-1"></i> Agregar
                        </button>
                        <a href="{{route('imprimir.users')}}">
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
                        <h4 class="header-title">Reporte de Usuarios</h4>

                        @if (session()->has('created') && session()->has('mensaje'))
                            <div class="alert {{ session('created') == 1 ? 'alert-success' : 'alert-danger' }} mb-2" role="alert">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="user_index">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" style="min-width: 3rem">#</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">Cedula</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">Primer Nombre</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">Segundo Nombre</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">Primer Apellido</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">Segundo Apellido</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">telefono</th>
                                        <th class="text-center align-middle" style="min-width: 10rem">direccion</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">email</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">genero</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">nacionalidad</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">estado civil</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">fecha nacimiento</th>
                                        <th class="text-center align-middle">rh</th>
                                        <th class="text-center align-middle" style="min-width: 8rem"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                                        </svg></th>
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

                                            <td>
                                                <button class="btn btn-danger" onclick="deleteUser({{ $user->id }})"><i class="fa fa-trash"></i></button>
                                                <button class="btn btn-info" onclick="updateUser({{ $user->id }})"><i class="fa fa-edit"></i></button>

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

{{-- Modal para crear Users o editarlos --}}
<div class="modal fade bs-example-modal-center" id="modal_crearUser" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titulo" >Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="cedula">Cedula</label>
                            <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Escriba La cedula " required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="nombre1">Primer Nombre</label>
                            <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Escriba El primer nombre" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="nombre2">Segundo Nombre</label>
                            <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Escriba El Segundo Nombre" >
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="apellido1">Primer Apellido</label>
                            <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Escriba El Primer Apellido" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Escriba El segundo Apellido" >
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Escriba El Telefono" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Escriba La Direccion" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email">Correo Electronico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Escriba su Email" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="genero">Genero</label>
                            <select name="genero" id="genero" class="form-control">
                                <option value="Hombre" selected >Hombre</option>
                                <option value="Mujer" >Mujer</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="nacionalidad">Nacionalidad</label>
                            <select name="nacionalidad" id="nacionalidad" class="form-control">
                                <option value="Colombiano" selected >Colombiano</option>
                                <option value="Extranjero"  >Extranjero</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="estado_civil">Estado Civil</label>
                            <select name="estado_civil" id="estado_civil" class="form-control">
                                <option value="Soltero" selected >Soltero</option>
                                <option value="Casado" >Casado</option>
                                <option value="Separado" >Separado</option>
                                <option value="Viudo" >Viudo</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Seleccione su Fecha de nacimiento" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="rh">RH</label>
                            <select name="rh" id="rh" class="form-control">
                                <option value="A+"  selected>A+</option>
                                <option value="A-"  >A-</option>
                                <option value="B+"  >B+</option>
                                <option value="B-"  >B-</option>
                                <option value="AB+" >AB+</option>
                                <option value="AB-" >AB-</option>
                                <option value="O+"  >O+</option>
                                <option value="O-"  >O-</option>
                            </select>
                        </div>
                        {{-- <div class="col-md-12 mb-3">
                            <label for="descripcion">Sublinea</label>
                            <select name="sublinea_id" id="sublinea_id" class="form-control">
                                <option value="" selected disabled>Seleccione Sublinea</option>
                                @foreach ($sublineas as $sublinea)
                                    <option value="{{$sublinea->id}}">{{$sublinea->descripcion}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <input type="hidden" id="id" name="id" value="">
                    <button class="btn btn-primary" type="submit">Enviar</button>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection


@section('myScripts')
    <script src="{{asset('assets/js/CRUD.js')}}"></script>
@endsection
