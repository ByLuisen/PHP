<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MascotaController extends Controller
{
    //
    public function listar()
    {
        $content = [
            ['id' => '1', 'nif_propietario' => '46994853B', 'nom' => 'Paco']
        ];

        return view('mascotas.listar', ['content' => $content]);
    }

    public function buscar()
    {
        return view('mascotas.buscar');
    }

    public function anadir()
    {
        return view('mascotas.anadir');
    }

    public function anadirLineaHistorial()
    {
        return view('mascotas.anadirLineaHistorial');
    }
}
