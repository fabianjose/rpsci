<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldsValues extends Model
{
    protected $fillable=[
        "offer_id",
        "field_id",
        "value",
        "trash",
    ];

    public static function storeValues($value,$offer_id){

            $value->offer_id=$offer_id;

            FieldsValues::create((array) $value);

    }

}
