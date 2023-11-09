<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function show($product_id)
{
    // Use $product_id to retrieve the product from the database
    $product = Product::find($product_id);

    // Pass the product data to the view and return it
    return view('products.show', compact('product','product_id'));
}

public function showProducts()
    {
        $products = Product::all();
        $productCount = $products->count();
        return view('admin.products.index', compact('products','productCount'));
    }

}
