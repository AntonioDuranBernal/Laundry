<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class TestController extends Controller
{

  public function primerMensajePlantilla($cel,$nombre){
    $token = 'EABKvFe5F8wsBAEodtNUwNAcsBlGMJOIkvEOhoPL5ocKaxZBUhSaSo0BhZC7gGsqhKQCaUsakMsiT43k7NbEKZBCF0eZB6caHM6i7rrsUg83KolaF5XCBnSMASyytxa2Ez0AV4ij8RGMRadhXUfeMEZC4OjbuodYQZA5fu8OHDyKMIFFflNeeh1XOgyMvStOnDaQOkYL9Yuvn6BEbq2KAO17FHM8HFVwBcZD';
    $phoneId = '108583278822910';
    $version = 'v15.0';
    try{
      $payload = [
        "messaging_product" => "whatsapp",
        "to" => $cel,
        "type" => "template",
        "template" => [
          "name" => "inicio",
          "language" => [
            "code" => "es_MX"
          ],
          'components' => [

            [
              "type" => "body",
              "parameters" => [
                [
                  "type" => "text",
                  "text" => $nombre
                ]
              ]
            ]

          ]
        ]
      ];
          $message = Http::withToken($token)->post('https://graph.facebook.com/' . $version . '/' . $phoneId . '/messages',$payload)->throw()->json();

          return to_route('clientes.paranota',$cel);

        }catch(Exception $e){
          return response()->json([
            'success' => false,
            'error' => $e->$getMessage(),
          ], 500);
        }
      }

      public function mensajePersonalizado($cel,$nota){
        $token = 'EABKvFe5F8wsBAEodtNUwNAcsBlGMJOIkvEOhoPL5ocKaxZBUhSaSo0BhZC7gGsqhKQCaUsakMsiT43k7NbEKZBCF0eZB6caHM6i7rrsUg83KolaF5XCBnSMASyytxa2Ez0AV4ij8RGMRadhXUfeMEZC4OjbuodYQZA5fu8OHDyKMIFFflNeeh1XOgyMvStOnDaQOkYL9Yuvn6BEbq2KAO17FHM8HFVwBcZD';
        $phoneId = '108583278822910';
        $version = 'v15.0';
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

          session()->flash('status',"Mensaje enviado");
          return to_route('clientes.inicioClientes');

        }catch(Exception $e){
          return response()->json([
            'success' => false,
            'error' => $e->$getMessage(),
          ], 500);
        }
      }

      public function mensajePago($cel,$nota,$idnota){
        $token = 'EABKvFe5F8wsBAEodtNUwNAcsBlGMJOIkvEOhoPL5ocKaxZBUhSaSo0BhZC7gGsqhKQCaUsakMsiT43k7NbEKZBCF0eZB6caHM6i7rrsUg83KolaF5XCBnSMASyytxa2Ez0AV4ij8RGMRadhXUfeMEZC4OjbuodYQZA5fu8OHDyKMIFFflNeeh1XOgyMvStOnDaQOkYL9Yuvn6BEbq2KAO17FHM8HFVwBcZD';
        $phoneId = '108583278822910';
        $version = 'v15.0';
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

          session()->flash('status',"Mensaje de aviso enviado.");
          return to_route('notas.show',$idnota);

        }catch(Exception $e){
          return response()->json([
            'success' => false,
            'error' => $e->$getMessage(),
          ], 500);
        }
      }



    }
