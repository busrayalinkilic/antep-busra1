<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function hakkimda()
    {
        $users = DB::table('users')-> get();

        return view('hakkimda',compact('users'));
    }
    public function urunler()
    {
        $products = DB::table('products')-> get();

        return view('urunler',compact('products'));
    }
    public function user_products(){
        $user_products = DB::table('user_products')-> get();

        return view('satisdokuman',compact('user_products'));

    }
    public function satis(){
        $users =   DB::table('user_products')
                ->join('users','user_products.user_id',"=",'users.id')
                ->join('products','user_products.product_id','=','products.id')
                ->select('user_products.*','users.name','products.pName','products.price')
                ->get();

        return view('satisdokuman',compact('users'));

    }
}
