<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacySale extends Model 
{    
    protected $table = 'pharmacy_sale';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'patient_id',
        'total_amount',
        'discount',
        'remark',
        'status',
        'created_user_id',
        'updated_user_id',
    ];

    public function patient(){
        return $this->hasOne('App\Patient','id','patient_id');
    }

    public function detail(){
        return $this->hasMany('App\PharmacySaleItem','pharmacy_sale_id','id');
    }
}
