<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model{

  protected $fillable = [
    'name',
    'fields',
    'trash'
  ];

  public function fields(){
    return $this->hasMany("App\Fields", "service_id","id");
  }

}
