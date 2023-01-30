<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TestController extends Controller
{

public function primerMensajePlantilla($cel){
        $token = 'EABKvFe5F8wsBAN7dvR0CeOl9jVEIVcTNiRkqrI3b0gYB5ePWr76a7LwWzDrFovyMUZA8KkDWAvkpQuX2H95nxo9Rn0witV7pqKIvccE7LFil0GHZAHSq7pkZB5ANY7yHJgFyeamGNbVUcvtQ515ZBQ0ZAkMMWNnnV4GhZB8XL8ERcEVzz9s179MP6ee9iWQdA2SFOcsgYvuwZDZD';
        $phoneId = '106567539007218';
        $version = 'v15.0';
        //$cel = 529512419458;
        $body = "Para registrarte responde SI a este mensaje, gracias. ";
        try{

           $payload = [
              "messaging_product" => "whatsapp",
              "recipient_type" => "individual",
              "to" => $cel,
              "type" => "text",
              "text" => [
                "preview_url" => false,
                "body" => $body
            ]
        ];

        /*$payload = [
          "messaging_product" => "whatsapp",
          "to" => $cel,
          "type" => "template",
          "template" => [
            "name" => "hello_world",
            "language" => [
              "code" => "es_US"
          ]
       ]
       ];*/

        $message = Http::withToken($token)->post('https://graph.facebook.com/' . $version . '/' . $phoneId . '/messages',$payload)->throw()->json();

        /*return response()->json([
            'success' => true,
            'data' => $message,
        ], 200);*/

        return to_route('clientes.paranota',$cel);
       //return to_route('clientes.inicioClientes');

    }catch(Exception $e){
      return response()->json([
        'success' => false,
        'error' => $e->$getMessage(),
    ], 500);
  }
}

public function AdelantoDado($cel,$nota){
        $token = 'EABKvFe5F8wsBAN7dvR0CeOl9jVEIVcTNiRkqrI3b0gYB5ePWr76a7LwWzDrFovyMUZA8KkDWAvkpQuX2H95nxo9Rn0witV7pqKIvccE7LFil0GHZAHSq7pkZB5ANY7yHJgFyeamGNbVUcvtQ515ZBQ0ZAkMMWNnnV4GhZB8XL8ERcEVzz9s179MP6ee9iWQdA2SFOcsgYvuwZDZD';
        //$cel="529512419458";
        $phoneId = '106567539007218';
        $version = 'v15.0';
        //$body="Se realizo el pago de la nota";
        try{
            $payload = [
              "messaging_product" => "whatsapp",
              "recipient_type" => "individual",
              "to" => $cel,
              "type" => "text",
              "text" => [
                "preview_url" => false,
                "body" => $nota
            ]
        ];
        $message = Http::withToken($token)->post('https://graph.facebook.com/' . $version . '/' . $phoneId . '/messages',$payload)->throw()->json();

        /*return response()->json([
            'success' => true,
            'data' => $message,
        ], 200);*/

        return to_route('inicio');

    }catch(Exception $e){
      return response()->json([
        'success' => false,
        'error' => $e->$getMessage(),
    ], 500);
  }

}
}
