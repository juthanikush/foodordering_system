<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MenuItemController extends Controller
{
    public function index(Request $request)
    {
        $result['data']=DB::table('menu_title')->where('rid',$request->session()->get('ADMIN_ID'))->get();
        return view('admin/menu_item',$result);
    }
    public function add_menu(Request $request)
    {
        return view('admin.add_title');
    }
    public function add_title(Request $request)
    {
        $total=count($request->post('title'));
        $rid=$request->session()->get('ADMIN_ID');
        for($i=0;$i<$total;$i++)
        {
            $arr=[
                'rid'=>$rid,
                'title'=>$request->post('title')[$i],
                'status'=>1
            ];
            DB::table('menu_title')->insert($arr);
        }   
        return redirect('vendore/menu_title');
    }
    public function deactive(Request $request,$id)
    {
        $arr=[
            "status"=>0
        ];
        DB::table('menu_title')->where('id',$id)->update($arr);
        $request->session()->flash('message','Menu Title Deactive');
        return redirect('vendore/menu_title');
    }
    public function active(Request $request,$id)
    {
        $arr=[
            "status"=>1
        ];
        DB::table('menu_title')->where('id',$id)->update($arr);
        $request->session()->flash('message','Menu Title Active');
        return redirect('vendore/menu_title');
    }
    public function delete(Request $request,$id)
    {
        DB::table('menu_title')->where('id',$id)->delete();
        $request->session()->flash('message','Menu Title Delete');
        return redirect('vendore/menu_title');
    }
    
    public function edit(Request $request,$id)
    {
        $result['data']=DB::table('menu_title')->where('id',$id)->get();
        
        return view('admin.editmenu',$result);
    }
    public function update_title(Request $request)
    {
        $id=$request->post('id');
        $arr=[
            'title'=>$request->post('title')
        ];
        $res['data']=DB::table('menu_title')->where('id',$id)->update($arr);
        return redirect('vendore/menu_title');
    }
}
