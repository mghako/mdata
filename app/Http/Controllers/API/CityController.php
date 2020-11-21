<?php

namespace App\Http\Controllers\API;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Resources\CityCollection;
use Illuminate\Http\Request;

class CityController extends Controller
{
    
    public function index() {
        return CityCollection::collection(City::all());
    }

    
    
}
