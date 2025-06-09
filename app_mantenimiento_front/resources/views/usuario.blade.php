    @extends('layouts.app')

    @section('titulo')
    Home
    @endsection

    @section('contenido')
    <div class="row color-fondo content-page-100 content">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mb-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-small breadcrumb_home text-dark text-capitalize" id="nam_status"
                    aria-current="page">Usuarios</li>
            </ol>
            <div class="mb-2"> <button class="btn btn-success text-small rounded-4" data-bs-toggle="modal" data-bs-target="#modalRegistrarUsuario">
                    <i class="bi bi-person-plus-fill bi-sm"></i> Registrar nuevo usuario</button> </div>
        </nav>
        <div class="text-start">
            <h5 class="text-warning fw-bold"> Usuarios por estado</h5>
        </div>
        <!-- Content Active -->
        <div class="text-end">
            <h6 class="text-success fw-bold"> Usuarios activos</h6>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4" id="active-users-content">
            @empty($usuarios_activos)
            <div class="alert alert-success m-3" role="alert">
                No hay usuarios activos registrados.
            </div>
            @else
            @foreach ($usuarios_activos as $usuario)
            <div class="col" data-record-id="{{ $usuario->id }}">
                <div class="card h-100 rounded-4 text-dark">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ $usuario->img_user}}" class="img-fluid rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;">
                        <h5 class="card-title fw-bold text-center">{{ $usuario->nombre}}</h5>
                        <p class="card-text text-small mb-1 text-center">{{ $usuario->email}}</p>
                        <span class="badge bg-success">{{ $usuario->estado}}</span>
                    </div>
                </div>
            </div>
            @endforeach
            @endempty
        </div>
        <!-- Content inactive -->
        <div class="text-end">
            <h6 class="text-info fw-bold"> Usuarios de vacaciones</h6>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4" id="inactive-users-content">
            @empty($usuarios_vacaciones)
            <div class="alert alert-info m-3" role="alert">
                No hay en vacaciones registrados.
            </div>
            @else
            @foreach ($usuarios_vacaciones as $usuario)
            <div class="col" data-record-id="{{ $usuario->id }}">
                <div class="card h-100 rounded-4 text-dark user-card">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ $usuario->img_user}}" class="img-fluid rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;" alt="User Icon">
                        <h5 class="card-title fw-bold text-center">{{ $usuario->nombre}}</h5>
                        <p class="card-text text-small mb-1 text-center">{{ $usuario->email}}</p>
                        <span class="badge bg-warning">{{ $usuario->estado}}</span>
                    </div>
                </div>
            </div>
            @endforeach
            @endempty
        </div>
        <!-- Content vacations -->
        <div class="text-end">
            <h6 class="text-secondary fw-bold"> Usuarios inactivos</h6>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4" id="inactive-users-content">
            @empty($usuarios_inactivos)
            <div class="alert alert-danger m-3" role="alert">
                No hay usuarios incativos registrados.
            </div>
            @else
            @foreach ($usuarios_inactivos as $usuario)
            <div class="col" data-record-id="{{ $usuario->id }}">
                <div class="card h-100 rounded-4 text-dark user-card">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ $usuario->img_user}}" class="img-fluid rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;" alt="User Icon">
                        <h5 class="card-title fw-bold text-center">{{ $usuario->nombre}}</h5>
                        <p class="card-text text-small mb-1 text-center">{{ $usuario->email}}</p>
                        <span class="badge bg-danger">{{ $usuario->estado}}</span>
                    </div>
                </div>
            </div>
            @endforeach
            @endempty
        </div>
        <!-- Content Table resumen -->

        <div class="text-start">
            <h5 class="text-warning fw-bold"> Resumen de usuarios</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody id="user-summary-table-body">
                  
                    <tr>
                        <td>Activos</td>
                        <td>{{ $usuarios_activos->count() }}</td>
                    </tr>
                    <tr>
                        <td>Inactivos</td>
                        <td>{{ $usuarios_inactivos->count() }}</td>
                    </tr>   
                    <tr>
                        <td>Vacaciones</td>
                        <td>{{ $usuarios_vacaciones->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal registrar usuarios -->
    <div class="modal fade" id="modalRegistrarUsuario" tabindex="-1" aria-labelledby="modalRegistrarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5> Registrar Nuevo Usuario</h5>
                    </div>

                    <form action="{{ route('users.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data" onsubmit="return checkSubmit();">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label for="" class="form-label">Nombre: </label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Correo: </label>
                                        <input type="email" class="form-control" name="email" id="email" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Rol:</label>
                                        <input type="text" class="form-control" name="rol" id="rol" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Estado: </label>
                                        <input type="text" class="form-control" name="estado" id="estado" value="Activo" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Foto usuario:</label>
                                        <input type="text" class="form-control" name="img_user" id="img_user" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Contraseña: </label>
                                        <input type="password" class="form-control" name="password" id="password" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-6 mb-2">
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-danger" data-bs-dismiss="modal" type="button" id=""> Cancelar </button>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-2">
                                                <div class="d-flex justify-content-end"><button class="btn btn-success" type="submit" id=""> Guardar </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    @endsection