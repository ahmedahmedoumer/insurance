<?php

namespace App\Http\Controllers;

use App\Models\new_post;
use App\Models\customer;

class view_notice extends Controller
{
    public function view_notice($id)
    {

        try {
            $posts = new new_post();
            $data = $posts::all();
            $customer_data=customer::where('id',$id)->get();
            return view('/customer/view_notice')->with('data', $data)->with('customer_account',$customer_data);

        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
}
