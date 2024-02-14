@extends('layouts.app')

@section('title', 'Buscar mascota')

@section('content')
    <form method="post" action="">

        <h1 class="fw-bold mb-4">Search pet by owner's NIF</h1>

        <div class="form-group form-inline mb-5"> NIF *:
            <input type="text" placeholder="NIF" name="nif" value="<?php if (isset($content)) {
                echo $content->getNif();
            } ?>">
        </div>

        <p>* Required fields</p>

        <input class="btn btn-success mr-2" type="submit" name="action" value="search_pet_by_owner">
        <input class="btn btn-danger" type="submit" name="reset" value="reset">

    </form>
@endsection
