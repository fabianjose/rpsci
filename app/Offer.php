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

  public static function getFromAll($company=null,$service=null,$highlighted=false,$type=null){
    $offers=DB::table('offers')->where('offers.trash',0)
    ->where("offers.department", null)
    ->where("offers.municipality", null)
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service');

    if($company){

      $offers->where("offers.company", $company);  

    }

    if($service){
      
      $offers->where('service',$service);

    }

    if($highlighted){
      
      $offers->where('offers.highlighted',1)
      ->where('offers.highlighted_expiration','>=',date('Y-m-d h:i:s'));

    }

    if($type){
      
      $offers->where("offers.type", $type);

    }

    return $offers->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name'
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
      ->select("fields_values.value", "fields.name as field_name", "fields.unit as unit", "fields.id as field_id")
      ->get();
    }

    return $offersArray;

  }

}
