<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\person;
use App\Models\street;

class house extends Model
{
    /**
     * The attributes that are represent table name.
     *
     * @var string
    */
    protected $table = 'houses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'address',
        'street_id'
    ];

    /**
     * The attributes that are represent relationship.
     *
    */
    public function persons(){
        return $this->hasMany(person::class);
    }

    /**
     * The attributes that are represent relationship.
     *
    */
    public function street(){
        return $this->belongsTo(street::class);
    }

    

}
