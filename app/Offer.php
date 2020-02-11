<?php

namespace App;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model{

  protected $fillable = [
    'company',
    'service',
    'benefits',
    'fields_value',
    'tariff',
    'points',
    'type',
    'department',
    'municipality',
    'highlighted',
    'highlighted_expiration',
    'trash'
  ];

  public static function getFromAll($options=[]){

    if(in_array("company",$options)){
      return DB::table('offers')->where('offers.trash',0)
      ->join('companies','companies.id','offers.company')
      ->join('services', 'services.id','offers.service')
      ->where("offers.company", $options["company"])
      ->where("offers.department", null)
      ->where("offers.department", null)
      ->select('offers.*',
      'companies.name as company_name',
      'companies.logo as company_logo',
      'services.name as service_name',
      )
      ->get();      
    }

    if(in_array("company",$options)){
      
      return DB::table('offers')->where('offers.trash',0)
      ->join('companies','companies.id','offers.company')
      ->join('services', 'services.id','offers.service')
      ->where("offers.company", $options["company"])
      ->where("offers.department", null)
      ->where("offers.department", null)
      ->select('offers.*',
      'companies.name as company_name',
      'companies.logo as company_logo',
      'services.name as service_name',
      )
      ->get();      

    }

    if(in_array("company",$options)){
      
      return  DB::table('offers')
      ->where('offers.trash',0)
      ->where('offers.highlighted',1)
      ->where('offers.highlighted_expiration','>=',date('Y-m-d h:i:s'))
      ->where("offers.department", null)
      ->where("offers.department", null)
      ->join('companies','companies.id','offers.company')
      ->join('services', 'services.id','offers.service')
      ->select('offers.*',
      'companies.name as company_name',
      'companies.logo as company_logo',
      'services.name as service_name',
      )
      ->get();

    }

    else return DB::table('offers')->where('offers.trash',0)
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->where("offers.department", null)
    ->where("offers.department", null)
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name',
    )
    ->get();

  }

  public static function joinFields($offersArray){

    foreach ($offersArray as $offer) {
      $offer->fields_values=DB::table('fields_values')
      ->join("fields", "fields.id", "fields_values.field_id")
      ->where("fields_values.offer_id", $offer->id)
      ->where("fields_values.trash", 0)
      ->limit(2)
      ->orderBy("fields_values.field_id","asc")
      ->select("fields_values.value", "fields.name as field_name", "fields.unit as unit")
      ->get();
    }

    return $offersArray;

  }

}
