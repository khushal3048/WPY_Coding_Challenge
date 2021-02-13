<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\house;
use App\Models\owner;

class car extends Model
{
    /**
     * The attributes that are represent table name.
     *
     * @var string
     */
    protected $table = 'cars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',
        'color',
        'license_plate',
        'house_id'
    ];

    /**
     * The attributes that are represent relationship.
     *
    */
    public function house(){
        return $this->belongsTo(house::class);
    }

    /**
     * The attributes that are represent relationship.
     *
    */
    public function owners(){
        return $this->belongsToMany(person::class, 'owners', 'car_id', 'person_id');
    }

}
