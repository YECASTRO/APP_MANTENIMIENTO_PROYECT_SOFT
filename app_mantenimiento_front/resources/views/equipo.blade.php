    @extends('layouts.app')

    @section('titulo')
    Equipo
    @endsection

    @section('contenido')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row color-fondo content-page-100 content">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mb-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-small breadcrumb_home"><a>Inicio</a></li>
                <li class="breadcrumb-item text-small text-dark text-capitalize" id="nam_status"
                    aria-current="page">Gestión de equipos</li>
            </ol>
            <div> <button class="btn btn-warning text-small rounded-4" data-bs-toggle="modal" data-bs-target="#modalRegistrarEquipo"> <i
                        class="bi bi-robot bi-sm"></i>Registrar Nuevo equipo</button> </div>
        </nav>

        <div id="content_gestion_equipo" class=" h-100 d-flex justify-content-start align-items-start row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-4">
            @empty($equipos)
            <div class="alert alert-info" role="alert">
                No hay registros disponibles para hoy.
            </div>
            @else
            @foreach ($equipos as $equipo)
            <div class="col" data-record-id="{{ $equipo->id }}">
                <div class="card border-0 shadow-sm  card_details rounded-4 p-2 {{ $equipo->color_equipo }}">
                    <div class="row">
                        <div class="col-8">
                            <p>
                                <span class="text-secondary text-small">Registrado:</span>
                                <span class="text-dark text-small date_details">{{ $equipo->fecha_adquisicion }}</span>
                            </p>
                        </div>
                        <div class="col-4" onclick="verModalDetails(this)" data-equipo='@json($equipo)'>
                            <img class="img-fluid bg-white rounded-circle img_details" width="50"
                                height="50" src="{{ $equipo->img_equipo}}">
                        </div>
                    </div>
                    <div class="mb-2 nombre_details">{{ $equipo->nombre }}</div>
                    <div class=" text-dark text-small "> Numero Serie: <span class=" num_ser_details"> {{ $equipo->numero_serie }}</span>
                    </div>
                    <div class="text-small text-secondary fw-light ">
                        Modelo: <span class="descripcion_details"> {{ $equipo->modelo }}</span>
                    </div>
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
                        <div class="text-center">
                            <div class=" m-2 p-2 rounded-5 bg-danger" onclick="eliminarEquipo('{{$equipo->id}}')">
                                <i class="bi bi-trash3 bi-sm text-white"></i>

                            </div>
                        </div>
                        <div class="text-center">
                            <div class=" m-2 p-2 rounded-5 bg-warning" onclick="verModalEditEquipo(this)" data-equipo='@json($equipo)'>
                                <i class="bi bi-pencil-square bi-sm text-dark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endempty
        </div>
    </div>

    <!-- Modals registrar -->
    <div class="modal fade" id="modalRegistrarEquipo" tabindex="-1" aria-labelledby="modalRegistrarEquipoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5> Registrar Nuevo Equipo</h5>
                    </div>

                    <form action="{{ route('equipos.store') }}" method="POST" class="needs-validation" enctype="multipart/form-data" onsubmit="return checkSubmit();">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label for="" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Marca</label>
                                        <input type="text" class="form-control" name="marca" id="marca" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Modelo</label>
                                        <input type="text" class="form-control" name="modelo" id="modelo" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Numero de serie</label>
                                        <input type="text" class="form-control" name="numero_serie" id="numero_serie" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Fecha adquision</label>
                                        <input type="datetime-local" class="form-control" name="fecha_adquisicion" id="fecha_adquisicion" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Ubicación</label>
                                        <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Manual de usuario</label>
                                        <input type="text" class="form-control" name="manual_usuario" id="manual_usuario" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Url Imagen de equipo</label>
                                        <input type="text" class="form-control" name="img_equipo" id="img_equipo" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Class Color:</label>
                                        <input type="text" class="form-control" name="color_equipo" id="color_equipo" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-danger" data-bs-dismiss="modal" type="button" id=""> Cancelar</button>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="d-flex justify-content-end"><button class="btn btn-success" type="submit" id=""> Guardar</button>
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

    <!-- Modals ver detalles -->
    <div class="modal fade" id="modalDetailsEquipo" tabindex="-1" aria-labelledby="modalDetailsEquipoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <h5>Nombre: <span class="nombre_details"></span> </h5>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        Fecha de adquisición: <p class="fech_ad_details"> </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div>
                                        Marca: <p class="marca_details"> </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div>
                                        Modelo: <p class="modelo_details"> </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div>
                                        Numero serie: <p class="num_serie_details"> </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div>
                                        Ubicación: <p class="ubicacion_details"> </p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div>
                                        Manual de usuario: <a href="" class="manual_details" target="_blank">Ver Manual</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="" class="img_details img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- Modal editar -->
    <div class="modal fade" id="modalEditEquipo" tabindex="-1" aria-labelledby="modalEditEquipoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h5> Editar información de Equipo</h5>
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <label for="" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre_edit" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Marca</label>
                                        <input type="text" class="form-control" name="marca" id="marca_edit" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Modelo</label>
                                        <input type="text" class="form-control" name="modelo" id="modelo_edit" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Numero de serie</label>
                                        <input type="text" class="form-control" name="numero_serie" id="numero_serie_edit" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Fecha adquision</label>
                                        <input type="datetime-local" class="form-control" name="fecha_adquisicion" id="fecha_adquisicion_edit" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Ubicación</label>
                                        <input type="text" class="form-control" name="ubicacion" id="ubicacion_edit" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Manual de usuario</label>
                                        <input type="text" class="form-control" name="manual_usuario" id="manual_usuario_edit" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Url Imagen de equipo</label>
                                        <input type="text" class="form-control" name="img_equipo" id="img_equipo_edit" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <label for="" class="form-label">Class Color:</label>
                                        <input type="text" class="form-control" name="color_equipo" id="color_equipo_edit" value="" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-danger" data-bs-dismiss="modal" type="button" id=""> Cancelar</button>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="d-flex justify-content-end"><button class="btn btn-success" type="button" id="btn_edit_reg"> Guardar</button>
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
        function verModalDetails(element) {
            const data_equipo = JSON.parse(element.getAttribute('data-equipo'));
            document.querySelector('#modalDetailsEquipo .nombre_details').textContent = data_equipo.nombre;
            document.querySelector('#modalDetailsEquipo .marca_details').textContent = data_equipo.marca;
            document.querySelector('#modalDetailsEquipo .modelo_details').textContent = data_equipo.modelo;
            document.querySelector('#modalDetailsEquipo .num_serie_details').textContent = data_equipo.numero_serie;
            document.querySelector('#modalDetailsEquipo .ubicacion_details').textContent = data_equipo.ubicacion;
            document.querySelector('#modalDetailsEquipo .img_details').src = data_equipo.img_equipo;
            document.querySelector('#modalDetailsEquipo .manual_details').href = data_equipo.manual_usuario;
            document.querySelector('#modalDetailsEquipo .fech_ad_details').textContent = data_equipo.fecha_adquisicion;
            $('#modalDetailsEquipo').modal('show');
        }

        async function eliminarEquipo(equipoId) { // Cambiado a 'equipoId' para mayor claridad con la URL
            console.log('Intentando eliminar el equipo con ID:', equipoId);
            const endpointUrl = `/equipos/${equipoId}`; // URL del endpoint de eliminación del equipo
            const csrfToken = "{{ csrf_token() }}";

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            // Muestra la confirmación de SweetAlert2
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro?",
                text: "Al momento de eliminar este equipo no podrá ser recuperado.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            }).then(async (result) => { // <-- ¡IMPORTANTE!: Agregamos 'async' aquí
                if (result.isConfirmed) {
                    try {
                        // Realiza la petición DELETE
                        const response = await fetch(endpointUrl, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            },
                        });

                        const data = await response.json(); // Parsea la respuesta del servidor

                        if (response.ok) { // La petición fue exitosa (código de estado 2xx)
                            console.log('Equipo eliminado exitosamente:', data.message || 'Sin mensaje específico.');
                            // Muestra el mensaje de éxito con SweetAlert2

                            // Actualizar la interfaz de usuario: Eliminar el elemento del DOM
                            swalWithBootstrapButtons.fire({
                                title: "¡Eliminado!",
                                text: data.message || "El equipo ha sido eliminado correctamente.",
                                icon: "success"
                            });
                            location.reload();

                        } else { // Hubo un error en la respuesta del servidor (código de estado 4xx o 5xx)
                            const errorMessage = data.message || response.statusText || 'Error desconocido al eliminar el equipo.';
                            console.error('Error al eliminar el equipo:', errorMessage);

                            // Muestra el mensaje de error con SweetAlert2
                            swalWithBootstrapButtons.fire({
                                title: "Error",
                                text: errorMessage,
                                icon: "error"
                            });
                        }

                    } catch (error) { // Error en la conexión o en el proceso de fetch
                        console.error('Error en la petición de eliminación del equipo:', error);

                        // Muestra un mensaje de error de conexión con SweetAlert2
                        swalWithBootstrapButtons.fire({
                            title: "Error de Conexión",
                            text: "Hubo un problema de conexión o un error inesperado al intentar eliminar el equipo.",
                            icon: "error"
                        });
                    }
                } else if (
                    /* Manejar el caso si el usuario cancela la eliminación */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "El equipo no ha sido eliminado.",
                        icon: "error"
                    });
                }
            });
        }

        function verModalEditEquipo(element) {
            const data_equipo = JSON.parse(element.getAttribute('data-equipo'));
            document.querySelector('#modalEditEquipo #nombre_edit').value = data_equipo.nombre;
            document.querySelector('#modalEditEquipo #marca_edit').value = data_equipo.marca;
            document.querySelector('#modalEditEquipo #modelo_edit').value = data_equipo.modelo;
            document.querySelector('#modalEditEquipo #numero_serie_edit').value = data_equipo.numero_serie;
            document.querySelector('#modalEditEquipo #fecha_adquisicion_edit').value = data_equipo.fecha_adquisicion;
            document.querySelector('#modalEditEquipo #ubicacion_edit').value = data_equipo.ubicacion;
            document.querySelector('#modalEditEquipo #manual_usuario_edit').value = data_equipo.manual_usuario;
            document.querySelector('#modalEditEquipo #img_equipo_edit').value = data_equipo.img_equipo;
            document.querySelector('#modalEditEquipo #color_equipo_edit').value = data_equipo.color_equipo;

            btn_edit_reg = document.querySelector('#modalEditEquipo #btn_edit_reg');
            btn_edit_reg.onclick = function() {
                editarEquipo(data_equipo.id);
            };


            $('#modalEditEquipo').modal('show');
        }

        async function editarEquipo(id_equipo) {
            console.log(id_equipo);

            const nombre = document.querySelector('#modalEditEquipo #nombre_edit').value;
            const marca = document.querySelector('#modalEditEquipo #marca_edit').value;
            const modelo = document.querySelector('#modalEditEquipo #modelo_edit').value;
            const numero_serie = document.querySelector('#modalEditEquipo #numero_serie_edit').value;
            const fecha_adquisicion = document.querySelector('#modalEditEquipo #fecha_adquisicion_edit').value;
            const ubicacion = document.querySelector('#modalEditEquipo #ubicacion_edit').value;
            const manual_usuario = document.querySelector('#modalEditEquipo #manual_usuario_edit').value;
            const img_equipo = document.querySelector('#modalEditEquipo #img_equipo_edit').value;
            const color_equipo = document.querySelector('#modalEditEquipo #color_equipo_edit').value;


            const endpointUrl = `/equipos/${id_equipo}`;
            const csrfToken = "{{ csrf_token() }}";
            // Obtener los datos del formulario
            const data = {
                nombre: nombre,
                marca: marca,
                modelo: modelo,
                numero_serie: numero_serie,
                fecha_adquisicion: fecha_adquisicion,
                ubicacion: ubicacion,
                manual_usuario: manual_usuario,
                img_equipo: img_equipo,
                color_equipo: color_equipo
            };

            try {
                // Realiza la petición DELETE
                const response = await fetch(endpointUrl, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });
                const responseData = await response.json();
                if (response.ok) { // Si la respuesta HTTP es 2xx (ej. 200 OK)


                    Swal.fire({
                        title: "¡Actualizado!",
                        text: 'Equipo actualizado exitosamente',
                        icon: "success"
                    });

                    $('#modalEditEquipo').modal('hide');
                    location.reload();
                } else if (response.status === 422 && responseData.errors) {

                    console.error('Errores de validación:', responseData.errors || 'Sin errores específicos.');
                    Swal.fire({
                        title: "",
                        text: 'Errores de validación:',
                        icon: "error"
                    });

                } else {
                    console.error('Error al actualizar el equipo:', responseData.message || response.statusText);
                    Swal.fire({
                        title: "",
                        text: 'Error al actualizar el equipo',
                        icon: "error"
                    });
                }

            } catch (error) {
                console.error('Error en la petición de eliminación del equipo:', error);
                Swal.fire({
                    title: "",
                    text: 'Hubo un problema de conexión o un error inesperado al intentar eliminar el equipo.',
                    icon: "error"
                });
            }
        }
    </script>
    @endsection