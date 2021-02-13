<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\person;
use App\Models\car;

class owner extends Model
{
    /**
     * The attributes that are represent table name.
     *
     * @var string
     */
    protected $table = 'owners';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'license_plate',
        'person_id'
    ];
}
