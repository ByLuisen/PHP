<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Propietario;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propietarios = Propietario::all();

        return view('propietarios.index', compact('propietarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nif' => 'required|unique:propietarios|regex:/^[0-9A-Z]{9}$/i', // NIF español (9 dígitos o letras)
            'nom' => 'required|string|max:255', // Nombre máximo de 255 caracteres
            'email' => 'required|email|max:255', // Email máximo de 255 caracteres
            'movil' => 'required|string|max:20|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', // Número de móvil máximo de 20 caracteres
        ]);

        $propietario = new Propietario();
        $propietario->nif = $request->nif;
        $propietario->nom = $request->nom;
        $propietario->email = $request->email;
        $propietario->movil = $request->movil;
        $propietario->save();

        Session::flash('success', 'Owner added successfully');

        return redirect()->route('propietario.create');
    }

    public function form_search()
    {
        return view('propietarios.form_search');
    }

    /**
     * Show the form for search a resource.
     */
    public function search(Request $request)
    {
        $nif = $request->input('nif');
        $propietarios = Propietario::where('nif', $nif)->first();
        $mascotas = Mascota::where('nif_propietario', $nif)->first();


        return view('propietarios.show', compact('propietarios', 'mascotas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Propietario $propietario)
    {
    }

    public function form_modify()
    {
        return view('propietarios.form_modify');
    }

    public function modify_search(Request $request)
    {
        $nif = $request->input('nif');
        $propietario = Propietario::where('nif', $nif)->first();

        if ($propietario) {
            return redirect()->route('propietario.edit', $propietario->nif);
        } else {
            Session::flash('error', 'Propietario no encontrado.');

            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propietario $propietario)
    {
        if ($propietario) {
            return view('propietarios.edit', compact('propietario'));
        } else {
            return back()->with('error', 'Propietario no encontrado.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Propietario $propietario)
    {
        $request->validate([
            'nom' => 'required|string|max:255', // Nombre máximo de 255 caracteres
            'email' => 'required|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', // Email máximo de 255 caracteres
            'movil' => 'required|string|max:20', // Número de móvil máximo de 20 caracteres
        ]);

        $propietario->nom = $request->nom;
        $propietario->email = $request->email;
        $propietario->movil = $request->movil;

        $propietario->save();

        Session::flash('success', 'Owner modified successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propietario $propietario)
    {

        return redirect()->route('propietario.index');
    }
}
