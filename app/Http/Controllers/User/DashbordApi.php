<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\Districts;

class DashbordApi extends Controller
{

    public function getCastByReligionApi(Request $request)
    {
        if ($request->input('religion_id') !== null) {
            $condition['religion_id'] = $request->input('religion_id');
        }
        $cast = Cast::where($condition)->get();
        return response()->json(['message' => 'POST request received', 'data' => $cast], 200);
    }

    public function getDistrictsByStateApi(Request $request)
    {
        if ($request->input('state_id') !== null) {
            $condition['state_id'] = $request->input('state_id');
        }
        $districts = Districts::where($condition)->get();
        return response()->json(['message' => 'POST request received', 'data' => $districts], 200);
    }
}
