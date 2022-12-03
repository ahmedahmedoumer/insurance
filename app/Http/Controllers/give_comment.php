<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\customer;
use Illuminate\Http\Request;

class give_comment extends Controller
{
    public function comment($id,request $request){
        
        $request->validate([
          'comment'=>'required|min:5'
        ]);
    
         try{
        $comment=new comment();
         $customer_data=customer::where('id',$id)->get();
        $comment->comments= $request->comment;
        $comment->customer_id= $id;
        
        $check=$comment->save();
        $success="you are successfully send comment!! Thank You for giving your complain !! ";
        $fail="SORRY !!     Failed to send please Try Again";
        if ($check) {
        return View('customer.send_complains')->with('success',$success)->with('customer_data',$customer_data);
        } else{
            return View('customer.send_complains')->with('fail',$fail)->with('customer_data',$customer_data);
         }
     }     catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
       }
}
public function give_comment($id,Request $request){
    try{
     $customer_data=customer::where('id',$id)->get();
     return view('customer/send_complains')->with('customer_account',$customer_data);
    }catch(\Throwable $th){
       return "Something Wrong please check Your Inputs or Contact Admin";
    }
}
}
