<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\house;
use App\Models\person;
use App\Models\car;

class street extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    /**
     * The attributes that are represent table name.
     *
     * @var string
    */
    protected $table = 'streets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes that are represent relationship.
     *
    */
    public function houses(){
        return $this->hasMany(house::class);
    }

    /**
     * The attributes that are represent relationship.
     */
    public function cars()
    {
        return $this->hasManyThrough(car::class, house::class);
    }
}
