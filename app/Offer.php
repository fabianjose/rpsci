<?php

namespace App;

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

  public function fieldsValues(){

    return $this->hasMany('App\FieldsValue', 'offer_id');

  }

}
