<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyIssue extends Model 
{    
    protected $table = 'pharmacy_issue';
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'issue_to',
        'total_amount',
        'created_user_id',
        'updated_user_id',
    ];
}
