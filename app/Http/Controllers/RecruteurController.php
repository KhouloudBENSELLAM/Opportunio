<?php

namespace App\Http\Controllers;

use App\Models\Recruteur;
use Illuminate\Http\Request;

class RecruteurController extends Controller
{
    public function index()
    {
        $recruteur= Recruteur::paginate(20);
        return view('recruteurs.index',compact('recruteur'));
    }

}
