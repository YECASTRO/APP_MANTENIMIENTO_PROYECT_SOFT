<!DOCTYPE html>
<html>

<head>
    <title>@yield('titulo')</title>

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <div class="body-principal container-fluid ">
        <div class="row">
            <!-- Navbar -->
            <div class=" col-12 col-sm-12 col-md-12 col-lg-2 px-0">
                <div
                    class="color-primary rounded-md-start rounded-lg-start rounded-md-4 rounded-lg-4 d-lg-block d-md-block h-md-100 h-lg-100 d-sm-block navbar navbar-expand-lg content-page-100">

                    <div class="row">
                        <div class="col-10">
                            <div class="ps-lg-4 ps-2 py-lg-4 py-1">
                                <h5 class="fw-bold"> Gestión de Mantenimiento</h5>
                            </div>
                        </div>

                        <div class="col-2 d-flex align-items-center ">
                            <div class="justify-content-end">
                                <button class="navbar-toggler border-0 text-end" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="bi bi-menu-button-wide-fill "></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="d-flex justify-content-start align-items-start">
                            <div class="nav flex-lg-column flex-sm-col nav-pills " id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">

                                <div class="align-items-center">
                                    <p class="ps-2 text-secondary text-small">MENÚ PRINCIPAL</p>
                                </div>

                              
                                <a class="text-dark nav-link rounded-diam rounded-2 
       @if(Request::routeIs('home')) active @endif" 
                                    href="{{ route('home') }}"
                                    id="v-pills-home-tab" {{-- Estos IDs y data-bs-toggle son redundantes si es navegación de página --}}
                                    role="tab" aria-selected="{{ Request::routeIs('home') ? 'true' : 'false' }}">
                                    <div class="text-span ps-2">
                                        <i class="bi bi-house-fill bi-sm mx-2"></i>
                                        <span class="text-icon ps-1">Inicio</span>
                                    </div>
                                </a>

                                
                                <a class="text-dark nav-link rounded-diam
       @if(Request::routeIs('equipos.index')) active @endif" {{-- Aquí se añade la clase 'active' --}}
                                    href="{{ route('equipos.index') }}"
                                    id="v-pills-status-tab" {{-- Estos IDs y data-bs-toggle son redundantes si es navegación de página --}}
                                    role="tab" aria-selected="{{ Request::routeIs('equipos.index') ? 'true' : 'false' }}">
                                    <div class="text-span ps-2">
                                        <i class="bi bi-archive bi-sm mx-2"></i>
                                        <span class="text-icon ps-1"> Gestión de equipos</span>
                                    </div>
                                </a>


                                <a class="text-dark nav-link rounded-diam d-none
       @if(Request::routeIs('mantenimientos.index')) active @endif" {{-- Ajusta la ruta si es diferente --}}
                                    href="{{ route('mantenimientos.index') }}" {{-- Ejemplo: 'mantenimientos.index' --}}
                                    id="v-pills-status-details-tab"
                                    role="tab" aria-selected="{{ Request::routeIs('mantenimientos.index') ? 'true' : 'false' }}">
                                    <div class="text-span ps-2">
                                        <i class="bi bi-archive bi-sm mx-2"></i>
                                        <span class="text-icon ps-1"> Mantenimientos </span>
                                    </div>
                                </a>

                                <div class="align-items-center">
                                    <p class="ps-2 text-secondary text-small">CONFIGURACIÓN</p>
                                </div>

                                {{-- Enlace de Usuarios --}}
                                <a class="text-dark nav-link rounded-diam
       @if(Request::routeIs('users.index')) active @endif" {{-- Ajusta la ruta si es diferente --}}
                                    href="{{ route('users.index') }}" {{-- Ejemplo: 'users.index' --}}
                                    id="v-pills-users-tab" {{-- Agregué un ID más apropiado --}}
                                    role="tab" aria-selected="{{ Request::routeIs('users.index') ? 'true' : 'false' }}">
                                    <div class="text-span ps-2">
                                        <i class="bi bi-people bi-sm mx-2"></i>
                                        <span class="text-icon ps-1"> Usuarios </span>
                                    </div>
                                </a>
                            
                                <button class="text-dark nav-link rounded-diam " id="" data-bs-toggle="pill"
                                    type="button" aria-controls="" aria-selected="false">
                                    <div class="text-span  ps-2">
                                        <i class="bi bi-box-arrow-in-right bi-sm mx-2"></i>
                                        <span class="text-icon ps-1"> Salir</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contenido Principal -->
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 ">
                <main>
                    @yield('contenido')
                </main>
            </div>
        </div>
    </div>

</html>