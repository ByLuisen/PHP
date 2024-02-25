<?php

namespace App\Http\Controllers;

use App\Models\LineaDeHistorial;
use Illuminate\Http\Request;

class LineaDeHistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lineas_de_historial = LineaDeHistorial::all();

        return view('lineas_de_historial.index', compact('lineas_de_historial'));
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
     * Display the specified resource.
     */
    public function show(LineaDeHistorial $lineaDeHistorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LineaDeHistorial $lineaDeHistorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LineaDeHistorial $lineaDeHistorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LineaDeHistorial $lineaDeHistorial)
    {
        //
    }
}
