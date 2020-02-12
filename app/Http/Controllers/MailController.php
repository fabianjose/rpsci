<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Mail;

class MailController extends Controller
{
    public function sendMail(Request $request){

      $data = $request->all();
      $validation = Validator::make($data, [
          "fullName" => "required|string|min:3|max:48",
          "email" => "required|email|max:64",
          "phone" => ["required","regex:/^[0-9\-\+]{9,15}$/"],
          "type" => "required|in:general,offer"
      ]);
      if ($validation->fails()){
        return response()->json($validation->errors(), 400);
      }

      $fromGeneral="He visitado su página y me gustaría que nos pusiéramos en contacto para validar mi cobertura";
      
      $fromOffer="He visitado su página y me gustaría conocer detalles más específicos sobre la oferta de {{empresa}} para {{servicio}} en {{zona}} ";
      //falta definir que haremos con los datos de la oferta

      //llevar el link de la oferta
      
      $general_message=$data["type"]=="general"?$fromGeneral:$fromOffer;

      Mail::send("mails.contact",
      [
          "fullName"=>$data["fullName"],
          "email"=>$data["email"],
          "phone"=>$data["phone"]
      ]
      ,function ($m)
      {
          $m->from(config("mail.username"));
          $m->to("contact.contratainternet@gmail.com", "Admin")->subject("offer Request");
      });

      return response()->json("Formulario enviado exitosamente", 200);
    }
}
