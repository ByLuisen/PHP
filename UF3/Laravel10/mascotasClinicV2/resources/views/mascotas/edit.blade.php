@extends('layouts.app')

@section('title', 'Update Pet')

@section('content')
    <h1>Modificar Mascota</h1>

    <form method="post" action="{{ route('mascota.update', $mascotum->id) }}" class="mb-4">
        @csrf
        @method('PUT')

        <div class="form-group form-inline">
            <label for="email">NIF *:</label>
            <input type="text" id="email" placeholder="Email" name="nif" value="{{ $mascotum->nif_propietario }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group form-inline">
            <label for="nom">Nombre *:</label>
            <input type="text" id="nom" placeholder="Nom" name="nom" value="{{ $mascotum->nom }}">
            @error('nom')
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
@endsection
