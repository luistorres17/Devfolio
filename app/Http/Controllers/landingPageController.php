<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImgPublic;
use App\Models\HeroHome;

class landingPageController extends Controller
{
    public function index()
    {
        $imgs = ImgPublic::all();
        $hero = HeroHome::first();
        return view('landingpage', compact('imgs', 'hero'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Almacenar la imagen
        $imagePath = $request->file('path')->store('landing', 'public');

        // Guardar en la base de datos
        ImgPublic::create([
            'name' => $request->name,
            'path' => basename($imagePath),
        ]);

        return redirect()->route('landingpage')->with('success', 'Imagen subida correctamente.');
    }

    public function destroy(Request $request, $id)
    {
        $img = ImgPublic::find($id);
        $img->delete();
        return redirect()->route('landingpage')->with('success', 'Imagen eliminada correctamente.');
    }
}
