<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\LocalGovernment;
use App\Models\State;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getStates($country_id)
    {
        return State::where('country_id', $country_id)->get();
    }

    public function getLocalGovt()
    {
        return LocalGovernment::all();
    }
}
