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
    'departments',
    'municipalities',
    'highlighted',
    'highlighted_expiration',
    'canales',
    'descuentos',
    'telefonia',
    'tecnologia',
    'tipo_plan_logos',
    'titulo1',
    'titulo2',
    'titulo3',
    'titulo4',
    
  ];

  public static function getFromAll($company=null,$service=null,$highlighted=false,$type=null){
    $offers=DB::table('offers')->where('offers.trash',0)
    ->join('companies','companies.id','offers.company')
    ->join('services', 'services.id','offers.service')
    ->where("offers.department", null);

    if($type){
      
      $offers->where(function ($query) use ($type){

        $query->where("offers.type", $type)
        ->orWhere("offers.type", null);
        
      });
        
    }
    
    if($company){
      
       $canales->where("offers.canales", $company);  
      
    } 
    if($company){
      
      $offers->where("offers.company", $company);  
      
    }    
    
    if($service){
      
      $offers->where('service',$service);
      
    }
    
    if($highlighted===true){
      
      $offers->where('offers.highlighted',1)
      ->where('offers.highlighted_expiration','>=',date('Y-m-d h:i:s'));
      
    }
    
    else if($highlighted==="not"){
      
      $offers->where("offers.highlighted", 0);
      
    }    

    return $offers
    ->select('offers.*',
    'companies.name as company_name',
    'companies.logo as company_logo',
    'services.name as service_name'
    );

  }

  public static function joinFields($offersArray){

    foreach ($offersArray as $offer) {
      if($offer)
      $offer->fields_values=DB::table('fields_values')
      ->join("fields", "fields.id", "fields_values.field_id")
      ->where("fields_values.offer_id", $offer->id)
      ->where("fields_values.trash", 0)
      ->limit(2)
      ->orderBy("fields_values.field_id","asc")
      ->select("fields_values.value", "fields.name as field_name", "fields.unit as unit", "fields.id as field_id")
      ->get();

      /*if($offer->departments){
        $offer->departments=Department::getFromIds(json_decode($offer->departments));
      }
  
      if($offer->municipalities){
        $offer->municipalities=Municipality::getFromIds(json_decode($offer->municipalities));
      }*/

    }

    return $offersArray;

  }

  public static function joinFieldsCondition($offersArray,$data){
    foreach ($offersArray as $offer) {
      if($offer)
      $offer->fields_values=DB::table('fields_values')
      ->join("fields", "fields.id", "fields_values.field_id")
      ->where("fields_values.offer_id", $offer->id)
      ->where("fields_values.trash", 0)
      ->limit(2)
      ->orderBy("fields_values.field_id","asc")
      ->select("fields_values.value", "fields.name as field_name", "fields.unit as unit", "fields.id as field_id")
      ->get();

    }
    if(isset($data['speeds'])){
      $offersArrayNew=[];
      foreach ($offersArray as $key => $offer) {

        foreach ($offer->fields_values as $fs) {
          if($fs->field_id == 4 && ($fs->value >= $data['speeds'][0] && $fs->value <= $data['speeds'][1])){
            array_push($offersArrayNew,$offer);
          }
        }
      }
      return $offersArrayNew;
    }

    return $offersArray;

  }

}
