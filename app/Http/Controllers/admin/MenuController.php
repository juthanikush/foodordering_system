<?php

namespace App\Http\Controllers\admin;
use Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MenuController extends Controller
{
    public function index(Request $request)
    {
        $id=$request->session()->get('ADMIN_ID');
        $result['data']=DB::select(DB::raw('select me.*,mt.* from menu me,menu_title mt where mt.rid='.$id.' and mt.id=me.mid'));

        return view('admin/menu',$result);
    }
    public function add_blade(Request $request)
    {
        $result['data']=DB::table('menu_title')->where('status',1)->where('rid',$request->session()->get('ADMIN_ID'))->get();
        
        return view('admin.add_title_details',$result);
    }
    
    public function update_menu_details(Request $request)
    {
        
       $id=$request->post('id');

        
        

        if($request->hasfile('image')){

            if($request->post('id')>0)
                {
                    $arrImage=DB::table('menu')->where(['id'=>$request->post('id')])->get();
                    if(Storage::exists('/public/menu_item_image/'.$arrImage[0]->image) ){
                        Storage::delete('/public/menu_item_image/'.$arrImage[0]->image);
                    }
                }
            $rand=rand(11111,99999);
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=$rand.'.'.$ext;
            $image->storeAs('/public/menu_item_image',$image_name);
            $arr=[
                "name"=>$request->post('name'),
                "price"=>$request->post('price'),
                "short_desc"=>$request->post('short_desc'),
                "mid"=>$request->post('title'),
                "image"=>$image_name
            ];
        }
        else{
            $arr=[
                "name"=>$request->post('name'),
                "price"=>$request->post('price'),
                "short_desc"=>$request->post('short_desc'),
                "mid"=>$request->post('title')
            ];
        }
        DB::table('menu')->where('id',$id)->update($arr);


        
        return redirect('vendore/menu_Items');
    }
    public function add_menu_details(Request $request)
    {
        
       
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'short_desc'=>'required',
            'title'=>'required',
            'image'=>'required'
        ]);
        
        /*echo $request->file('image')[0];
        echo '<pre>';
        print_r($request->file('image')[0]);
        die();*/
        $name=$request->post('name');
        $price=$request->post('price');
        $short_desc=$request->post('short_desc');
        $title=$request->post('title');
        foreach($name as $key=>$val){
            $arr=[];
            if($request->hasFile("image.$key")){
                $rand=rand('111111111','999999999');
                $images=$request->file("image.$key");
                $ext=$images->extension();
                $image_name=$rand.'.'.$ext;
                $request->file("image.$key")->storeAs('/public/menu_item_image',$image_name);
                $arr['image']=$image_name;
            }
            $arr['name']=$name[$key];
            $arr['price']=$price[$key];
            $arr['short_desc']=$short_desc[$key];
            $arr['mid']=$title[$key];
            $arr['status']=1;
            DB::table('menu')->insert($arr);
        }
        return redirect('vendore/menu_Items');
    }

    public function deactive(Request $request,$id)
    {
        $arr=[
            "status"=>0
        ];
        DB::table('menu')->where('id',$id)->update($arr);
        $request->session()->flash('message','Menu Deactive');
        return redirect('vendore/menu_Items');
    }
    public function active(Request $request,$id)
    {
        $arr=[
            "status"=>1
        ];
        DB::table('menu')->where('id',$id)->update($arr);
        $request->session()->flash('message','Menu Active');
        return redirect('vendore/menu_Items');
    }
    public function delete(Request $request,$id)
    {
        DB::table('menu')->where('id',$id)->delete();
        $request->session()->flash('message','Menu Delete');
        return redirect('vendore/menu_Items');
    }

    public function edit(Request $request,$id)
    {
        $result['data']=DB::table('menu')->where('id',$id)->get();
        $result['data1']=DB::table('menu_title')->where('status',1)->where('rid',$request->session()->get('ADMIN_ID'))->get();
        return view('admin.editmenudetails',$result);
    }
    
    /*public function add_title(Request $request)
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
    }*/
}
