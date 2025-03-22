<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormProject;

class FormProjectController extends Controller
{
    public function index()
    {
        $formprojects = FormProject::all();
        
        return view('formulario-project', compact('formprojects'));
    }
    public function indexDashboardProjects()
    {
        // Retorna la vista dashboard con el primer registro
        $formprojects_dashboard = FormAbout::all();
        return view('dashboard', compact('formprojects_dashboard'));
    }
    
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nameProject' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'link_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'fecha_realizacion' => 'nullable|date',
        ]);

        // Procesar imagen si se subió
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        // Guardar en la base de datos
        FormProject::create([
            'nameProject' => $request->nameProject,
            'descripcion' => $request->descripcion,
            'link_url' => $request->link_url,
            'image' => $imagePath,
            'fecha_realizacion' => $request->fecha_realizacion,
        ]);

        return redirect()->route('FormProject.index')->with('success', 'Datos guardados correctamente.');
    }

    // el destroy es para eliminar un registro de la tabla de proyectos
    public function destroy($id)
    {
        FormProject::destroy($id);
        return redirect()->route('FormProject.index')->with('success', 'Datos eliminados');
    }
    
    
}
