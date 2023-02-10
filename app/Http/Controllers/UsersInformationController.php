<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\usersInformation;
use App\Http\Controllers\Auth\RegisteredUserController;
class UsersInformationController extends Controller
{

  public function guardar(Request $request){
    $request->validate(
    [   'name'=> ['required','string'],
        'rol'=> ['required','string'],
        'sucursal'=> ['required','integer'],
        'apellidos'=> ['required','string'],
        'celular'=> ['integer','unique:users_Information'],
        'email'=> ['email','unique:users'],//'required',
        'password'=> ['required','confirmed',Rules\Password::defaults()],
    ]);

  $u= new User;
  $u->name = $request->input('name');
  $u->email = $request->input('email');
  $u->password = app('hash')->make($request->password);
  $u->save();
  $idu = User::where('name',$request->input('name'))->first();
  $idur = $idu->id;

  $ui= new usersInformation;
  $ui->nombre = $request->input('nombre');
  $ui->idUser = $idur;
  $ui->rol = $request->input('rol');
  $ui->sucursal = $request->input('sucursal');
  $ui->apellidos = $request->input('apellidos');
  $ui->celular = $request->input('celular');
  $ui->save();

    /*usersInformation::create([
    'nombre'=> $request->name,
    'idUser'=> $idur,
    'rol'=> $request->rol,
    'sucursal'=> $request->sucursal,
    'apellidos'=> $request->apellidos,
    'celular'=> $request->celular,
    ]);*/
    return to_route('usuarios.inicioUsuarios')->with('status','Cuenta creada con éxito ');
  }

    public function show(Request $request){
    $request->validate(
    ['id'=> ['required','numeric'],
    ]);
   //$n = cliente::find($request->input('celular'));
   $t = usersInformation::where('id',$request->input('id'))->first();
   if(is_null($t)){
    return to_route('usuarios.inicioUsuarios')->with('status','Usuario no encontrado.');
  }
  return view ('usuarios.show',['usuario' => $t]);
}

public function ver($idr){
     $n = usersInformation::find($idr);
     return view('usuarios.show',['usuario'=>$n]);//,$idr
   }

   public function inicioUsuarios(){
  $elementos = usersInformation::get();
  return view('usuarios.inicioUsuarios', ['elementos'=>$elementos]);
}


}
