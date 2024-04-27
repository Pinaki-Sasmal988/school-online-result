<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\School;

use Hash;
use Session;
class AdminController extends Controller
{
    public function addSchool(){
    $data=array();
     if(Session::has('admin')){
     $data=Admin::where('id', '=', Session::get('admin'))->first(); 
     }
  return view('admin.addSchool'); 
        

    }
    public function allSchool(){
        $data=School::all();
        return view('admin.allSchool',['data'=>$data]);

    }
    public function adminlogin(){
        return view('admin.adminLogin');
    }

     public function adminAccess(Request $request){

        $request->validate([
    //    'email'=>'required|email|unique:admins',
       'email'=>'required|email',
       'password'=>'required|min:5|max:10',
        ]);
        $admin=Admin::where('email', '=', $request->email)->first();
        if($admin){
              if(Hash::check($request->password, $admin->password)){
                     $request->session()->put('admin',$admin);
                     return redirect('admin/dashboard');
              }else{
                return back()->with('fail','password Does not match');

              }
        }else{
            return back()->with('fail','This email does not exite ');
        }
         
    }
    public function adminLogout(){
        if(Session::has('admin')){
            Session::pull('admin');
            return redirect('admin/login');
        }
    }
}