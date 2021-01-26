<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacySaleItem extends Model 
{    
    protected $table = 'pharmacy_sale_item';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pharmacy_sale_id',
        'pharmacy_item_id',
        'quantity',
        'sale_price',
        'amount',
        'created_user_id',
        'updated_user_id',
    ];
    
    public function pharmacy_item(){
        return $this->hasOne('App\PharmacyItem','id','pharmacy_item_id');
    }
}
