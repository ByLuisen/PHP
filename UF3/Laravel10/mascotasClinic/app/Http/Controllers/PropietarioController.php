<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    //
    public function listar()
    {
        $content = [
            ['nif' => '46994853B', 'nom' => 'Luis Enrique Ledesma Ollague', 'email' => 'luisenric32@gmail.com', 'movil' => '657774051']
        ];

        return view('propietarios.listar', ['content' => $content]);
    }

    public function buscarMascota()
    {
        return view('propietarios.buscarMascota');
    }

    public function anadir()
    {
        return view('propietarios.anadir');
    }

    public function modificar()
    {
        return view('propietarios.modificar');
    }
}
