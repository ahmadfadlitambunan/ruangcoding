<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        return view('belajar', [
            'plans' => Plan::all(),
            /*
                SELECT * FROM `plans`;
            */
        ]);
    }

    public function ajax(Request $request)
    {   
        $id = $request->id;
        $result = Plan::find($id)->courses;

        return view('ajaxpage', [
            'courses' => $result
        ]);
    }
}
