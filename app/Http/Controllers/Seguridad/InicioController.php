<?php

namespace App\Http\Controllers\Seguridad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InicioController extends Controller
{
    
    public function index()
    {
        return view('welcome');
    }

    
}
