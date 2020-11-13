<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyInventory extends Model 
{    
    protected $table = 'pharmacy_inventory';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pharmacy_item_id',
        'pharmacy_warehouse_id',
        'opening_balance',
        'closing_balance',
        'economic_order_quantity',
        'reorder_level',
        'minimum',
        'maximum',
        'batch',
        'expired_date',
        'created_user_id',
        'updated_user_id',
    ];
}
