<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    function hakkimda() {
        //$users =  DB::table('users')->get();
        $users = User::all();
        return view('kullanicilar', compact('users'));
    }

    function urunler() {
        $products =  DB::table('products')->get();
        return view('urunler', compact('products'));
    }

    function satis() {
        $sales =  DB::table('user_products')
            ->join('users', 'user_products.user_id', '=', 'users.id')
            ->join('products', 'user_products.product_id', '=', 'products.id')
            ->select('user_products.*', 'users.name', 'products.pName', 'products.price')
            ->get();

        return view('satislar', compact('satisdokuman'));

        //die();
        //dd($sales);
    }
}
