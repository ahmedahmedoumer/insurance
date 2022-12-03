<?php

namespace App\Http\Controllers;

use App\Models\contract;
use App\Models\customer;
use App\Models\notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customers extends Controller
{
    public function approve_contract()
    {
        try {
            $success = "successfully approved";
            $fetch_data = DB::table('customers')
                ->join('vehicle_details', 'customers.id', '=', 'vehicle_details.customer_id')
                ->join('contracts', 'customers.id', '=', 'contracts.customer_id')
                ->select('customers.*', 'vehicle_details.*', 'contracts.*')
                ->where('vehicle_details.contract_status', "true")
                ->where('contracts.admin_approve', null)
                ->get();

            return view('/admin/approve_contract')->with('contract_data', $fetch_data)->with("success", $success);
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function view_profile($id, Request $request)
    {
        try {
            $customer = new customer();
            $account = $customer::where('id', $id)->get();
            return view('/customer/approve_view_info')->with('customer_info', $account)->with('customer_account', $account);
        } catch (\Throwable $e) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function view_my_contract($id, Request $request)
    {
        try {

            $customer = new customer();
            $account = $customer::where('id', $id)->get();
            $success = "successfully approved";
            $contract_data = DB::table('customers')
                ->join('vehicle_details', 'customers.id', '=', 'vehicle_details.customer_id')
                ->join('contracts', 'vehicle_details.vehicle_chance_no', '=', 'contracts.vehicle_id')
                ->select('customers.*', 'vehicle_details.*', 'contracts.*')
                ->where('customers.id', $id)
                ->where('contracts.staff_approve', "true")
                ->get();

            return view('/customer/view_contract')->with('contract_data', $contract_data)->with('customer_account', $account);
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function accident_report($id, Request $request)
    {
        try {

            $customer = customer::where('id', $id)->get();
            return view('customer.accident_report')->with('customer_account', $customer);
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function send_approve($id1, $id2, Request $request)
    {
        try {

            $id = $id2;
            $chance = $id1;
            $request->validate([
                'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'customer_approve' => 'required',
            ]);
            $image = $request->image_file;
            $check = $request->customer_approve;

            if ($request->hasFile('image_file')) {
                $imageName = time() . '_' . $request->file('image_file')->getClientOriginalName();
                $path = $request->file('image_file')->move(public_path('payments'), $imageName);
                $receipt_image = "payments/" . $imageName;
                $contract = new contract();
                $data = $contract->where('vehicle_id', $chance)->first();
                $data->customer_approve = "true";
                $data->status = null;
                $data->receipt_image = $receipt_image;
                $check = $data->save();
                if ($check) {
                    $customer_account = customer::where('id', $id)->get();
                    return view('customer.view_contract')->with('msg', "Thank You !! Please Wait Until The Admin Approved and send  Bollo For you")->with('customer_account', $customer_account);
                }
            }
            //code...
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function add_new_account(Request $request)
    {
        return "hello";
    }
    public function home_page($id, Request $request)
    {
        try {
            $customer_account = customer::where('id', $id)->get();
            return view('/main/cover_page')->with('customer_account', $customer_account);
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact an Admin";
        }
    }
    public function logout(Request $request)
    {
        try {
            session_abort();
            return redirect('/sign-up');
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact an Admin";
        }
    }
    public function show_notification($id, Request $request)
    {
        try {
            $customer_account=customer::where('id',$id)->get();
        $notification = notification::where('user_id', $id)->latest()->get();
        return view('/customer/show_notification')->with('notification', $notification)->with('customer_account',$customer_account);
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact an Admin";
        }
    }
}
