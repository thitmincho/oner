<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model 
{    
    protected $table = 'inventorys';
    
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'relation_id',
        'location_id',
        'balance',
        'unit',
        'average_price',
        'purchasing_price',
        'selling_price',
        'batch_number',
        'expiry_date',
        'description'
    ];

    public function location(){
        return $this->hasOne('App\StoreLocation','id','location_id');
    }

    public function lab(){
        return $this->hasOne('App\LabItem','id','relation_id');
        // ->where('inventorys.type','lab_items');
    }
    public function general(){
        return $this->hasOne('App\GeneralItem','id','relation_id');
        // ->where('type','general_items');
    }
    public function pharmacy(){
        return $this->hasOne('App\PharmacyItem','id','relation_id');
        // ->where('type','pharmacy_items');
    }

   
}
