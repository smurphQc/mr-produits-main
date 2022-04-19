<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', [
            'product' => $product,
            'product_options' => $product->product_options()->get()
        ]);
    }

    public function create()
    {
        return view('admin.products.create', [
            'product' => new Product,
            'categories' => Category::all(),
            'selected_categories' => Array(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());
        
        $product->categories()->sync($request->categories);

        return redirect()->route('admin.products.index')->with('success', 'Le produit a été créé!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $selected_categories = $product->categories->pluck('id')->toArray();

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $categories,
            'selected_categories' => $selected_categories,
        ]);
    }

    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->validated());
        $product->categories()->sync($request->categories);

        return redirect()->route('admin.products.index')->with('success', 'Le produit a été modifié!');
    }

    public function destroy(Request $request, $id)
    {
        Product::destroy($id);

        return redirect()->route('admin.products.index')->with('success', 'Le produit a été supprimé.');;
    }
}
