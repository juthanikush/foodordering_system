<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavouriteController extends Controller
{
    public function index(Request $request)
    {
        $result['data']=DB::table('favourite')
        ->leftjoin('restaurant','restaurant.id','=','favourite.rid')
        ->leftjoin('users','users.id','=','favourite.uid')
        ->select('restaurant.name as rname','favourite.id','users.name')
        ->get();
        /*echo'<pre>';
        print_r($result);
        die();*/
        return view('admin.favourite',$result);
    }
}
