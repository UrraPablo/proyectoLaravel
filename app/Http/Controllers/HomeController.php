<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Metodo invoke cuando solo hay una ruta 
    public function __invoke()
    {
        return view('home');
        
    }
}
