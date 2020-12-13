<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProjeController extends Controller
{
    public function index() {
        $categories = Category::all();
        $products = Product::all();
        $banners = Banner::all();
        $blogs = Blog::all();
        //dd($banners);
        return view('product.index', compact('categories', 'products', 'banners', 'blogs'));
    }
}
