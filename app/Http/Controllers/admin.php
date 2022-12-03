<?php

namespace App\Http\Controllers;

use App\Models\accident_report;
use App\Models\comment;
use App\Models\contract;
use App\Models\customer;
use App\Models\notification;
use App\Models\report;
use App\Models\staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class admin extends Controller
{
    public function show_contract(Request $request)
    {
        try {
            $success = "successfully approved";
            $fetch_data = DB::table('customers')
                ->join('vehicle_details', 'customers.id', '=', 'vehicle_details.customer_id')
                ->join('contracts', 'vehicle_details.vehicle_chance_no', '=', 'contracts.vehicle_id')
                ->select('customers.*', 'vehicle_details.*', 'contracts.*')
                ->where('vehicle_details.contract_status', "true")
                ->where('contracts.admin_approve', null)
                ->get();
            return view('/admin/approve_contract')->with('customer_data', $fetch_data)->with('success', $success);
            // return view('/admin/approve_contract')->with('customer_data ', $fetch_data )->with('success', $success);
        } catch (\Throwable $e) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function status()
    {
        try {

            $fetch_data = DB::table('customers')
                ->join('vehicle_details', 'customers.id', '=', 'vehicle_details.customer_id')
                ->join('contracts', 'vehicle_details.vehicle_chance_no', '=', 'contracts.vehicle_id')
                ->select('customers.id', 'customers.first_name', 'customers.last_name', 'customers.phone_no', 'customers.address', 'customers.email', 'customers.admin_approval', 'vehicle_details.*', 'contracts.updated_at', 'contracts.contract_type', 'contracts.price')
                ->where('contracts.status', "accepted")
                ->get();
            foreach ($fetch_data as $item) {
                $now = strtotime(now());
                $a = strtotime($item->updated_at);
                $year = date('Y', $a);
                $year_now = date('Y', $now);
                $month = date('m', $a);
                $month_now = date('m', $now);
                $date = date('d', $a);
                $date_now = date('d', $now);
                $diff = ($year_now - $year) . ":" . (12 - ($month_now - $month)) . ":" . (30 + ($date_now - $date));
                $item->deadline = $diff;
            }
            return view('/admin/show_status')->with('status', $fetch_data);
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact an Admin";
        }
    }
    public function block_user($id, Request $request)
    {
        try {

            $affected = DB::table('customers')
                ->where('id', $id)
                ->update(['admin_approval' => null]);
            if ($affected) {
                return redirect('/admin/status');
            }
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact an Admin";
        }
    }
    public function notify_user($id, Request $request)
    {

        $request->validate([
            'comment' => 'required',

        ]);

        try {
            $comment = $request->comment;
            $affected = new notification();
            $affected->created_at = now();
            $affected->user_id = $id;
            $affected->notification = $comment;
            $check = $affected->save();
            if ($check) {
                return redirect('/admin/status');
            }
        } catch (\Throwable $th) {
            return "Please check Your Input Or contact an admin";
        }
    }
    public function admin_approve($id, Request $request)
    {
        try {
            $checkbox = $request->admin_approve;
            $boolean = "true";
            if ($checkbox == "on") {
                $check = contract::where('vehicle_id', $id)
                    ->update(['admin_approve' => $boolean]);
            }
            return redirect('/admin/approve_contract');
        } catch (\Throwable $e) {
            return "Something Wrong please check Your Inputs or Contact an Admin";
        }
    }
    public function sign_out(Request $request)
    {
        try {
            $request->session()->invalidate();
            return redirect('sign-up');
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function show_accident(Request $request)
    {
        try {

            $all_data = new report();
            $data = $all_data::latest()->get();
            return view('/admin/view_accident')->with('report', $data);
        } catch (\Throwable $e) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function customer_approve()
    {
        try {
            $customer = customer::where('admin_approval', null)->get();
            return view('/admin/customer_approval')->with('data', $customer);
        } catch (\Throwable $e) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function request_approve($id, Request $request)
    {
        try {
            $checkbox = $request->admin_approve;
            $boolean = "true";
            if ($checkbox == "on") {
                $check = customer::where('id', $id)
                    ->update(['admin_approval' => $boolean]);
            }
            return redirect('/admin/customer_info_approve');
        } catch (\Throwable $e) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function dashboard()
    {
        try {
            $count = customer::all()->count();
            $contracts = contract::all()->count();
            $comments = comment::all();
            $accident = accident_report::all()->count();
            return view('/admin/dashboard')->with('count', $count)->with('contract', $contracts)->with('comment', $comments)->with('accidents', $accident);
        } catch (\Throwable $e) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }

    public function show_paids()
    {
        try {

            $bool = "true";
            $fetch_data = DB::table('customers')
                ->join('vehicle_details', 'customers.id', '=', 'vehicle_details.customer_id')
                ->join('contracts', 'vehicle_details.vehicle_chance_no', '=', 'contracts.vehicle_id')
                ->select('customers.*', 'vehicle_details.*', 'contracts.*')
                ->where('contracts.customer_approve', $bool)
                ->where('contracts.receipt_image', '!=', null)
                ->where('contracts.status', null)
                ->get();
            // return $fetch_data;
            return view('admin/show_paids')->with('data', $fetch_data);
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function reject_paids($id, Request $request)
    {
        try {

            $chance = $id;
            $contract = new contract();
            $data = $contract->where('vehicle_id', $chance)->first();
            $data->status = "rejected";
            $data->customer_approve = null;
            $data->receipt_image = null;
            $check = $data->save();
            if ($check) {
                return redirect('/admin/show_paids');
            }
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function assign_privilege(Request $request)
    {
        $request->validate([
            'search_id' => 'required|numeric',
        ]);
        $id = $request->search_id;
        $check = staff::where('staff_id', $id)->first();
        return view('admin.give_privilege')->with('staff_data', $check);
    }
    public function set_privilege($id, Request $request)
    {

        $request->validate([
            'select' => 'required',
        ]);
        //    try {
        $select = $request->select;
        $check = staff::where('staff_id', $id)->first();
        if ($select == "delete") {
            $check->delete();
        }
        return view('admin.give_privilege')->with('staff_data', $check);

        // } catch (\Throwable $th) {
        //     return "Something Wrong please check Your Inputs or Contact Admin";
        // }
    }
    public function success_paids($id, Request $request)
    {
        try {

            $chance = $id;
            $contract = new contract();
            $data = $contract->where('vehicle_id', $chance)->first();
            $data->status = "accepted";
            $data->updated_at = now();
            $check = $data->save();

            if ($check) {
                return redirect('/admin/show_paids');
            }

        } catch (\Throwable $e) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }

    }
}
