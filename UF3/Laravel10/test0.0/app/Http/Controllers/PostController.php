<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $frase = "Aquí se mostrará el LISTADO de POSTS:";
        $posts = Post::paginate(10);

        // return $posts;

        return view('posts.index', compact('posts', 'frase'));

        // return view('index', ['frase' => $frase]);
    }

    public function create()
    {
        $frase = "Aquí se mostrará el formulario para crear un post";

        $categories = Category::all();
        $users = User::all();

        return view('posts.create', compact('categories','users', 'frase'));
    }

    public function store(Request $request)
    {
        // return $request;
        Post::create($request->all());

        return "El post se creó con éxito";
    }

    public function show(Post $post)
    {
        // 1a forma
        /* return view('posts.show', [
            'post' => $post
        ]); */

        // 2a forma con el método compact:
        // return view('posts.show', compact('post'));

        // 3a forma con el método ->with():
        // return view('posts.show')->with('post', $post);

        $frase = "Aquí se mostrará el CONTENIDO de un POSTS:";

        return view('posts.show', compact('post', 'frase'));
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
