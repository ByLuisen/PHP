<!-- Card container -->
<div class="card mb-5">
    <!-- Card header -->
    <div class="card-header">
        <!-- Button group for Propietarios -->
        <div class="btn-group">
            <!-- Dropdown for Propietarios -->
            <div class="dropdown me-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Propietarios
                </button>

                <!-- Dropdown menu for Propietarios -->
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('propietarios.listar') }}">Listar todos</a></li>
                    <li><a class="dropdown-item" href="{{ route('propietarios.buscarMascota') }}">Buscar Mascota</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('propietarios.anadir') }}">Añadir Propietario</a></li>
                    <li><a class="dropdown-item" href="{{ route('propietarios.modificar') }}">Modificar</a></li>
                </ul>
            </div>

            <!-- Dropdown for Mascotas -->
            <div class="dropdown me-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Mascotas
                </button>

                <!-- Dropdown menu for Mascotas -->
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('mascotas.listar') }}">Listar todas</a></li>
                    <li><a class="dropdown-item" href="{{ route('mascotas.buscar') }}">Buscar</a></li>
                    <li><a class="dropdown-item" href="{{ route('mascotas.anadir') }}">Añadir Mascota</a></li>
                    <li><a class="dropdown-item" href="{{ route('mascotas.anadirLineaHistorial') }}">Añadir una
                            LineaHistorial</a></li>
                </ul>
            </div>

            <!-- Dropdown for Lineas Historial -->
            <div class="dropdown me-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Lineas Historial
                </button>

                <!-- Dropdown menu for Lineas Historial -->
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Listar líneas del
                            historial</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
