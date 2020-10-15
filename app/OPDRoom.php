<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OPDRoom extends Model 
{    
    protected $table = 'opd_room';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name:',
        'location:',
        'current_doctor_id:',
        'current_queue_token:',
    ];

    public function doctor(){
        return $this->hasOne('App\Doctor','id','current_doctor_id');
    }
}
