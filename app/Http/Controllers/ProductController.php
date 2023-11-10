<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Option;
use App\Models\OptionCategories;



class ProductController extends Controller
{
    public function show($product_id)
{
    $product = Product::find($product_id);
    return view('products.show', compact('product','product_id'));
}

public function showProducts()
    {
        $products = Product::all();
        $productCount = $products->count();
        return view('admin.products.product', compact('products','productCount'));
    }

    public function showCategories()
    {
        $categories = Category::all();
        $categoryCount = $categories->count();
        return view('admin.categories.categories', compact('categories', 'categoryCount'));
    }

    public function showBrands()
    {
        $brands = Brand::all();
        $brandCount = $brands->count();
        return view('admin.brands.brands', compact('brands', 'brandCount'));
    }

    public function showOptions()
    {
        $options = Option::all();
        $optionCount = $options->count();
        return view('admin.options.options', compact('options', 'optionCount'));
    }

    public function showOptionsCategories()
    {
        $optionsCat = OptionCategories::all();
        $optionCount = $optionsCat->count();
        return view('admin.options.options_categories', compact('optionsCat', 'optionCount'));
    }

}

