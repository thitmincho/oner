<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model 
{    
    protected $table = 'medical_record_prescription';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medical_record_id',
        'pharmacy_item_id',
        'quantity',
    ];
}
