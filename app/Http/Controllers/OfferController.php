<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller{

  public function newOffer(Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'company' => ['required', 'string', 'min:6', 'max:128', 'exist:services'],
      'fields' => ['required', 'json'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $service = Service::create($data);
    if (!$service) return response()->json('Database Error', 500);
    return response()->json('Service successfully created', 201);
  }

  public function editService($id, Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'name' => ['string', 'min:6', 'max:128'],
      'fields' => ['json'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }
    $service = Service::find($id);
    if (!$service) return response()->json('Service not found',404);

    $keysAllow = [
      'name',
      'fields'
    ];

    foreach ($keysAllow as $key){
      if (isset($data[$key])){
        $service->{$key} = $data[$key];
      }
    }
    if (!$service->save()){
      return response()->json('Database Error', 500);
    }

    return response()->json('Service successfully edited', 200);
  }

  public function getAll(){
		$offers = DB::table('offers')->where('offers.trash',0)
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->join('departments', 'departments.id','offers.department')
    ->join('municipalities', 'municipalities.id','offers.municipality')
    ->select('offers.*',
    'companies.name as company_name',
    'services.name as service_name',
    'services.fields as service_fields',
    'departments.name as department_name',
    'municipalitiess.name as municipality_name'
    )
    ->get();
		if (!$offers) return response()->json('Database Error',500);
		return response()->json($offers, 200);
	}

	public function getOffer($id){
		$offer = Service::find($id);
		if (!$offer) return response()->json('Service not found',404);
		$offer = DB::table('offers')->where('offers.id',$id)->where('offers.trash',0)
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->join('departments', 'departments.id','offers.department')
    ->join('municipalities', 'municipalities.id','offers.municipality')
    ->select('offers.*',
    'companies.name as company_name',
    'services.name as service_name',
    'services.fields as service_fields',
    'departments.name as department_name',
    'municipalitiess.name as municipality_name'
    )
    ->first();
		if (!$offer) return response()->json('Service not found',404);
		return response()->json($offer, 200);
	}

	public function deleteService($id){
		$service = Service::find($id);
		if (!$service) return response()->json('Service not found',404);
		$service->trash = 1;
		if (!$service->save()) return response()->json('Database Error',500);
		return response()->json('Service successfully deleted', 200);
	}

}
