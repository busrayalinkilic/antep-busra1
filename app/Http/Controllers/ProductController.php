<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
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
       //$products = Product::all();
        $products = Product::with(['user'])->get();
        //dd($products);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *ürün ekleme formu
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     * ürünlerin veritabanına kaydını yapacağımız yer
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pName = $request->get('pName');
        $price = $request->get('price');
        $created_by = User::find(1);

        Product::create([
            'pName' => $pName,
            'price' => $price,
            'created_by' => $created_by->id
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
}
