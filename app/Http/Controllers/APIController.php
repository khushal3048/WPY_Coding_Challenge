<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\StreetResource;
use App\Http\Resources\PersonResource;
use App\Http\Resources\HouseResource;
use App\Http\Resources\CarResource;
use Illuminate\Database\Eloquent\Builder;
use Validator;
use App\Models\street;
use App\Models\house;
use App\Models\person;
use App\Models\car;
use App\Models\owner;

class APIController extends Controller
{
    /**
     * API end point to fetch all people living in city 
     * 
     * @return App\Http\Resources\PersonResource
     */
    public function getPeople(){
        
        $persons = person::all();

        return PersonResource::collection($persons);
    }

    /**
     * API end point to fetch all cars when providing a particular street name 
     * 
     * @param \Illuminate\Http\Request  $request
     * @return App\Http\Resources\StreetResource
     */
    public function getCars(Request $request){

        $validation = Validator::make($request->all(),[ 
            'street_name' => 'required'
        ]);

        if($validation->fails()){
            return response()->json(['message' => 'street_name required.']);
        }
        
        $cars = street::with('cars')
                    ->where('name',$request->street_name)
                    ->get();

        return StreetResource::collection($cars);

    }

    /**
     * API end point to fetch the owner(s) of a vehicle when providing a license plate 
     * 
     * @param \Illuminate\Http\Request  $request
     * @return App\Http\Resources\CarResource
     */
    public function getOwner(Request $request){

        $validation = Validator::make($request->all(),[ 
            'license_plate' => 'required'
        ]);

        if($validation->fails()){
            return response()->json(['message' => 'license_plate required.']);
        }

        $owners = car::with('owners')
                    ->where('license_plate', $request->license_plate)
                    ->get();

        return CarResource::collection($owners);

    }

    /**
     * API end point to fetch the full address and street of a house when providing a person's name 
     * 
     * @param \Illuminate\Http\Request  $request
     * @return App\Http\Resources\HouseResource
     */
    public function getHouse(Request $request){
        
        $validation = Validator::make($request->all(),[ 
            'person_name' => 'required'
        ]);

        if($validation->fails()){
            return response()->json(['message' => 'person_name required.']);
        }

        $house = house::with('street')
                    ->whereHas('persons', function(Builder $query) use($request){
                        $query->where('name', $request->person_name);
                    })
                    ->get();

        return HouseResource::collection($house);

    }


}
