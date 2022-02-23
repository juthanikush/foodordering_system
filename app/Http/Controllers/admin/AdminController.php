<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_ID') )
        {
            return view('admin.index');
        }
        else{
            return view('admin.login');
        }
    }
    public function auth(Request $request)
    {
        $username=$request->post('username');
        $password=$request->post('password');
        /*$email='juthanikush@gmail.com';
        $pwd=Hash::make($request->password);
        DB::table('admin')->insert(array('username'=>$username,'password'=>$pwd,'email'=>$email));*/
        $result=DB::table('admin')->where(['username'=>$username])->get();
        if(isset($result[0]))
        {
            
            if(Hash::check($password,$result[0]->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result[0]->id);
                return redirect('admin');
            }
            else{
                $request->session()->flash('error','Please enter valid Password ');
                return view('admin.login');
            }
        }
        else{
            $result=DB::table('restaurant')->where(['name'=>$username])->get();
            if(isset($result[0]))
            {
            
                if(Hash::check($password,$result[0]->password)){
                    $request->session()->put('VANDORE_LOGIN',true);
                    $request->session()->put('VANDORE_NAME',$result[0]->name);
                    $request->session()->put('ADMIN_ID',$result[0]->id);
                    
                    return redirect('admin');
                }
                else{
                    $request->session()->flash('error','Please enter valid  Password ');
                    return view('admin.login');
                }
            }
            else{
                $request->session()->flash('error','Please enter valid login details');
                return view('admin.login');
                
            }
        }
    }
    
}
