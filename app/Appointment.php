<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model 
{    
    protected $table = 'appointment';
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
        'doctor_id',
        'opd_room_id',
        'appointment_time',
        'status',
        'appointment_type',
        'source',
        'create_user_id',
        'created_user_login_id',
        'updated_user_login_id',
    ];
}
