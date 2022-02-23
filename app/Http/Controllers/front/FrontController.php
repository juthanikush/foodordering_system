<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $result['data']=DB::table('restaurant')->where('status',1)->get();
        return view('front.index',$result);
    }
    public function details(Request $request,$id)
    {
        if(!$request->session()->has('USER_ID'))
        {
            $request->session()->flash('message','Login Is Requried');
            return redirect('login');
        }
        $uid=$request->session()->get('USER_ID');
        
        $result['data']=DB::table('restaurant')->where('id',$id)->get();
        $result['data1']=DB::table('menu_title')->leftjoin('menu','menu.mid','=','menu_title.id')->where('menu_title.status',1)->where('menu.status',1)->where('rid',$id)->select('menu.short_desc','menu.price','menu.image','menu.name','menu_title.title','menu.id as mid')->get();
        $result['data2']=DB::Table('menu_title')->where('rid',$id)->where('status',1)->get();
        $rid=$result['data'][0]->id;
        $result['data3']=DB::table('favourite')->where('uid',$uid)->where('rid',$rid)->get();
        $result['data4']=DB::table('add_to_cart')->where('uid',$uid)->get();
        $result['data5']=DB::table('add_to_cart')->leftjoin('menu','menu.id','=','add_to_cart.mid')->where('uid',$uid)->get();
        
        // echo '<pre>';
        // print_r($result['data5']);
        // die();
        
        return view('front.Restaurantes',$result);
    }
    public function add_to_cart(Request $request)
    {
        $uid=$request->session()->get('USER_ID');
        $mid=$request->post('mid');
        $arr=[
            "uid"=>$uid,
            "mid"=>$request->post('mid'),
            "qty"=>$request->post('qty')
        ];
        DB::table('add_to_cart')->insert($arr);
        return response()->json(['status'=>'success','id'=>$mid]);
    }
    public function login(Request $request)
    {
        return view('front.login');
    }
    public function user_login(Request $request)
    {
        $number=$request->post('number');
        $result=DB::table('users')->where('phone_number',$number)->get();
        /* echo '<pre>';
         print_r($result);
         die();*/
        if(isset($result[0]->id))
        {
            $request->session()->put('USER_ID',$result[0]->id);
            $request->session()->put('USER_NAME',$result[0]->name);
            return redirect('/');
        }
        else
        {
            $request->session()->flash('message','Pleace Enter Correct Details');
            return redirect('login');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
    public function help(Request $request)
    {
        return view('front/help');
    }
    public function search(Request $request)
    {
        return view('front/search');
    }
    public function offer(Request $request)
    {
        $result['data']=DB::table('restaurant')->where('status',1)->get();
        return view('front.offer',$result);
    }
    public function name(Request $request)
    {
        $search=$request->post('search');
        $result['data']=DB::table('restaurant')->where('status',1)->where('name','LIKE',"%{$search}%")->get();
         //echo '<pre>';
         //print_r($result);
        //  die();
        return view('front/search',$result);
    }
    public function registrashion(Request $request)
    {
        return view('front/registrashion');
    }
    public function register(Request $request)
    {
        if($request->post("pwd")!=$request->post("cpwd"))
        {
            $request->session()->flash('message','Pleace Enter Same Password');
            return redirect('registrashion');
        }
        $arr=[
            "name"=>$request->post('name'),
            "password"=>$request->post('pwd'),
            "phone_number"=>$request->post('number'),
            "status"=>1
        ];
        DB::table('users')->insert($arr);

        return redirect('/');
    }
    public function favourite(Request $request)
    {
        $uid=$request->session()->get('USER_ID');
        
        $arr=[
            "uid"=>$uid,
            "rid"=>$request->post('id')
        ];
        DB::table('favourite')->insert($arr);
        return response()->json(['status'=>'success']);
    }
    public function removefavourite(Request $request)
    {
        $uid=$request->session()->get('USER_ID');
        
        $rid=$request->post('reid');
        DB::table('favourite')->where('uid',$uid)->where('rid',$rid)->delete();
        return response()->json(['status'=>'success']);
    }
    public function removeadd_to_cart(Request $request)
    {
        $id=$request->post('addid');
        DB::table('add_to_cart')->where('mid',$id)->delete();
        return response()->json(['status'=>'success','id'=>$id]);
    }
    public function cart(Request $request)
    {
        if(!$request->session()->has('USER_ID'))
        {
            $request->session()->flash('message','Login Is Requried');
            return redirect('login');
        }
        $id=$request->session()->get('USER_ID');
        $result['data']=DB::table('add_to_cart')->leftjoin('menu','menu.id','=','add_to_cart.mid')->select('menu.*','add_to_cart.id as atcid','add_to_cart.qty')->where('uid',$id)->get();
        // $result['data1']=DB::table('add_to_cart')->where('id',11)->get();
        // $qty=$result['data'][0]->qty;
        // echo '<pre>';
        // //print_r($qty[0]->qty);
        // print_r($result['data1']);
        // die();
        return view('front/cart',$result);
    }
    public function add_qty(Request $request)
    {
        $id=$request->post('add');
        $result['data']=DB::table('add_to_cart')->where('id',$id)->get();
        $qty=$result['data'][0]->qty;
        $mid=$result['data'][0]->mid;
        $result['data1']=DB::table('menu')->where('id',$mid)->get();
        $price=$result['data1'][0]->price;
        $qty+=1;
        $arr=[
            "qty"=>$qty
        ];
        DB::table('add_to_cart')->where('id',$id)->update($arr);
        $result['data2']=DB::table('add_to_cart')->where('id',$id)->get();
        $qty=$result['data2'][0]->qty;
        $total=$qty*$price;


        if(!$request->session()->has('USER_ID'))
        {
            $request->session()->flash('message','Login Is Requried');
            return redirect('login');
        }
        $uid=$request->session()->get('USER_ID');
        $data3=DB::table('add_to_cart')->leftjoin('menu','menu.id','=','add_to_cart.mid')->select('menu.price','add_to_cart.qty')->where('uid',$uid)->get();
        $grandtotal=0;
        foreach($data3 as $list)
        {
            $grandtotal+=$list->price*$list->qty;
        }
        
        return response()->json(['status'=>"success",'id'=>$id,'qty'=>$qty,'total'=>$total,'grandtotal'=>$grandtotal]);
    }
    public function remove_qty(Request $request)
    {
        $id=$request->post('remove');
        $result['data']=DB::table('add_to_cart')->where('id',$id)->get();
        $qty=$result['data'][0]->qty;
        $mid=$result['data'][0]->mid;
        $result['data1']=DB::table('menu')->where('id',$mid)->get();
        $price=$result['data1'][0]->price;
        $qty-=1;
        $arr=[
            "qty"=>$qty
        ];
        DB::table('add_to_cart')->where('id',$id)->update($arr);
        $result['data2']=DB::table('add_to_cart')->where('id',$id)->get();
        $qty=$result['data2'][0]->qty;
        $total=$qty*$price;


        if(!$request->session()->has('USER_ID'))
        {
            $request->session()->flash('message','Login Is Requried');
            return redirect('login');
        }
        $uid=$request->session()->get('USER_ID');
        $data3=DB::table('add_to_cart')->leftjoin('menu','menu.id','=','add_to_cart.mid')->select('menu.price','add_to_cart.qty')->where('uid',$uid)->get();
        $grandtotal=0;
        foreach($data3 as $list)
        {
            $grandtotal+=$list->price*$list->qty;
        }
        return response()->json(['status'=>"success",'id'=>$id,'qty'=>$qty,'total'=>$total,'grandtotal'=>$grandtotal]);
    }
    public function checkout(Request $request)
    {
        if(!$request->session()->has('USER_ID'))
        {
            $request->session()->flash('message','Login Is Requried');
            return redirect('login');
        }
        $id=$request->session()->get('USER_ID');
        $result['data']=DB::table('add_to_cart')->leftjoin('menu','menu.id','=','add_to_cart.mid')->select('menu.*','add_to_cart.id as atcid','add_to_cart.qty')->where('uid',$id)->get();
        return view('front/checkout',$result);
    }
    public function ordered(Request $request)
    {
        if(!$request->session()->has('USER_ID'))
        {
            $request->session()->flash('message','Login Is Requried');
            return redirect('login');
        }
        $uid=$request->session()->get('USER_ID');
        $rona=$request->post('rona');
        $rn=$request->post('rn');
        $bill_no=rand(999999999,111111111);
        $type=$request->post('payment');
        $data=DB::table('add_to_cart')->leftjoin('menu','menu.id','=','add_to_cart.mid')->select('menu.id','add_to_cart.qty')->where('uid',$uid)->get();
        foreach($data as $list)
        {
            $arr=[
                'uid'=>$uid,
                'bill_no'=>$bill_no,
                'road_name'=>$rona,
                'rasident_Name'=>$rn,
                'payment_type'=>$type,
                'qty'=>$list->qty,
                'mid'=>$list->id
            ];
            DB::table('bill')->insert($arr);
        }
        DB::table('add_to_cart')->where('uid',$uid)->delete();
        return view('front/thank_you');

    }
    
}
