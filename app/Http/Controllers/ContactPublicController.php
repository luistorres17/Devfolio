<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactPublic;

class ContactPublicController extends Controller
{
    public function index()
    {
        $contacts = ContactPublic::all();
        return view('contacto', compact('contacts'));
    }
    
}
