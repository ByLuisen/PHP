<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('posts.index', [
            'prueba' => 'Este es un mensaje de prueba en DAW2'
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        return "Aqui se mostrará el POST en la BD (por ejemplo)";
    }

    public function show($post)
    {
        // 1a forma
        /* return view('posts.show', [
            'post' => $post
        ]); */

        // 2a forma con el método compact:
        // return view('posts.show', compact('post'));

        // 3a forma con el método ->with():
        return view('posts.show')->with('post', $post);
    }

    public function edit($post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update($post)
    {
        return "Aqui se ACTUALIZA el POST con id = $post";
    }

    public function destroy($post)
    {
        return "Aqui se eliminiara el POST con id = $post";
    }
}
