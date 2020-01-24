<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Municipality;
use App\Department;
use App\Company;
use App\Offer;

class OfferController extends Controller{

  public function newOffer(Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'company' => ['required', 'exists:companies,name', 'string'],
      'service' => ['required', 'exists:services,id'],
      'benefits' => ['required', 'string'],
      'fields_value' => ['required', 'json'],
      'tariff' => ['required', 'string'],
      'points' => ['string'],
      'municipality' => ['required', 'in:private,company'],
      'department' => ['required', 'exists:departments,name', 'string'],
      'municipality' => ['required', 'exists:municipalities,name', 'string'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $company = Company::where('name',$data['company'])->first();
    $department = Department::where('name',$data['department'])->first();
    $municipality = Municipality::where('name',$data['municipality'])->first();
    if (!$company) return response()->json('Empresa no encontrada',404);
    if (!$department) return response()->json('Departamento no encontrada',404);
    if (!$municipality) return response()->json('Municipio no encontrada',404);
    $data['company'] = $company->id;
    $data['department'] = $department->id;
    $data['municipality'] = $municipality->id;

    $offer = Offer::create($data);
    if (!$offer) return response()->json('Error en la base de datos', 500);
    return response()->json('Oferta creada satisfactoriamente', 201);
  }

  public function editOffer($id, Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'company' => ['exists:companies,name', 'string'],
      'service' => ['exists:services,id'],
      'benefits' => ['string'],
      'fields_value' => ['json'],
      'tariff' => ['string'],
      'points' => ['string'],
      'municipality' => ['in:private,company'],
      'department' => ['exists:departments,name', 'string'],
      'municipality' => ['exists:municipalities,name', 'string'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }
    $offer = Offer::find($id);
    if (!$offer) return response()->json('Oferta no encontrada',404);

    $company = Company::where('name',$data['company'])->first();
    $department = Department::where('name',$data['department'])->first();
    $municipality = Municipality::where('name',$data['municipality'])->first();
    if (!$company) return response()->json('Empresa no encontrada',404);
    if (!$department) return response()->json('Departamento no encontrada',404);
    if (!$municipality) return response()->json('Municipio no encontrada',404);
    $data['company'] = $company->id;
    $data['department'] = $department->id;
    $data['municipality'] = $municipality->id;

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
      return response()->json('Error en la base de datos', 500);
    }

    return response()->json('Oferta editada satisfactoriamente', 200);
  }

  public function getAll(){
		$offers = DB::table('offers')->where('offers.trash',0)
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->join('departments', 'departments.id','offers.department')
    ->join('municipalities', 'municipalities.id','offers.municipality')
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name',
    'services.fields as service_fields',
    'departments.name as department_name',
    'municipalities.name as municipality_name'
    )
    ->get();
		if (!$offers) return response()->json('Error en la base de datos',500);
		return response()->json($offers, 200);
	}

	public function getOffer($id){
		$offer = Offer::find($id);
		if (!$offer) return response()->json('Oferta no encontrada',404);
		$offer = DB::table('offers')->where('offers.id',$id)->where('offers.trash',0)
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->join('departments', 'departments.id','offers.department')
    ->join('municipalities', 'municipalities.id','offers.municipality')
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name',
    'services.fields as service_fields',
    'departments.name as department_name',
    'municipalities.name as municipality_name'
    )
    ->first();
		if (!$offer) return response()->json('Oferta no encontrada',404);
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

    if (!$offers) return response()->json('Error en la base de datos',500);
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
		if (!$offer) return response()->json('Oferta no encontrada',404);

    if ($offer->highlighted){
      $offer->highlighted = 0;
      $offer->highlighted_expiration = null;
      if (!$offer->save()) return response()->json('Error en la base de datos',500);
      return response()->json('Offer highlight disabled', 200);
    }else{
      $offer->highlighted = 1;
      $offer->highlighted_expiration = $data['highlighted_expiration'];
      if (!$offer->save()) return response()->json('Error en la base de datos',500);
      return response()->json('Offer successfully highlighted', 200);
    }

  }

  public function getAllHighlighted(){
		$offers = DB::table('offers')
    ->where('trash',0)
    ->where('highlighted',1)
    ->where('highlighted_expiration','<=',date('Y-m-d h:i:s'))
    ->get();
		if (!$offers) return response()->json('Error en la base de datos',500);
		return response()->json($offers, 200);
	}

	public function deleteOffer($id){
		$offer = Offer::find($id);
		if (!$offer) return response()->json('Oferta no encontrada',404);
		$offer->trash = 1;
		if (!$offer->save()) return response()->json('Error en la base de datos',500);
		return response()->json('Oferta eliminada satisfactoriamente', 200);
	}

}
