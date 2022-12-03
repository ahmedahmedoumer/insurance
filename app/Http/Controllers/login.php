<?php

namespace App\Http\Controllers;

use App\Models\accident_report;
use App\Models\comment;
use App\Models\contract;
use App\Models\customer;
use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
{
    public function logins(Request $request)
    {

        $request->validate([
            'user' => 'required|alpha_num|min:5|max:30',
            'pass' => 'required|alpha_num|min:5|max:30',
            'select' => 'required',
        ]);

        // try {
        $msg = "Incorrect Username and Password Please Try Again !!";

        $username = $request->user;
        $password = $request->pass;
        $select = $request->select;
                
        if ($select == "admins") {
            $count = DB::table('admins')->select()->where('username', $username)->where('password', $password)->get()->count();
            if ($count == 1) {
                $count = customer::all()->count();
                $contracts = contract::all()->count();
                $comments = comment::all();
                $accident = accident_report::all()->count();

                return view('/admin/dashboard')->with('count', $count)->with('contract', $contracts)->with('comment', $comments)->with('accidents', $accident);
            } else {
                return view('/main/home')->with('msg', $msg);
            }
        } elseif ($select == "staffs") {

            $count = DB::table('staff')->select()->where('username', $username)->where('password', $password)->get()->count();
            if ($count == 1) {
                $staff = new staff();
                $login = $staff::where('username', $username)->where('password', $password)->update(['role' => 1]);
                $account = $staff::where('username', $username)->where('password', $password)->get();

                return view('/staff/home_page')->with('staff', $account);
            } else {

                return view('/main/home')->with('msg', $msg);
            }
        } elseif ($select == "customers") {
            $count = DB::table('customers')->select()->where('username', $username)->where('password', $password)->where('admin_approval', "true")->get()->count();
            if ($count == 1) {
                $customer = new customer();
                $account = $customer::where('username', $username)->where('password', $password)->get();
                return view('/main/cover_page')->with('customer_account', $account);
            } else {
                return view('/main/home')->with('msg', $msg);
            }
        } else {
            return view('/main/home')->with('msg', $msg);

        }

        // } catch (\Throwable $th) {
        //     return "Something Wrong please check Your Inputs or Contact Admin";
        // }
    }
}
