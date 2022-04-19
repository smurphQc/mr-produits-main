<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOption;
use App\Http\Requests\StoreProductOptionRequest;

class ProductOptionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        return view('admin.product_options.create', [
            'product' => Product::find($product_id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductOptionRequest $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product_option = $product->product_options()->create($request->validated());

        return redirect()->route('admin.products.show', ['product' => $product_id])->with('success', "L'option a été créée!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $id)
    {
        $product_option = Product::findOrFail($product_id)
                            ->product_options()
                            ->findOrFail($id);

        $product_option->delete();

        return redirect()->back()->with('success', "L'option a été supprimée.");
    }
}
