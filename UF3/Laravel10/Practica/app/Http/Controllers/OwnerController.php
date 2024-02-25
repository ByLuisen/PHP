<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OwnerController extends Controller
{
    public function home()
    {
        return view('propietarios.home');
    }
    public function list()
    {
        $propietarios = Owner::all();

        return view('propietarios.list', compact('propietarios'));

    }

    public function add_form()
    {
        return view('propietarios.add');
    }

    public function add(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nif' => 'required|unique:propietarios|regex:/^[0-9A-Z]{9}$/i', // NIF español (9 dígitos o letras)
            'nom' => 'required|string|max:255', // Nombre máximo de 255 caracteres
            'email' => 'required|email|max:255', // Email máximo de 255 caracteres
            'movil' => 'required|string|max:20', // Número de móvil máximo de 20 caracteres
        ], [
            'nif.required' => 'El campo NIF es obligatorio.',
            'nif.unique' => 'El NIF ingresado ya está en uso.',
            'nif.regex' => 'El formato del NIF no es válido.',
            'nom.required' => 'El campo Nombre es obligatorio.',
            'nom.max' => 'El nombre no puede tener más de 255 caracteres.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'Por favor, introduce un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'movil.required' => 'El campo móvil es obligatorio.',
            'movil.max' => 'El número de móvil no puede tener más de 20 caracteres.',
        ]);

        // Crear un nuevo propietario con los datos del formulario
        $owner = new Owner();
        $owner->nif = $request->nif;
        $owner->nom = $request->nom;
        $owner->email = $request->email;
        $owner->movil = $request->movil;
        $owner->save();

        // Establecer un mensaje de éxito en la sesión flash
        Session::flash('success', 'Owner added successfully');

        // Redirigir a alguna vista o ruta deseada después de guardar el propietario
        return redirect()->route('add_form');
    }
    public function modify_form()
    {
        return view('propietarios.modify');
    }

    public function search_modify(Request $request)
{
    $nif = $request->input('nif');
    $propietario = Owner::where('nif', $nif)->first();

    if ($propietario) {
        return view('propietarios.modify', compact('propietario'));
    } else {
        return back()->with('error', 'Propietario no encontrado.');
    }
}


public function modify(Request $request, $nif)
{
    // Buscar el propietario por el NIF
    $propietario = Owner::where('nif', $nif)->first(1);
    dd($propietario);
    // Verificar si se encontró el propietario
    if ($propietario) {
        // Actualizar los campos del propietario con los valores del formulario
        $propietario->nom = $request->input('nom');
        $propietario->email = $request->input('email');
        $propietario->movil = $request->input('movil');

        // Guardar los cambios en la base de datos
        $propietario->save();

        // Mostrar un mensaje de éxito
        Session::flash('success', 'Owner modified successfully');
    } else {
        // Si el propietario no se encuentra, mostrar un mensaje de error
        Session::flash('error', 'Owner not found');
    }

    // Redireccionar de regreso al formulario de modificación
    return redirect()->route('list');
}

public function update(Request $request,$nif){

    $nif = $request->input('nif');
    $propietario = Owner::where('nif', $nif)->first();

    if ($propietario) {
        return view('propietarios.modify', compact('propietario'));
    } else {
        return back()->with('error', 'Propietario no encontrado.');
    }

}


    public function search_form()
    {
        return view('propietarios.search_owner');
    }

    public function search(Request $request)
    {
        $nif = $request->input('nif');
        $propietarios = Owner::where('nif', $nif)->first();
        $mascotas = Pet::where('nifpropietario', $nif)->first();


        return view('propietarios.search_owner', compact('propietarios', 'mascotas'));
    }


    public function delete(Request $request, $nif)
    {
        // Busca al propietario por su NIF
        $propietario = Owner::where('nif', $nif)->first();

        if ($propietario) {

            $propietario->delete();

            return redirect()->route('list');
        }
    }



}
