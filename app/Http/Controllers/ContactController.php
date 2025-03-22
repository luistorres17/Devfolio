<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactPublic;
use App\Models\ContactPrivate;
use App\Models\User;

class ContactController extends Controller
{
    public function index()
    {
        $contactpublics_backend = ContactPublic::all();
        $contactprivates_backend = ContactPrivate::all();
        $user = User::find(1);
        return view('contacto', compact('contactprivates_backend', 'contactpublics_backend', 'user'));
    }

    public function privatestore(Request $request)
    {
        $request->validate([
            'submission_id' => 'required', //el id del mensaje que se va a responder
            'reviewed_by' => 'required', //el id del usuario que va a revisar el mensaje
            'notes' => 'required', //la nota que va a agregar
            'created_at' => 'required', //la fecha de creación del mensaje
            //'updated_at' => 'required', //la fecha de actualización del mensaje
        ]);

        // Guardar en la base de datos
        ContactPrivate::create([
            'submission_id' => $request->submission_id,
            'reviewed_by' => $request->reviewed_by,
            'notes' => $request->notes,
            'created_at' => $request->created_at,
            //'updated_at' => $request->updated_at,
        ]);
        return redirect()->route('contacto')->with('success', 'Datos guardados correctamente.');
            
    }

    //delete public
    public function publicdelete($id)
    {
        //1. copiar el id del mensaje a eliminar
        $submission_id = $id;
        //2. eliminar la fila en la tabla contact_privates con el submission_id
        ContactPrivate::where('submission_id', $submission_id)->delete();
        //3. eliminar la fila con el parametro id en la tabla contact_publics
        ContactPublic::destroy($id);
        return redirect()->route('contacto')->with('success', 'Datos eliminados correctamente.');
    }
    

}
