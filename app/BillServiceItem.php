<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillServiceItem extends Model 
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
        'bill_id',
        'service_item_id',
        'charge',
        'charge_type',
    ];
}
