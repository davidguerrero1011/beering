<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
        <!-- Logo del bar -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/beer.jpeg') }}" alt="{{ config('app.name') }}" width="30" height="30" class="me-2">
            <strong>{{ config('app.name') }} Bar</strong>
        </a>

        <!-- Botón para móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBar"
            aria-controls="navbarBar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Ítems del navbar -->
        <div class="collapse navbar-collapse" id="navbarBar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-cup-straw"></i>Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-people-fill"></i> Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-cash-coin"></i> Ventas</a>
                </li>
                <li class="nav-item dropdown" id="configurationMenu">
                    <a class="nav-link dropdown-toggle" href="#" id="configDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear-wide-connected"></i> Configuración
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="configDropdown">
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 9]) }}">Pagos</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 14]) }}">Categorias</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 2]) }}">Ciudades</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 8]) }}">Cobros</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 6]) }}">Inventario</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 5]) }}">Mesas</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 12]) }}">Música</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 7]) }}">Cajas</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 1]) }}">Paises</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 11]) }}">Preparaciones</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 13]) }}">Productos</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 10]) }}">Promociones</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 3]) }}">Roles</a></li>
                        <li><a class="dropdown-item" href="{{ route('list', ['type' => 4]) }}">Usuarios</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-box-arrow-right"></i> Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Bootstrap CSS y JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>