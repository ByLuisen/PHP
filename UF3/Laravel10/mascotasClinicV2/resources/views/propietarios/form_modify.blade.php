@extends('layouts.app')
@section('title', 'Buscar usuario')
@section('content')
    <h1>Modify Owner</h1>
    <form method="post" action="{{ route('propietario.modify_search') }}">
        @csrf

        <div class="form-group form-inline">
            NIF *:
            <input type="text" placeholder="NIF" name="nif" value="{{ isset($propietario) ? $propietario->nif : '' }}">
        </div>

        <p>* Required fields</p>

        <input class="btn-success mr-2" type="submit" name="action" value="search_modify">
        <input class="btn btn-danger" type="submit" name="reset" value="reset">
    </form>
    @if (Session::has('error'))
        <div class="container alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

@endsection
