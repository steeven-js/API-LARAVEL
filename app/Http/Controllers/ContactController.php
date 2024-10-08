<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Méthode pour afficher le formulaire de contact
    public function index()
    {
        return view('contact');
    }
}
