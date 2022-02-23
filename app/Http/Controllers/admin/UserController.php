<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $result['data']=DB::table('users')->get();
        return view('admin.user',$result);
    }
    public function active(Request $request,$id){
        $arr=[
            'status'=>1
        ];
        DB::table('users')->where('id',$id)->update($arr);
        $request->session()->flash('message','Users Deactive');
        return redirect('admin/user');
    }
    public function deactive(Request $request,$id){
        $arr=[
            'status'=>0
        ];
        DB::table('users')->where('id',$id)->update($arr);
        $request->session()->flash('message','Users Active');
        return redirect('admin/user');
    }
    public function delete(Request $request,$id){
        $arr=[
            'status'=>0
        ];
        DB::table('users')->where('id',$id)->delete();
        $request->session()->flash('message','Users Delete');
        return redirect('admin/user');
    }
}
