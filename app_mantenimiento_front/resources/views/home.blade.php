    @extends('layouts.app')

    @section('titulo')
    Home
    @endsection

    @section('contenido')
    <div class="row color-fondo content-page-100 content">
        <div class="row p-2">
            <div class="col-8 col-md-1 col-lg-10">
                <div class="input-group">
                    <span
                        class="text-center text-secondary inp-color-secondary d-flex align-items-center rounded-end rounded-4"><i
                            class="bi bi-search bi-sm"></i></span>
                    <input type="text"
                        class="form-control border-0 inp-color-secondary rounded-start rounded-4"
                        placeholder="Buscar proyectos">
                </div>
            </div>
            <div class="col-1 col-md-1 col-lg-1 ">
                <div
                    class="d-flex justify-content-start align-items-start  justify-content-lg-start align-items-lg-start">
                    <button type="button"
                        class="btn inp-color-secondary position-relative rounded-4">
                        <i class="bi bi-bell bi-sm"></i>
                        <span
                            class="position-absolute top-2 start-98 translate-middle p-1 bg-danger border border-light rounded-circle">
                        </span>
                    </button>
                </div>
            </div>
            <div class="col-3 col-md-2 col-lg-1">
                <div
                    class="d-flex justify-content-end align-items-end justify-content-lg-start align-items-lg-start">
                    <img class="" src="https://cdn-icons-png.flaticon.com/512/4557/4557002.png"
                        width="40" height="40">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col text-start">
                <h5 class="text-dark fw-bold"> Estado de proyectos</h5>
            </div>
            <div class="col text-end">
                <h6 class="text-dark fw-bold"> Ver todos</h6>
            </div>
            <!-- Llenar card page principal -->
            <div class="col-12">
                <div id="content_status_mantenimiento" class="row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-3">

                </div>
            </div>
        </div>
        <!-- Fin llenar card -->
        <div class="row mt-3">
            <div class="col-12 col-md-5 col-lg-5">
                <div class="card card-verde border-0 rounded-4 d-flex justify-content-center">
                    <div class="card-body">
                        <div class="align-items-start">
                            <h6 class="fw-bold ">Proximos mantenimientos</h6>
                        </div>
                        <div id="content_prox_mantenimiento">

                        </div>

                    </div>
                </div>
            </div>
            <!-- Lenar tabla de proximos mantenimientoa -->
            <div class="col-12 col-md-7 col-lg-7">
                <div class="card card-azul border-0 rounded-4 d-flex justify-content-center">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="align-items-start">
                                    <h6 class="fw-bold ">Ocupación de los técnicos</h6>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="align-items-end text-end">
                                    <p class="fw-bold ">Ver todos</p>
                                </div>
                            </div>
                        </div>
                        <div class="" id="content_team_dev">
                            <!-- Tecnico Yau -->
                            <div class="card p-1 mb-2  shadow-sm rounded-4 border-0">
                                <div class="row">
                                    <div class="col-1">
                                        <img class="img-fluid img_team_dev"
                                            src="https://cdn-icons-png.flaticon.com/512/4526/4526323.png">
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-small text-start nombre_team_dev">
                                            Yaudith Esther Castro Llanos</div>
                                    </div>
                                    <div class="col-2">
                                        <div
                                            class="text-small text-start text-secondary cargo_team_dev">
                                            Técnico </div>
                                    </div>
                                    <div class="col-2">
                                        <div
                                            class="text-small text-start text-secondary cant_proyect_team_dev">
                                            En inspección </div>
                                    </div>
                                    <div class="col-2">
                                        <div
                                            class="text-small text-start text-secondary planta_team_dev">
                                            Equipo B </div>
                                    </div>
                                    <div class="col-1">
                                        <button class="btn btn-warning text-small rounded-4"> <i
                                                class="bi bi-robot bi-sm"></i>Detalles </button>
                                    </div>

                                </div>
                            </div>
                            <!-- Tecnico Edwin -->
                            <div class="card p-1 mb-2  shadow-sm rounded-4 border-0">
                                <div class="row">
                                    <div class="col-1">
                                        <img class="img-fluid img_team_dev"
                                            src="https://cdn-icons-png.flaticon.com/512/4526/4526426.png">
                                    </div>
                                    <div class="col-3">
                                        <div class="fw-bold text-small text-start nombre_team_dev">
                                            Edwin de Jesús Fuenmayor Hernández</div>
                                    </div>
                                    <div class="col-2">
                                        <div
                                            class="text-small text-start text-secondary cargo_team_dev">
                                            Supervisor </div>
                                    </div>
                                    <div class="col-2">
                                        <div
                                            class="text-small text-start text-secondary cant_proyect_team_dev">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div
                                            class="text-small text-start text-secondary planta_team_dev">
                                            Equipo A</div>
                                    </div>
                                    <div class="col-1">
                                        <button class="btn btn-warning text-small rounded-4"> <i
                                                class="bi bi-robot bi-sm"></i>Detalles </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection