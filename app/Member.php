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
		'phone',
		'division_id',
    ];

    /**
    * Get the division that the member joined.
    */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    /**
    * The groups that belong to the member.
    */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
