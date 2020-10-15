<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyItem extends Model 
{    
    protected $table = 'pharmacy_item';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'pharmacy_category_id',
        'universal_product_code',
        'sale_price',
        'purchase_price',
        'supplier_id',
        'created_user_id',
        'updated_user_id',
    ];
}
