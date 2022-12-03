<?php

namespace App\Http\Controllers;

use App\Models\contract;
use Illuminate\Http\Request;

class view_contracts extends Controller
{
    public function view_contracts(Request $request)
    {
        try{
        $data = contract::all();
        return view('customer.view_contract')->with('data', $data);
        
    } catch (\Throwable $th) {
        return "Something Wrong please check Your Inputs or Contact Admin";
    }
    }
}
