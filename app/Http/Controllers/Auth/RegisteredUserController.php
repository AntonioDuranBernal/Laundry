<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Controllers\Auth\RegisteredUserController;
class RegisteredUserController extends Controller
{
  public function store(Request $request){
    $request->validate(
    [   'name'=> ['required','string'],
        'email'=> ['email','unique:users'],//'required',
        'password'=> ['required','confirmed',Rules\Password::defaults()],
    ]);
    User::create([
    'name'=> $request->name,
    'email'=> $request->email,
    'password'=> app('hash')->make($request->password),
    ]);
    //Auth::login($user);
    return to_route('login')->with('status','Cuenta creada con éxito');
 }

public function login(){
  return view ('auth.login');
}

}
