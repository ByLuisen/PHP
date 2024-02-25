<div class="card">
    <div class="card-header">
        <div class="btn-group">
            <div class="dropdown mx-1">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Propietarios
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <a class="dropdown-item" href="{{ route('list') }}">Listar todos</a>
                    <a class="dropdown-item" href="{{ route('search_form') }}">Buscar mascotas</a>
                    <a class="dropdown-item" href="{{ route('add_form') }}">Añadir Propietario</a>
                    <a class="dropdown-item" href="{{ route('modify_form') }}">Modificar</a>
                </ul>
            </div>
            <div class="dropdown mx-1">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Mascotas
                </button>
                <div class="dropdown-menu" aria-labelledby="mascotasDropdown">
                    <a class="dropdown-item" href="{{ route('list_pet') }}">Listar todos</a>
                    <a class="dropdown-item" href="{{ route('search_form_pet') }}">Buscar</a>
                    <a class="dropdown-item" href="{{ route('add_form_pet') }}">Añadir mascota</a>
                    <a class="dropdown-item" href="{{ route('add_form_history') }}">Añadir una LineaHistorial</a>
                </div>
            </div>

            <div class="dropdown mx-1">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Lineas de historial
                </button>
                <div class="dropdown-menu" aria-labelledby="historialDropdown">
                    <a class="dropdown-item" href="{{ route('list_history') }}">Listar lineas de historial</a>
                </div>
            </div>
        </div>
    </div>
</div>
