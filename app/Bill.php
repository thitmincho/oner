<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model 
{    
    protected $table = 'bill';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    // public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'patient_type',
        'inpatient_care_id',
        'emergency_care_id',
        'appointment_id',
        'bill_date_time',
        'discount',
        'tax_amount',
        'discharge_date_time',
        'status',
        'created_user_id',
        'updated_user_id',
    ];
}
