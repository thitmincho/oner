<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescriptionItem extends Model 
{    
    protected $table = 'prescription_detail';
    
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prescription_id',
        'pharmacy_item_id',
        'instruction',
    ];
    
}
