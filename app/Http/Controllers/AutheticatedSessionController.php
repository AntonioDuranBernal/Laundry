<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class AutheticatedSessionController extends Controller
{
     public function astore(Request $request){
       $credentials = $request->validate(
       ['email'=> ['email','string','required'],//'required',
        'password'=> ['required','string'],
       ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('inicio');
        }
        return back()->withErrors([
            'email' => 'Las credenciales dadas no coinciden.',
        ])->onlyInput('email');
        }

        public function destroy(Request $request){
         Auth::guard('web')->logout();
         /*$request->session()->invalidate();
         $request->session->regenerateToken();
         //return to_route('login')->with('status','Sesión cerrada!');
         return $this->loggedOut($request) ?: redirect('login')->with('status','Sesión cerrada!');*/
        //$this->guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); // add this line here
        //return $this->loggedOut($request) ?: redirect('login');
        return to_route('login')->with('status','Sesión cerrada!');
        }
}
