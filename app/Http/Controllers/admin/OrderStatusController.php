<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class OrderStatusController extends Controller
{
    public function index(Request $request)
    {
        $result['data']=DB::table('order_status')->get();
        return view('admin.order_status',$result);
    }
    public function edit(Request $request,$id)
    {
       
        $result['data']=DB::table('order_status')->where('id',$id)->get();
        
        return view('admin.edit_status',$result);
    }
    public function add(Request $request)
    {
        return view('admin.add_status');
    }
    public function add_status(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);
        $arr=['status_title'=>$request->title,'status'=>1];
        DB::table('order_status')->insert($arr);
        $request->session()->flash('message','Status Added');
        return redirect('admin/order_status');
    }
    public function deactive(Request $request,$id)
    {
        $arr=[
            "status"=>0
        ];
        DB::table('order_status')->where('id',$id)->update($arr);
        $request->session()->flash('message','Status Deactive');
        return redirect('admin/order_status');
    }
    public function active(Request $request,$id)
    {
        $arr=[
            "status"=>1
        ];
        DB::table('order_status')->where('id',$id)->update($arr);
        $request->session()->flash('message','Status Active');
        return redirect('admin/order_status');
    }
    public function delete(Request $request,$id)
    {
        DB::table('order_status')->where('id',$id)->delete();
        $request->session()->flash('message','Status Delete');
        return redirect('admin/order_status');
    }
    
    public function edit_status(Request $request)
    {
        $id=$request->post('id');
        $request->validate([
            'title'=>'required'
        ]);
        $arr=['status_title'=>$request->title];
        DB::table('order_status')->where('id',$id)->update($arr);
        $request->session()->flash('message','Status Added');
        return redirect('admin/order_status');
    }
}
