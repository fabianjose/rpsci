<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Service;
use App\Fields;

class ServiceController extends Controller{

  public function newService(Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'name' => ['required', 'string', 'min:6', 'max:128', 'unique:services'],
      'fields' => ['json', 'nullable'],
      "fields.*"=> "json",
      "fields.*.name"=> "string|max:32|min:3",
      "fields.*.type"=> "in:numeric,string",
      "fields.*.unit"=> "string|max:16|min:1|nullable",
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $fields = $request->input("fields")?json_decode($data["fields"]):null;

    unset($data["fields"]);

    $service = Service::create($data);

    if($fields){
      foreach ($fields as $field) {
        Fields::storeData($service->id,json_decode($field));
      }
    }

    if (!$service) return response()->json('Error en la base de datos', 500);
    return response()->json('Servicio creado satisfactoriamente', 201);
  }

  public function editService($id, Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'name' => ['string', 'min:6', 'max:128', 'required'],
      'fields' => ['json', "array", 'max:2', 'nullable'],
      "fields.*"=> "json",
      "fields.*.name"=> "string|max:32|min:3",
      "fields.*.type"=> "in:numeric,string",
      "fields.*.unit"=> "string|max:16|min:1|nullable",
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }
    $service = Service::find($id);
    if (!$service) return response()->json('Servicio no encontrado',404);

    $keysAllow = [
      'name',
    ];

    foreach ($keysAllow as $key){
      if (isset($data[$key])){
        $service->{$key} = $data[$key];
      }
    }
    if (!$service->save()){
      
      return response()->json('Error en la base de datos', 500);
    }

    return response()->json('Servicio editado satisfactoriamente', 200);
  }

  public function getFields($id){
    return DB::table('fields')->where("service_id", $id)->where("trash",0)->get();
  }

  public function getAll(){
		$services = DB::table('services')->where('trash',0)->get();
    if (!$services) return response()->json('Error en la base de datos',500);
    
		return response()->json($services, 200);
	}

	public function getService($id){
		$service = Service::find($id);
		if (!$service) return response()->json('Servicio no encontrado',404);
		$service = DB::table('services')->where('id',$id)->where('trash',0)->first();
		if (!$service) return response()->json('Servicio no encontrado',404);
		return response()->json($service, 200);
	}

	public function deleteService($id){
		$service = Service::find($id);
		if (!$service) return response()->json('Servicio no encontrado',404);
		$service->trash = 1;
		if (!$service->save()) return response()->json('Error en la base de datos',500);
		return response()->json('Servicio eliminado satisfactoriamente', 200);
	}

}
