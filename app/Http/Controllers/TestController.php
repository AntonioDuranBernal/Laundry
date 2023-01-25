<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function sendMessage(){
        try{

            $token = 'EABKvFe5F8wsBAGexYiB84iZBkzAn3hFlp90uFLhXvp29rMBFCdZCMwFa0aFDd87kLW7HNWkXQrZBDFY2CCvlp1yZBT28KTNMPezZAiDxjC97nsXLz6qXtuZAwA1YU1K3zwVo6AXbMjKZAW0OajrDaZAjZCDLXicID3FGvXr5Ep6sZCZAESwfmeJ3qJS8ZCNZAKLK97gxVOwiZBwAPBXAZDZD';
            $phoneId = '106567539007218';
            $version = 'v15.0';
            $payload = [
              "messaging_product" => "whatsapp",
              "recipient_type" => "individual",
              "to" => "529512419458",
              "type" => "text",
              "text" => [
                "preview_url" => false,
                "body" => "Registro correcto"
            ]
        ];
        $message = Http::withToken($token)->post('https://graph.facebook.com/' . $version . '/' . $phoneId . '/messages',$payload)->throw()->json();
        return to_route('clientes.inicioClientes');

    }catch(Exception $e){
      return response()->json([
        'success' => false,
        'error' => $e->$getMessage(),
    ], 500);
  }

}
}
