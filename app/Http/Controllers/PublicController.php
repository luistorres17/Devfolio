<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormProject;
use App\Models\FormAbout;
use App\Models\ContactPublic;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\user;
use App\Models\ImgPublic;

class PublicController extends Controller
{
    public function index()
    {
        $projects = FormProject::all();
        $abouts = FormAbout::first();
        $user = user::first();
        $imgs = ImgPublic::all();
        return view('home', compact('projects', 'abouts', 'user', 'imgs'));
    }

    public function store (Request $request)
    {
        
        $ip = $request->ip(); // Obtiene la IP del usuario

        if (RateLimiter::tooManyAttempts("contact:$ip", 2)) {
            return redirect()->route('home')->with('error', 'Has alcanzado el límite de envíos.');
        }

        RateLimiter::hit("contact:$ip", 3600); // Permite 2 intentos por hora
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'mensaje' => 'required',
        ]);

        // Guardar en la base de datos
        ContactPublic::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'mensaje' => $request->mensaje,
        ]);
        return redirect()->route('home')->with('success', 'Datos guardados correctamente.');
    }
}
