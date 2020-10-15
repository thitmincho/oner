<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model 
{    
    protected $table = 'medical_record';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    // public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'record_type',
        'care_id',
        'doctor_notes',
        'attachment',
        'created_user_id',
        'updated_user_id',
    ];
}
