@extends('layouts.mascotas')

@section('title', 'ADD')

@section('content')
    <form method="post" action="{{ route('add_pet') }}" class="mb-4">
        @csrf

        <h1>Add Pet</h1>

        <div class="form-group form-inline"> NIF *:
            <input type="text" placeholder="NIF PROPIETARIO" name="nifpropietario" value="{{ old('nifpropietario') }}">
            @error('nifpropietario')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>

        <div class="form-group form-inline"> Name *:
            <input type="text" placeholder="NOMBRE" name="nom" value="{{ old('nom') }}">
        </div>
        @error('nom')
        <div class="text-danger">{{ $message }}</div>
    @enderror
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

