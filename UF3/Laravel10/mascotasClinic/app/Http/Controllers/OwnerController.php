<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //
    public function listar()
    {
        return view('propietarios.listar');
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
