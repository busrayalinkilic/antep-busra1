<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *ürünlerin listsini göreceğimiz fonksiyon
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //order by => sıralama yaptırır
        //desc= sondan başa
        //asc baştan sona
        //orderBy('id','desc')   orderByDesc('id')   latest('id')
       //$products = Product::all();
    // $products = Product::with(['user'])->latest('id')->take(3)->get();
        //dd($products);
        // return view('product.index', compact('products'));
        $products = Product::with(['user'])->get();
        //ÖDEV select
     //  $products = Product::with(['user'])->paginate(2);
       return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *ürün ekleme formu
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $categories=Category::all();
        return view('product.create',compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     * ürünlerin veritabanına kaydını yapacağımız yer
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->get('pName');
        $category_id=$request->get('category_id');
        $price=$request->get('price');
        $created_by=User::find(1);

        Product::create([
            'pName'=>$name,
            'category_id'=>$category_id,
            'price'=>$price,
            'created_by'=>$created_by

        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function export(){
        return Excel::download(new ProductExport, 'products.xlsx');

    }

   /* public function import()
    {
        Excel::import(new ProductImport, request()->file('file'));
        return back();
    }*/
    public function bannerShow() {
        Product::with(['photo'])->get();
        //yeni bir veritabanı tablosu oluştur

    }
}
