<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormProject;
use App\Models\FormAbout;
use App\Models\ContactPublic;

class DashboardController extends Controller
{
    public function index()
    {
        $formprojects = FormProject::all(); // Datos de proyectos
        $formabouts = FormAbout::first(); // Datos de otra tabla
        $contactpublics = ContactPublic::all(); // Datos de otra tabla

        return view('dashboard', compact('formprojects', 'formabouts', 'contactpublics'));
    }
}