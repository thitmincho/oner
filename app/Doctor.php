<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model 
{    
    protected $table = 'doctor';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    // public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'department_id',
        'employee_id',
        'consultation_charge',
    ];
}
