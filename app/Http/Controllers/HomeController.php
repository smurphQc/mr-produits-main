<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all()->where('is_active', 1);

        return view('home.index', ['products' => $products]);
    }
}
