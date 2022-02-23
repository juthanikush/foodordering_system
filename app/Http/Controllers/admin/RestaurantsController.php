<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class RestaurantsController extends Controller
{
    public function index(Request $request)
    {
        $result['data']=DB::table('restaurant')->get();
        return view('admin.Restaurants',$result);
    }
    public function add(Request $request)
    {
        return view('admin.add_restaurants');
    }
    public function add_restaurants(Request $request)
    {
        
        /*$request->validate([
            'email'=>'required|unique:restaurant,email'
        ]);*/
        $email=$request->post('email');
        $arr=[
            "email"=>$email,
            "created_at"=>date('Y-m-d h:i:s')
        ];
        $query=DB::table('restaurant')->insertGetId($arr);
        /*echo '<pre>';
        print_r($query);
        die();*/
        if($query)
        {
            $data=['name'=>$request->name,'id'=>$query];
            $user['to']=$email;
            Mail::send('admin/restaurants_registrashion',$data,function($messages) use($user){
                $messages->to($user['to']);
                $messages->subject('Email id Varification');
            });
        }
        return redirect('admin/restaurants');
    }
    public function add_details(Request $request,$id)
    {
        $request->session()->put('RESTAURANTS_REGISTER',$id);
        return view('admin.register');
    }
    public function resta_details(Request $request)
    {
        /*echo '<pre>';
        print_r($request->post());
        die();*/
        $request->validate([
            'image'=>'required|mimes:jpeg,png,jpg',
            'name'=>'required',
            'password'=>'required|min:8',
            'address'=>'required',
            'city'=>'required',
            'delitime'=>'required'

        ]);
        $id=$request->post('id');
        $vege="off";
        if('on'==$request->post('veg')){
            $veg='on';
        }
        else
        {
            $veg="off";
        }
        $pwd=Hash::make($request->password);
        if($request->hasfile('image'))
        {
            $rand=rand(111111111,999999999);
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=$rand.'.'.$ext;
            $image->storeAs('/public/restaurants_image',$image_name);
            //$model->image=$image_name;
        }
        
        $arr=[
            'name'=>$request->post('name'),
            'img'=>$image_name,
            'password'=>$pwd,
            'address'=>$request->post('address'),
            'pure_veg'=>$veg,
            'city'=>$request->post('city'),
            'status'=>1,
            'time'=>$request->post('delitime')
        ];
        $result=DB::table('restaurant')->where('id',$id)->update($arr);
        if($result)
        {
            session()->forget('RESTAURANTS_REGISTER');
            return view('admin/thank_you');
        }
        else{
            echo('Something is wronge');
        }
    }
    public function delete(Request $request,$id)
    {
        DB::table('restaurant')->where('id',$id)->delete();
        $request->session()->flash('message','Restaurant Delete');
        return redirect('admin/restaurants');
    }
    public function deactive(Request $request,$id)
    {
        $arr=[
            "status"=>0
        ];
        DB::table('restaurant')->where('id',$id)->update($arr);
        $request->session()->flash('message','Restaurant Deactive');
        return redirect('admin/restaurants');
    }
    public function active(Request $request,$id)
    {
        $arr=[
            "status"=>1
        ];
        DB::table('restaurant')->where('id',$id)->update($arr);
        $request->session()->flash('message','Restaurant Active');
        return redirect('admin/restaurants');
    }
    
}
