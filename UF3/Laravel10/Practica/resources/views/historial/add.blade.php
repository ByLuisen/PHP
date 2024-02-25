@extends('layouts.mascotas')

@section('title', 'ADD')

@section('content')
    <form method="post" action="{{ route('add_history') }}" class="mb-4">
        @csrf

        <h1>Add Pet</h1>

        <div class="form-group form-inline"> ID OF PET *:
            <input type="text" placeholder="ID of pet" name="idmascota" value="{{ old('idmascota') }}">
            @error('idmascota')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group form-inline"> Visit Date *:
            <input type="date" placeholder="Fecha" name="fecha" value="{{ old('fecha') }}">
            @error('fecha')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group form-inline"> Motive *:
            <input type="text" placeholder="Motivo" name="motivo_visita" value="{{ old('motivo_visita') }}">
            @error('motivo_visita')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group form-inline"> Description *:
            <input type="text" placeholder="Descripcion" name="descripcion" value="{{ old('descripcion') }}">
            @error('descripcion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <p>* Required fields</p>

        <input class="btn btn-success mr-2" type="submit" name="action" value="add">
        <input class="btn btn-danger" type="reset" name="reset" value="reset">
    </form>
    @if (Session::has('success'))
        <div class="container alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
@endsection

