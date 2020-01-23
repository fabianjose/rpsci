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
      'company' => ['required', 'exists:companies,id'],
      'service' => ['required', 'exists:services,id'],
      'benefits' => ['required', 'string'],
      'fields_value' => ['required', 'json'],
      'tariff' => ['required', 'string'],
      'points' => ['numeric'],
      'municipality' => ['required', 'in:private,company'],
      'department' => ['required', 'exists:departments,id'],
      'municipality' => ['required', 'exists:municipalities,id'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $offer = Offer::create($data);
    if (!$offer) return response()->json('Database Error', 500);
    return response()->json('Offer successfully created', 201);
  }

  public function editOffer($id, Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'company' => ['exists:companies,id'],
      'service' => ['exists:services,id'],
      'benefits' => ['string'],
      'fields_value' => ['json'],
      'tariff' => ['string'],
      'points' => ['numeric'],
      'municipality' => ['in:private,company'],
      'department' => ['exists:departments,id'],
      'municipality' => ['exists:municipalities,id'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }
    $offer = Offer::find($id);
    if (!$offer) return response()->json('Offer not found',404);

    $keysAllow = [
      'company',
      'service',
      'benefits',
      'fields_value',
      'tariff',
      'points',
      'type',
      'department',
      'municipality'
    ];

    foreach ($keysAllow as $key){
      if (isset($data[$key])){
        $offer->{$key} = $data[$key];
      }
    }
    if (!$offer->save()){
      return response()->json('Database Error', 500);
    }

    return response()->json('Offer successfully edited', 200);
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
    'municipalities.name as municipality_name'
    )
    ->get();
		if (!$offers) return response()->json('Database Error',500);
		return response()->json($offers, 200);
	}

	public function getOffer($id){
		$offer = Offer::find($id);
		if (!$offer) return response()->json('Offer not found',404);
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
    'municipalities.name as municipality_name'
    )
    ->first();
		if (!$offer) return response()->json('Offer not found',404);
		return response()->json($offer, 200);
	}

  public function getByLocation(Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'company' => ['required', 'exists:companies,id'],
      'department' => ['required', 'exists:departments,id'],
      'municipality' => ['required', 'exists:municipalities,id'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }
    $offers = DB::table('offers')
    ->where('trash',0)
    ->where('company',$data['company'])
    ->where('department',$data['department'])
    ->where('municipality',$data['municipality'])
    ->get();

    if (!$offers) return response()->json('Database Error',500);
		return response()->json($offers, 200);
  }

  public function HighlightOffer($id, Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'highlighted_expiration' => ['required', 'date_format:Y-m-d H:i:s'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $offer = Offer::find($id);
		if (!$offer) return response()->json('Offer not found',404);

    if ($offer->highlighted){
      $offer->highlighted = 0;
      $offer->highlighted_expiration = null;
      if (!$offer->save()) return response()->json('Database Error',500);
      return response()->json('Offer highlight disabled', 200);
    }else{
      $offer->highlighted = 1;
      $offer->highlighted_expiration = $data['highlighted_expiration'];
      if (!$offer->save()) return response()->json('Database Error',500);
      return response()->json('Offer successfully highlighted', 200);
    }

  }

  public function getAllHighlighted(){
		$offers = DB::table('offers')
    ->where('trash',0)
    ->where('highlighted',1)
    ->where('highlighted_expiration','<=',date('Y-m-d h:i:s'))
    ->get();
		if (!$offers) return response()->json('Database Error',500);
		return response()->json($offers, 200);
	}

	public function deleteOffer($id){
		$offer = Offer::find($id);
		if (!$offer) return response()->json('Offer not found',404);
		$offer->trash = 1;
		if (!$offer->save()) return response()->json('Database Error',500);
		return response()->json('Offer successfully deleted', 200);
	}

}
