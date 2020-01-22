<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Offer;

class OfferController extends Controller{
  

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
    'municipalitiess.name as municipality_name'
    )
    ->first();
		if (!$offer) return response()->json('Offer not found',404);
		return response()->json($offer, 200);
	}

	public function deleteOffer($id){
		$offer = Offer::find($id);
		if (!$offer) return response()->json('Offer not found',404);
		$offer->trash = 1;
		if (!$offer->save()) return response()->json('Database Error',500);
		return response()->json('Offer successfully deleted', 200);
	}

}
