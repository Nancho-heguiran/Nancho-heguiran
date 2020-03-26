<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{   
    use AuthenticatesUsers;
    protected $redirectTo = '/home';
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function username()
    {
        return 'login';//aqui se cambia cuando voy a validar con otro campo de la tabla usuarios
    }

    protected function authenticated(Request $request, $user)
    {
        //dd($user->estado_id); //aqui se valida que este activo o no el usuario
        if($user->estado_id == 2){
            return redirect()->route('logout');
        }
        return redirect()->route('home');
    }

    
}
