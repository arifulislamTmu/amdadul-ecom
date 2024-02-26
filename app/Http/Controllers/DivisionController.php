<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

class DivisionController extends Controller
{
    function division()
    {
        $divisions = Division::all();
        return response()->json(['divisions' => $divisions]);
    }
    function districts($id)
    {
        $districts = District::where('division_id', $id)->get();
        return response()->json(['districts' => $districts]);
    }

    function upazila($id)
    {
        $upazilas = Upazila::where('district_id', $id)->get();
        return response()->json(['upazilas' => $upazilas]);
    }
}
