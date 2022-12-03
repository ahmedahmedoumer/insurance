<?php

namespace App\Http\Controllers;

use App\Models\accident_report;
use App\Models\report;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class generate_report extends Controller
{
    public function view_report(Request $request)
    {
                  try{
        $report = new report();
        $data = $report::latest()->get();
        return view('admin.view_report')->with('data', $data);
        } catch (\Throwable $th) {
         return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function accident_report($id,Request $request)
    {
        $data=customer::where('id',$id)->get();
        $request->validate([
            'chance_no'=>'required|min:4',
            'targa'=>'required|numeric',
            'accident_detail'=>'required|min:5',
            'description'=>'required|min:5',
        ]);
        try{
            
        $data = new accident_report();
        $accident_detail = $request->accident_detail;
        // $fname=$request->vehicle_detail;
        $chance_no = $request->chance_no;
        // $targa=$request->targa;
        $image = $request->file('image');
        $location = $request->description;
        $id = DB::table('vehicle_details')->select('customer_id')->where('vehicle_chance_no', $chance_no)->get()->count();
        // return $id;
        $imageName="";
        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = $image->move(public_path('reports'), $imageName);
        }
        if ($id != 0) {
            $data->vehicle_detail = $chance_no;
            $data->image = $imageName;
            $data->accident_place = $location;
            $data->accident_type = $accident_detail;
            $data->customer_id = $id;
            $check = $data->save();
        }
        else{
            $fail = " Sorry Your vehicle are not registerd check the chance number or register before  !!";
            return view('customer.accident_report')->with('fail', $fail);

        }
            
        $success = " you are successfully report";
        $fail = " Sorry Your report request are failed Please Try Again !!";
        if ($check) {
            return view('customer.accident_report')->with('success', $success);
        } else {
            return view('customer.accident_report')->with('fail', $fail);
        }
    } catch (\Throwable $th) {
        return "Something Wrong please check Your Inputs or Contact Admin";
       }
    }
}
