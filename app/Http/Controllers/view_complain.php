<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\new_post;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class view_complain extends Controller
{
    public function view_complain()
    {
        try{
        $data = comment::all();
        return view('/admin.view_complain')->with('data', $data);
        
        } catch (\Throwable $th) {
            return "Something Wrong please check Your Inputs or Contact Admin";
        }
    }
    public function new_post(Request $request)
    { 
        $request->validate([
            'post_name'=>'required|alpha',
            'main_text'=>'required|min:5',
            'image'=>'required|image',
        ]);
        
        // return $request->input('image');
          try {
    
        if ($request->hasFile('image')) {
           
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                
            ]);
            $posts = new new_post();
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();  
            $path = $request->file('image')->move(public_path('posts'), $imageName);
            $posts->name = $request->input('post_name');
            $posts->image=$imageName;
            $posts->post=$request->input('main_text');
           $check= $posts->save();
        } else {
            // $request->validate([
            //     'post_name'=>'required',
            //     'main_text'=>'required'
            // ]);
            $posts = new new_post();
            $posts->image ="";
            $posts->name = $request->input('post_name');
            $posts->post=$request->input('main_text');
            $check= $posts->save();   
        }
        $success = " congratulation you are successfully Inserted";
        $fail = " Sorry Your insert request are failed !!";
        if ($check) {
          return view('admin.post_notice')->with('success',$success);
        }
        else{
          return view('admin.post_notice')->with('fail',$fail);

        }
      
   
   
     
    } catch (\Throwable $th) {
        return "Something Wrong please check Your Inputs or Contact Admin";
    }
}
   
    
}
