<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model{

  protected $fillable = [
    'company',
    'service',
    'benefits',
    'fields',
    'tariff',
    'points',
    'type',
    'department',
    'municipality',
    'trash'
  ];

}
