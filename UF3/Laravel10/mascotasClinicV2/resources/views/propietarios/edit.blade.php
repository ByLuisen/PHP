@extends('layouts.app')

@section('title', 'Modificar usuario')

@section('content')
    <h1>Modificar Propietario</h1>

    @if (isset($propietario))
        <form method="post" action="{{ route('propietario.update', $propietario->nif) }}" class="mb-4">
            @csrf
            @method('PUT')

            <div class="form-group form-inline">
                <label for="nom">Nombre *:</label>
                <input type="text" id="nom" placeholder="Nom" name="nom" value="{{ $propietario->nom }}">
                @error('nom')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group form-inline">
                <label for="email">Email *:</label>
                <input type="text" id="email" placeholder="Email" name="email" value="{{ $propietario->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group form-inline">
                <label for="movil">Teléfono *:</label>
                <input type="text" id="movil" placeholder="Movil" name="movil" value="{{ $propietario->movil }}">
                @error('movil')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <p>* Campos obligatorios</p>

            <input class="btn btn-success mr-2" type="submit" value="Modificar">
        </form>

        @if (Session::has('success'))
            <div class="container alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
    @endif
@endsection
