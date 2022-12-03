<?php

namespace App\Http\Controllers;

use App\Models\contract;
use App\Models\customer;
use App\Models\staff;
use App\Models\vehicle_age;
use App\Models\vehicle_detail;
use App\Models\vehicle_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class staffs extends Controller
{

    // public function get_contract_data(){

    // }
    public function do_contract()
    {
        // try {
        $basic_premium = 500;
        $a = 0;
        $affect = 0;
        $affected = 0;
        $contract = new contract();
        $vehicle_detail = new vehicle_detail();
        $TYPE = new vehicle_type();
        $vehicle_age = new vehicle_age();
        $details = $vehicle_detail::where('contract_status', null)->get();
        foreach ($details as $item) {
            $id = $item->customer_id;
            $contract_id = $item->vehicle_chance_no;
            $price = $item->vehicle_price;
            $type = $item->vehicle_type;
            $model = $item->vehicle_model;
            $year = date('Y');
            $year_difference = $year - $model;
            $year_catagory = intval($year_difference / 3);
            if( $year_catagory==0){
                $year_catagory=1;
            }
            $AGE = $vehicle_age::where('id', $year_catagory)->first();
            if ($AGE) {

                $age_percentile = intval($AGE->value_per_percent);
                $total_age_premium = ((30 * $age_percentile) / 1000000) * $price;
                $vehicle_type = $TYPE::where('id', $type)->first();
                if ($vehicle_type) {
                    $type_percentile = $vehicle_type->per_percent;
                    $type_premium = (($type_percentile) / 100) * $price;
                    $last_premium = $type_premium - $total_age_premium + $basic_premium;
                }
            }

            $affect = DB::table('contracts')
                ->where('customer_id', $id)
                ->update(
                    ['price' => $last_premium]
                );
            $affected = DB::table('vehicle_details')
                ->where('customer_id', $id)
                ->update(
                    ['contract_status' => "true"]
                );
        }
        if ($affected != 0 && $affect != 0) {
        }

        $success = "successfully approved";
        $fetch_data = DB::table('customers')
            ->join('vehicle_details', 'customers.id', '=', 'vehicle_details.customer_id')
            ->join('contracts', 'vehicle_details.vehicle_chance_no', '=', 'contracts.vehicle_id')
            ->select('customers.*', 'vehicle_details.*', 'contracts.*')
            ->where('contracts.staff_approve', null)
            ->get();
        return view('/staff/do_contract')->with('contract_data', $fetch_data)->with('success', $success);

        // } catch (\Throwable $th) {
        //     return "Something Wrong please check Your Inputs or Contact Admin";
        // }
    }
    public function staff_approve($id, Request $request)
    {
        try {
            // return $id;
            $checkbox = $request->staff_approve;
            // return $id;
            // $contract = contract::FindOrFail($id);
            $boolean = "true";
            if ($checkbox == "on") {
                $check = contract::where('vehicle_id', $id)
                    ->update(['staff_approve' => $boolean]);
            }
            return redirect('staff/do_contract');

        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function logout(Request $request)
    {
        try {

            $request->session()->invalidate();
            return redirect('/sign-up');
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function update(Request $request)
    {
        $request->validate(
            [
                'username' => 'required | max:20 | min:5',
                'password' => 'required | max:20 | min:5',
            ]);
        try {
            $username = $request->username;
            $password = $request->password;
            $staff = new staff();
            $check = $staff::where('username', $username)->where('password', $password)->get()->count();

            if ($check) {
                $data = $staff::where('username', $username)->where('password', $password)->get();
                $msg = "You Can Update Now !!";
                return view('staff/update_info')->with('success', $msg)->with('data', $data);
            } else {
                $msg = "Incorrect Username and Password !!";
                return view('staff/update_info')->with('fail', $msg);
            }

        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function change_owner_page(Request $request)
    {
        $request->validate(
            [
                'username' => 'required ',
                'password' => 'required ',
            ]);

        try {
            $username = $request->username;
            $password = $request->password;
            $customer = new customer();
            $check = $customer::where('username', $username)->where('password', $password)->get()->count();

            if ($check) {
                $data = $customer::where('username', $username)->where('password', $password)->get();
                $msg = "You Can Change Now !!";
                return view('staff/change_owner')->with('success', $msg)->with('data', $data);
            } else {

                $msg = "Incorrect Username and Password !!";
                return view('staff/change_owner')->with('fail', $msg);
            }

        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function change_owners(Request $request)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'uname' => 'required',
            'password' => 'required',
            'p_no' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        try {
            $id = $request->id;
            $fname = $request->fname;
            $lname = $request->lname;
            $uname = $request->uname;
            $pass = $request->password;
            $phone = $request->p_no;
            $address = $request->address;
            $email = $request->email;
            return "hello";
            $check = DB::table('customers')->where('id', $id)->update([
                'first_name' => $fname,
                'last_name' => $lname,
                'username' => $uname,
                'password' => $pass,
                'phone_no' => $phone,
                'address' => $address,
                'email' => $email,
            ]);
            if ($check) {
                $msg = "You are Successfully  Updated !!";
                return view('/staff/change_owner')->with('success', $msg);
            } else {
                $msg = "Incorrect Username and Password !!";
                return view('/staff/change_owner')->with('fail', $msg);
            }
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }

    public function update_account(Request $request)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'uname' => 'required',
            'password' => 'required',
            'p_no' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        try {
            $id = $request->id;
            $fname = $request->fname;
            $lname = $request->lname;
            $uname = $request->uname;
            $pass = $request->password;
            $phone = $request->p_no;
            $address = $request->address;
            $email = $request->email;
            $check = DB::table('staff')->where('staff_id', $id)->update([
                'first_name' => $fname,
                'last_name' => $lname,
                'username' => $uname,
                'password' => $pass,
                'phone_no' => $phone,
                'address' => $address,
                'email' => $email,
            ]);
            if ($check) {
                $msg = "You are Successfully  Updated !!";
                return view('/staff/update_info')->with('success', $msg);
            } else {
                $msg = "Incorrect Username and Password !!";
                return view('/staff/update_info')->with('fail', $msg);
            }
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function change_owner(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        try {
            $username = $request->username;
            $password = $request->password;
            $staff = new staff();
            $check = $staff::where('username', $username)->where('password', $password)->get()->count();

            if ($check) {
                $data = $staff::where('username', $username)->where('password', $password)->get();
                $msg = "You Can Update Now !!";
                return view('staff/change_owner')->with('success', $msg)->with('data', $data);
            } else {
                $msg = "Incorrect Username and Password !!";
                return view('staff/change_owner')->with('fail', $msg);
            }

        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }

    }
    public function view_info($id, Request $request)
    {
        try {

            // $staff = new staff();
            // $account = $staff::where('username', $username)->where('password', $password)->get();
            // return view('/main/staff')->with('staff', $account);

            $staff = new staff();
            $account = $staff::where('staff_id', $id)->get();
            return view('staff/view_information')->with('staff', $account);

        } catch (\Throwable $e) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function add_new_customer(Request $request)
    {

        $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'username' => 'required|min:5',
            'password' => 'required|min:5',
            'email' => 'required|email',
            'address' => 'required',
            'confirm_password' => 'required',
            'phone_no' => 'required|numeric',
        ]);

        $username = $request->username;
        $password = $request->password;
        try {
            $count = customer::where('username', $username)->where('password', $password)->get()->count();
            if ($count != 0) {
                $success = "Already Exist !! please use Unique username Or Password !! ";
                return view('/staff/register_customer')->with('fail', $success);
            }

            $customer = new customer();
            $customer->first_name = $request->first_name;
            $customer->last_name = $request->last_name;
            $customer->username = $request->username;
            $customer->password = $request->password;
            $customer->phone_no = $request->phone_no;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->created_at = now();
            $customer->updated_at = now();

            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                ]);
                $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->move(public_path('posts'), $imageName);
                $customer->image = "posts/" . $imageName;
            } else {
                $customer->image = "";
            }
            $check = $customer->save();
            if ($check) {
                $success = " You Are Successfully Registered ";
                return view('/staff/register_customer')->with('msg', $success);
            } else {
                $fail = " SORRY !!  You Are FAILED To Register Please Try Again !! ";
                return view('/staff/register_customer')->with('fail', $fail);
            }

            //code...
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function home_page()
    {
        return view('/staff/home_page');
    }
}
