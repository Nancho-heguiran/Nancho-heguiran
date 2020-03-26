<?php

namespace App\Http\Controllers\Sirnec;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\models\Usuario;
use Maatwebsite\Excel\facades\Excel;



class ScrController extends Controller
{
    public function index()
    {
        $user =  Usuario::find(auth()->user()->id);        
        // muestra el mensaje de sweetalert que viene del metodo que lo envia 
        if(session('success_message')){
            Alert::success('Success!', session('success_message'));
        }
        return view('sirnec.admin.scr.index', compact('user'));
    }

}
