<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class HistoryController extends Controller
{
    public function list_history()
    {
        $historiales = History::all();

        return view('historial.list', compact('historiales'));
    }

    public function add_form_history()
    {
        return view('historial.add');
    }
    public function add_history(Request $request)
    {


        // Validación de los datos del formulario
        $request->validate([
            'idmascota' => ['required',
            Rule::exists('mascotas', 'id'),
        ],
            'fecha' => [
                'required',
                'date',
                // Regla personalizada para verificar que la fecha esté entre 2024 y 2026
                function ($attribute, $value, $fail) {
                    $year = date('Y', strtotime($value));
                    if ($year < 2024 || $year > 2026) {
                        $fail('The :attribute must be between 2024 and 2026.');
                    }
                },
            ],
            'motivo_visita' => 'required',
            'descripcion' => 'required',
        ], [
            'idmascota.required' => 'El campo ID de mascota es obligatorio.',
            'idmascota.exists' => 'Este no existe en la tabla',
            'fecha.required' => 'El campo Fecha es obligatorio.',
            'fecha.date' => 'El campo Fecha debe ser una fecha válida.',
            'motivo_visita.required' => 'El campo Motivo de visita es obligatorio.',
            'descripcion.required' => 'El campo Descripción es obligatorio.',
        ]);

        // Crear un nuevo historial con los datos del formulario
        $history = new History();
        $history->idmascota = $request->idmascota;
        $history->fecha = $request->fecha;
        $history->motivo_visita = $request->motivo_visita;
        $history->descripcion = $request->descripcion;
        $history->save();

        // Establecer un mensaje de éxito en la sesión flash
        Session::flash('success', 'History added successfully');

        // Redirigir al formulario de agregar historial
        return redirect()->route('add_form_history');
    }
}

