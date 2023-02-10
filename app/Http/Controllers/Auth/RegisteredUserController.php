<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\usersInformation;
use App\Http\Controllers\Auth\RegisteredUserController;

class RegisteredUserController extends Controller
{

  public function ustore(Request $request){
    $request->validate(
    [   'name'=> ['required','string'],
        'rol'=> ['required','string'],
        'apellidos'=> ['required','string'],
        'celular'=> ['integer','unique:users_Information'],
        'email'=> ['email','unique:users'],//'required',
        'password'=> ['required','confirmed',Rules\Password::defaults()],
    ]);
    User::create([
    'name'=> $request->name,
    'email'=> $request->email,
    'password'=> app('hash')->make($request->password),
    ]);
    $idu = User::where('name',$request->input('name'))->first();
    $idur = $idu->id;

    usersInformation::create([
    'nombre'=> $request->name,
    'rol'=> $request->rol,
    'apellidos'=> $request->apellidos,
    'celular'=> $request->celular,
    'idUser'=> $idur,
    'sucursal'=> $request->sucursal,
    ]);
    return to_route('login')->with('status','Cuenta creada con éxito');
 }


public function login(){
  return view ('auth.login');
}

}
