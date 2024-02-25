@extends('layouts.mascotas')
@section('title', 'MODIFY')
@section('content')
    <h1>Modify Owner</h1>
    @if (!isset($propietario))
        <form method="post" action="{{ route('search_modify') }}">
            @csrf

            <div class="form-group form-inline">
                NIF *:
                <input type="text" placeholder="NIF" name="nif"
                    value="{{ isset($propietario) ? $propietario->nif : '' }}">
            </div>

            <p>* Required fields</p>

            <input class="btn-success mr-2" type="submit" name="action" value="search_modify">
            <input class="btn-danger" type="submit" name="reset" value="reset">
        </form>
    @endif

    @if (isset($propietario))
    <form method="post" action="{{ route('modify', ['nif' => $propietario->nif]) }}" class="mb-4">
            @csrf
            @method('PUT')
            <div class="form-group form-inline" style="display: none">
                NIF *:
                <input type="text" placeholder="NIF" name="nif" value="{{ $propietario->nif }}">
            </div>

            <div class="form-group form-inline">
                Nombre *:
                <input type="text" placeholder="Nom" name="nom" value="{{ $propietario->nom }}">
            </div>

            <div class="form-group form-inline">
                Email *:
                <input type="text" placeholder="Email" name="email" value="{{ $propietario->email }}">
            </div>

            <div class="form-group form-inline">
                Teléfono *:
                <input type="text" placeholder="Movil" name="movil" value="{{ $propietario->movil }}">
            </div>

            <p>* Campos obligatorios</p>

            <input class="btn-success mr-2" type="submit" value="Modificar">
        </form>
        @if (Session::has('success'))
            <div class="container alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
    @endif

@endsection
