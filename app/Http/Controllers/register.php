<?php

namespace App\Http\Controllers;

use App\Models\contract;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class register extends Controller
{
    public function staff_register(request $request)
    {

        $request->validate([
            'firstname' => 'required|alpha|min:3|max:10',
            'lastname' => 'required|alpha|min:3|max:10',
            'username' => 'required|min:3|max:15',
            'password' => 'required|min:3|max:30',
            'phone_no' => 'required|numeric|size:12',
            'address' => 'required',
            'email' => 'required|email',
        ]);
        try {

            $success = "Congratulation You are successfully Registerd";
            $fail = "Sorry Not Registerd";
            $fname = $request->firstname;
            $lname = $request->lastname;
            $uname = $request->username;
            $pass = $request->password;
            $p_no = $request->phone_no;
            $address = $request->address;
            $email = $request->email;
            // $register=new staff()->([

            // ]);
            $check = DB::table('staff')->insert([
                'first_name' => $fname,
                'last_name' => $lname,
                'username' => $uname,
                'password' => $pass,
                'phone_no' => $p_no,
                'address' => $address,
                'email' => $email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            if ($check) {

                return view('admin.staff_register')->with('success', $success);
            } else {
                return view('admin.staff_register')->with('fail', $fail);
            }
        } catch (\Throwable $th) {
            return $th;
        }

    }
    public function customeregister($id)
    {
        $customer_data = customer::where('id', $id)->get();
        return view('/customer/register')->with('customer_account', $customer_data);
    }
    public function customer_register($id, Request $request)
    {

        $request->validate([
            'insurance_type' => 'required',
            'oil_type' => 'required',
            'vehicle_type' => 'required',
            'vehicle_targa' => 'required',
            'chance_no' => 'required',
            'vehicle_model' => 'required|numeric',
            'vehicle_Price' => 'required|numeric',
            'height' => 'required|numeric',
            'load_capacity' => 'required|numeric',
            'vehicle_color' => 'required|alpha',
            'no_tire' => 'required|numeric',
            'width' => 'required|numeric',
            'vehicle_code' => 'required',
        ]);
        try {
            $customer_account = customer::where('id', $id)->get();
            $contracts = new contract();
            $insurance_type = $request->insurance_type;
            $oil_type = $request->oil_type;
            $type = $request->vehicle_type;
            $targa = $request->vehicle_targa;
            $chance = $request->chance_no;
            $model = $request->vehicle_model;
            $price = $request->vehicle_Price;
            $height = $request->height;
            $capacity = $request->load_capacity;
            $force = $request->width;
            $color = $request->vehicle_color;
            $code = $request->vehicle_code;
            $tire = $request->no_tire;

            //  $email= $request->email;
            // $width= $request->width;

            // $check = DB::table('customers')->insert([
            //     'first_name' => $fname,
            //     'last_name' => $lname,
            //     'phone_no' => $p_no,
            //     'address' => $address,
            //     'username' => $uname,
            //     'password' => $pass,
            // ]);
            // $id = DB::table('customers')->select('id')->max('id');
            // $id = DB::table('vehicle_details')->select('vehicle_chance_no')->max('id');
            // return

            // if ($id == $chance) {
            //     $fail = "the motor number already Exist";
            //     return view('admin.customer_register')->with('fail', $fail);

            // }
            $success = "Congratulation You are successfully Registered";
            $fail = "Sorry Not Registered Please Try Again";
            $fails = "Sorry Not Registered Please INSERT Valid And Unique Vehicle Chance Number Again";
            $count = DB::table('vehicle_details')->where('vehicle_chance_no', $chance)->count();
            if ($count != 0) {
                return view('customer.register')->with('fail', $fails)->with('customer_account', $customer_account);
            }
            $checks = DB::table('vehicle_details')->insert([
                'customer_id' => $id,
                'oil_or_benzyl' => $oil_type,
                'vehicle_chance_no' => $chance,
                'vehicle_color' => $color,
                'load_capacity' => $capacity,
                'vehicle_model' => $model,
                'vehicle_price' => $price,
                'vehicle_targa' => $targa,
                'vehicle_type' => $type,
                'vehicle_force' => $force,
                'vehicle_code_no' => $code,
                'height_and_width' => $height,
                'number_of_tire' => $tire,
            ]);
            if ($checks) {
                $contracts->vehicle_id = $chance;
                $contracts->contract_type = $insurance_type;
                $contracts->customer_id = $id;
                $test = $contracts->save();
                if ($test) {
                    return view('customer.register')->with('success', $success)->with('customer_account', $customer_account);
                }
                return false;
            } else {
                return view('customer.register')->with('fail', $fail)->with('customer_account', $customer_account);

            }
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function customer_registers(request $request)
    {

        try {
            $fname = $request->fname;
            $lname = $request->lname;
            $uname = $request->uname;
            $address = $request->address;
            $p_no = $request->phone_no;
            $oil_type = $request->oil_type;
            $insurance_status = $request->insurance_status;
            $type = $request->vehicle_type;
            $targa = $request->vehicle_targa;
            $chance = $request->chance_no;
            $model = $request->vehicle_model;
            $price = $request->vehicle_price;
            $height = $request->height;
            $capacity = $request->load_capacity;
            $force = $request->width;
            $color = $request->vehicle_color;
            $code = $request->vehicle_code;
            $tire = $request->no_tire;

            // $pass= $request->pass;
            //  $email= $request->email;
            // $width= $request->width;

            $check = DB::table('customers')->insert([
                'first_name' => $fname,
                'last_name' => $lname,
                'phone_no' => $p_no,
                'address' => $address,
            ]);

            $id = DB::table('vehicle_details')->select('vehicle_chance_no')->get();

            if ($id == $chance) {
                $fail = "the motor number already Exist";
                return view('customer.register')->with('fail', $fail);

            }
            $id = DB::table('customers')->select('id')->max('id');
            $success = "Congratulation You are successfully Registerd";
            $fail = "Sorry Not Registerd";
            $checks = DB::table('vehicle_details')->insert([
                'customer_id' => $id,
                'oil_or_benzyl' => $oil_type,
                'vehicle_chance_no' => $chance,
                'vehicle_color' => $color,
                'load_capacity' => $capacity,
                'vehicle_model' => $model,
                'vehicle_price' => $price,
                'vehicle_targa' => $targa,
                'vehicle_type' => $type,
                'vehicle_force' => $force,
                'vehicle_code_no' => $code,
                'height_and_width' => $height,
                'number_of_tire' => $tire,
            ]);
            if ($check && $checks) {

                return view('customer.register')->with('success', $success);
            } else {

                return view('customer.register')->with('fail', $fail);

            }
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function new_register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|alpha|min:5',
            'last_name' => 'required|min:5',
            'username' => 'required|min:3',
            'password' => 'min:6',
            'password_confirmation' => 'required|min:6|required_with:password|same:password',
            'phone_no' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|email',
        ]);
        try {

        $customer = new customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->username = $request->username;
        $customer->password = $request->password;
        $customer->phone_no = $request->phone_no;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->created_at = now();
        $check = DB::table('customers')->where('username',$request->username)->where('password',$request->password)->count();
        if ($check != 0) {
            $success = " SORRY !! please use Unique Username and password   !! ";
            return view('main.register')->with('fail', $success);
        }
        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->move(public_path('posts'), $imageName);
            $customer->image = $imageName;
        } else {
            $customer->image = "";
        }
        $check = $customer->save();
        if ($check) {
            $success = " You Are Successfully Registered ";
            return view('main.register')->with('msg', $success);
        } else {
            $success = " SORRY !!  You Are FAILED To Register Please Try Again !! ";
            return view('main.register')->with('fail', $success);
        }
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    //code...

}
