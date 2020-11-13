<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyPurchase extends Model 
{    
    protected $table = 'pharmacy_purchase';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'supplier_id',
        'total_amount',
        'discount',
        'status',
        'created_user_id',
        'updated_user_id',
    ];
}
