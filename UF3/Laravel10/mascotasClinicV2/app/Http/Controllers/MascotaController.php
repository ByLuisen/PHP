<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mascotas = Mascota::all();

        return view('mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for search a resource.
     */
    public function search()
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascotum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascota $mascotum)
    {
        // Verificar si se encontró el propietario
        if (!$mascotum) {
            // Puedes manejar la situación en la que el propietario no se encuentra, por ejemplo, redirigiendo o mostrando un mensaje de error.
            return redirect()->route('mascota.index')->with('error', 'Mascota no encontrado');
        }
        return view('mascotas.edit', compact('mascotum'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascota $mascotum)
    {
        $request->validate([
            'nif' => 'required|unique:propietarios|regex:/^[0-9A-Z]{9}$/i', // Nombre máximo de 255 caracteres
            'nom' => 'required|string|max:255', // Email máximo de 255 caracteres
        ]);

        $mascotum->nif_propietario = $request->nif;
        $mascotum->nom = $request->nom;

        $mascotum->save();

        Session::flash('success', 'Owner modified successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascotum)
    {
        $mascotum->delete();

        return redirect()->route('mascota.index')
            ->with('success', 'Mascota has been deleted successfully');
    }
}
