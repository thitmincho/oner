<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyInventoryTransaction extends Model 
{    
    protected $table = 'pharmacy_inventory_transaction';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pharmacy_item_id',
        'transaction_type',
        'quantity',
        'moving_average_price',
        'purchasing_price',
        'selling_price',
        'opening_balance',
        'closing_balance',
        'expired_date',
        'note',
        'created_user_id',
        'updated_user_id',
    ];
}
