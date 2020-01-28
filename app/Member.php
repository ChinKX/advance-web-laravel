<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'membership_no',
        'nric',
        'name',
        'gender',
        'address',
        'postcode',
        'city',
        'state',
    ];

    /**
    * Get the division that the memberjoined.
    */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
