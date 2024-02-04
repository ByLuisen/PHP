<!-- Card container -->
<div class="card">
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
                    <li><a class="dropdown-item" href="{{ route('listarPropietarios') }}">Listar todos</a></li>
                    <li><a class="dropdown-item" href="{{ route('buscarMascota') }}">Buscar Mascota</a></li>
                    <li><a class="dropdown-item" href="{{ route('anadirPropietario') }}">Añadir Propietario</a></li>
                    <li><a class="dropdown-item" href="{{ route('modificarPropietario') }}">Modificar</a></li>
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
                    <li><a class="dropdown-item" href="#">Listar todas</a></li>
                    <li><a class="dropdown-item" href="#">Buscar</a></li>
                    <li><a class="dropdown-item" href="#">Añadir Mascota</a></li>
                    <li><a class="dropdown-item" href="#">Añadir una LineaHistorial</a></li>
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

<!-- Card body -->
<div class="card-body">
    <!-- Content for the card body goes here -->
</div>
