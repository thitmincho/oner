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
        'brand_name',
        'generic_name',
        'form',
        'strength',
        'uom',
        'po_uom',
        'unit_conversion_id',
        'abbr',
        // 'packaging',
        // 'sale_price',
        // 'purchase_price',
        'supplier_id',
        'created_user_id',
        'updated_user_id',
    ];

    public function pharmacy_category(){
        return $this->hasOne('App\PharmacyCategory','id','pharmacy_category_id');
    }

    public function pharmacy_unit_conversion(){
        return $this->hasOne('App\PharmacyUnitConversion','pharmacy_item_id','id');
    }

    public function pharmacy_inventory(){
        return $this->hasOne('App\PharmacyInventory','pharmacy_item_id','id');
    }

    public function service_item(){
        return $this->hasOne('App\ServiceItem','relation_id','id')->where('service_type','pharmacy_item');
    }

}
