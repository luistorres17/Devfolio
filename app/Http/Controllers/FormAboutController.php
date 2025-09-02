<?php

namespace App\Http\Controllers;

use App\Models\FormAbout;
use Illuminate\Http\Request;


class FormAboutController extends Controller
{
    public function index()
    {
        $formabouts = FormAbout::first();
        return view('formulario-about', compact('formabouts'));
    }

    /*public function indexDashboard()
    {
        // Retorna la vista dashboard con el primer registro
        $formabouts_dashboard = FormAbout::first();
        return view('dashboard', compact('formabouts_dashboard'));
    }*/

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'descripcion' => 'required',
            'experiencia' => 'required',
            'github' => 'required',
            'linkedin' => 'required',
        ]);
        
        FormAbout::create($request->all());
        return redirect()->route('FormAbout.index')->with('success', 'Datos guardados');
    }

    public function destroy($id)
    {
        FormAbout::destroy($id);
        return redirect()->route('FormAbout.index')->with('success', 'Datos eliminados');
    }

    
}
