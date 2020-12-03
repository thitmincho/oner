<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model 
{    
    protected $table = 'patient';
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
        'age',
        'date_of_birth',
        'address',
        // 'township',
        // 'region',
        'blood_group',
        'gender',
        'status',
    ];
}
