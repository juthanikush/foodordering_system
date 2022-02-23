<?php

namespace App\Http\Controllers\admin;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Support\Facades\Hash;
class VendoreRestaurantsController extends Controller
{
    public function index(Request $request)
    {
        $name=$request->session()->get('VANDORE_NAME');
        $result['data']=DB::table('restaurant')->where('id',$request->session()->get('ADMIN_ID'))->get();
        /*echo '<pre>';
        print_r($result);
        die();*/
        return view('admin.vendore_restaurants_details',$result);
    }

    public function update(Request $request)
    {
        /*echo '<pre>';
        print_r($request->post());
        die();*/
        $request->validate([
            
            'image'=>'mimes:jpeg,png,jpg',            
            'name'=>'required',
            'address'=>'required',
            'city'=>'required',
            'delitime'=>'required'
        ]);
        if($request->hasfile('image')){
            $arrImage=DB::table('restaurant')->where(['id'=>$request->post('id')])->get();
            if(Storage::exists('/public/restaurants_image/'.$arrImage[0]->img) ){
                Storage::delete('/public/restaurants_image'.$arrImage[0]->img);
            }
            $rand=rand(111111111,999999999);
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=$rand.'.'.$ext;
            $image->storeAs('/public/restaurants_image',$image_name);
        }
        $vege="off";
        if('on'==$request->post('veg')){
            $veg='on';
        }
        else
        {
            $veg="off";
        }
        if($request->hasfile('image')){
            $arr=[
                'name'=>$request->post('name'),
                'img'=>$image_name,
                'pure_veg'=>$veg,
                'address'=>$request->post('address'),
                'pure_veg'=>$veg,
                'city'=>$request->post('city'),
                'status'=>1,
                'time'=>$request->post('delitime')
            ];}
        else{
            $arr=[
                'name'=>$request->post('name'),
                
                'pure_veg'=>$veg,
                'address'=>$request->post('address'),
                'pure_veg'=>$veg,
                'city'=>$request->post('city'),
                'status'=>1,
                'time'=>$request->post('delitime')
            ];
        }
        
        $arrImage=DB::table('restaurant')->where(['id'=>$request->post('id')])->update($arr);
        return redirect('vendore/restaurants');
    }
    public function change_password(Request $request,$id)
    {
        $result=DB::table('restaurant')->where('id',$id)->get();
        /*echo '<pre>';
        print_r($result[0]->email);
        die();*/
        if($result)
        {
            $data=['name'=>$result[0]->name,'id'=>$id];
            $user['to']=$result[0]->email;
            Mail::send('admin/change_password',$data,function($messages) use($user){
                $messages->to($user['to']);
                $messages->subject('Change Password');
            });
        }
        $request->session()->flash('message','Restaurant Active');
        return redirect('vendore/restaurants');
    }
    public function update_password(Request $request,$id)
    {
        $request->session()->put('RESTAURANTS_REGISTER',$id);
        return view('admin.update_password');
    }
    public function update_old_password(Request $request)
    {
       /* echo '<pre>';
        print_r($request->post());
        die();*/
        $request->validate([
            'password'=>'required|min:8',
            'oldpassword'=>'required|min:8'
        ]);
        $result=DB::table('restaurant')->where(['id'=>$request->post('id')])->get();
        if(Hash::check($request->post('oldpassword'),$result[0]->password))
        {
            $arr=['password'=>$request->post('password')];
            $result=DB::table('restaurant')->where(['id'=>$request->post('id')])->update($arr);
            session()->forget('RESTAURANTS_REGISTER');
            return view('admin/thank_you1');
            die();
        }
        $request->session()->flash('message','Please Enter the valide Password ');
        return view('admin.update_password');
        
    }
}
