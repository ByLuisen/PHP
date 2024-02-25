@extends('layouts.mascotas')

@section('title', 'ADD')

@section('content')
    <form method="post" action="{{ route('add') }}" class="mb-4">
        @csrf

        <h1>Add Owner</h1>

        <div class="form-group form-inline"> NIF *:
            <input type="text" placeholder="NIF" name="nif" value="{{ old('nif') }}">
            @error('nif')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group form-inline"> Name *:
            <input type="text" placeholder="Name" name="nom" value="{{ old('nom') }}">
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group form-inline"> Email *:
            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group form-inline"> Phone *:
            <input type="text" placeholder="Phone" name="movil" value="{{ old('movil') }}">
            @error('movil')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <p>* Required fields</p>

        <input class="btn-success mr-2" type="submit" name="action" value="add">
        <input class="btn-danger" type="reset" name="reset" value="reset">
    </form>
    @if (Session::has('success'))
        <div class="container alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
@endsection
