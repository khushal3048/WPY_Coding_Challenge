<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\car;
use App\Models\house;
use App\Models\street;
use App\Models\owner;

class person extends Model
{
    /**
     * The attributes that are represent table name.
     *
     * @var string
    */
    protected $table = 'people';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'name',
        'age',
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
        return $this->hasMany(owner::class);
    }
}
