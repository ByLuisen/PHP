<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return "Aqui se mostrará el LISTADO DE POSTS";
    }

    public function create()
    {
        return "Aqui se mostrará el FORMULARIO para crear el POST";
    }

    public function store()
    {
        return "Aqui se mostrará el POST en la BD (por ejemplo)";
    }

    public function show($post)
    {
        return "Aqui se mostrará el POST con id: $post";
    }

    public function edit($post)
    {
        return "Aqui se mostrara el formulario para editar el post $post";
    }

    public function update($post)
    {
        return "Aqui se ACTUALIZA el POST con id = $post";
    }

    public function destroy($post) {
        return "Aqui se eliminiara el POST con id = $post";
    }
}
