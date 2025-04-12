<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImgPublic;

class ImgController extends Controller
{
    public function index()
    {
        $imgs = ImgPublic::all();
        return view('imghero', compact('imgs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'path' => 'required|image|mimes:webp|max:2048',
            'alt' => 'nullable|string|max:255',
        ], [
            'path.mimes' => 'Solo se permiten imágenes en formato .webp.',
        ]);

        // Almacenar la imagen
        $imagePath = $request->file('path')->store('landing', 'public');

        // Guardar en la base de datos
        ImgPublic::create([
            'name' => $request->name,
            'path' => basename($imagePath),
            'alt' => $request->alt,
        ]);

        return redirect()->route('imghero')->with('success', 'Imagen subida correctamente.');
    }

    public function destroy(Request $request, $id)
    {
        $img = ImgPublic::find($id);
        $img->delete();
        return redirect()->route('imghero')->with('success', 'Imagen eliminada correctamente.');
    }
    
}
