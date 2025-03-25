<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImgPublic;
use App\Models\HeroHome;
use App\Models\User;

class landingPageController extends Controller
{
    public function index()
    {
        $imgs = ImgPublic::all();
        $hero = HeroHome::first();
        $user = User::first();
        return view('landingpage', compact('imgs', 'hero' , 'user'));
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

    //editar hero update

    public function heroupdate(Request $request, $id)
    {
        $hero = HeroHome::find($id);
        $request->validate([
            'user_id' => 'required',
            'welcome_text' => 'required',
        ]);
        $hero->user_id = $request->user_id;
        $hero->welcome_text = $request->welcome_text;
        $hero->save();
        return redirect()->route('landingpage')->with('success', 'Datos actualizados correctamente.');
    }
    

    public function herostore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'welcome_text' => 'required',
        ]);
        // Guardar en la base de datos
        HeroHome::create([
            'user_id' => $request->user_id,
            'welcome_text' => $request->welcome_text,
        ]);
        return redirect()->route('landingpage')->with('success', 'Datos guardados correctamente.');
    }

    public function destroy(Request $request, $id)
    {
        $img = ImgPublic::find($id);
        $img->delete();
        return redirect()->route('landingpage')->with('success', 'Imagen eliminada correctamente.');
    }

    public function herodestroy(Request $request, $id)
    {
        $hero = HeroHome::find($id);
        $hero->delete();
        return redirect()->route('landingpage')->with('success', 'Hero eliminada correctamente.');
    }
}
