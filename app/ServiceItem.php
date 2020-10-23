<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceItem extends Model 
{    
    protected $table = 'service_item';
    
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_category_id',
        'name',
        'description',
        'charge_type',
        'standard_charge'
    ];
}
