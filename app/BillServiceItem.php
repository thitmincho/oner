<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillServiceItem extends Model 
{    
    protected $table = 'bill_service_item';
    public $timestamps = false;
    
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

    public function serviceitem(){
        return $this->hasOne('App\ServiceItem','id','service_item_id');
    }
    
}
