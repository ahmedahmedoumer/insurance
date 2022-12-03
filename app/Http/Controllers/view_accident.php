<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class view_accident extends Controller
{
    public function show_accident(Request $request)
    {
        try{

        $all_data = new report();
        return view('/admin/generate_report')->with('report', $all_data);
        
       } catch (\Throwable $th) {
        return "Something Wrong please check Your Inputs or Contact Admin";
       }
    }
}
