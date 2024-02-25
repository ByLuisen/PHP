<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function home()
    {
        return view('mascotas.home');
    }
    public function list_pet()
    {
        $mascotas = Pet::all();

        return view('mascotas.list', compact('mascotas'));
    }

    public function add_form_pet()
    {
        return view('mascotas.add');
    }
    public function add_pet(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nifpropietario' => [
                'required',
                'present',
                Rule::exists('propietarios', 'nif'),
            ],
            'nom' => 'required',
        ], [
            'nifpropietario.exists' => 'El NIF proporcionado no existe en la tabla de propietarios.',
            'nifpropietario.required' => 'El campo NIF es obligatorio.',
            'nom.required' => 'El campo Nombre es obligatorio.',
        ]);

        // Crear una nueva mascota con los datos del formulario
        $pet = new Pet();
        $pet->nifpropietario = $request->nifpropietario;
        $pet->nom = $request->nom;
        $pet->save();

        // Establecer un mensaje de éxito en la sesión flash
        Session::flash('success', 'Pet added successfully');


        // Redirigir al formulario de agregar mascota
        return redirect()->route('add_form_pet');
    }


    public function search_form_pet()
    {
        return view('mascotas.search_puppet');
    }

    public function search_pet(Request $request)
    {
        $request->validate([
            'id'=>'required',

        ], [
            'id.required' => 'El Id es requerido',
        ]);
        $id = $request->input('id');

        // Obtener la mascota por su ID
        $mascotas = Pet::findOrFail($id);

        // Obtener el propietario basándose en el NIF del propietario de la mascota
        $propietarios = Owner::where('nif', $mascotas->nifpropietario)->firstOrFail();
        $historiales = History::where('idmascota', $id)->get();


        return view('mascotas.search_puppet', compact('mascotas', 'propietarios','historiales'));
    }
}
