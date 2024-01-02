<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Option;
use App\Models\OptionCategories;
use App\Models\OptionCombination;
use App\Models\ProductOption;


class ProductController extends Controller
{
    public function show($product_id)
{
    $product = Product::find($product_id);
    return view('products.show', compact('product'));
}

public function showProducts()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $options = Option::all();
        $optionsCat = OptionCategories::all();
        $products = Product::all();
        return view('admin.products.product', compact('products','brands','categories','options','optionsCat'));
    }

    public function addProduct(Request $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->oldPrice = $request->input('oldPrice');
        $product->image = $imagePath;
        $product->brand_id = $request->input('brandID');
        $product->save();
        $product->categories()->attach($request->input('categories'));
        $insertedOptionIds = $request->input('product_options');
        $product->options()->attach($insertedOptionIds);

        $combinationData = [];

        if($request->input('combinations')){
        foreach ($request->input('combinations')[$insertedOptionIds[0]] as $key=>$firstOptionValueId) {
            $firstOptionId = $insertedOptionIds[0];
            $secondOptionId = null;

            if (count($insertedOptionIds) == 2) {
                $secondOptionId = $insertedOptionIds[1];
            }

            $firstOptionValues = $firstOptionId ? $request->input('combinations')[$firstOptionId] : [];
            $secondOptionValues = $secondOptionId ? $request->input('combinations')[$secondOptionId] : [];

                $combinationData[] = [
                    'product_id' => $product->id,
                    'first_option_id' => $firstOptionId,
                    'first_option_value_id' => $firstOptionValueId,
                    'second_option_id' => $secondOptionId,
                    'second_option_value_id' => isset($secondOptionValues[$key]) ? $secondOptionValues[$key] : null,
                ];
        }
        OptionCombination::insert($combinationData);
        }

        return redirect('/admin/products')->with('success', 'Product added successfully');
    }

    public function deleteProduct(Request $request)
    {
        $productId = $request->input('delete_product_id');
        $product = Product::find($productId);

        if ($product) {
            $product->categories()->detach();
            $product->options()->detach();
            OptionCombination::where('product_id', $productId)->delete(); // Correct model
            $product->delete();

            return redirect('/admin/products')->with('success', 'Product deleted successfully');
        } else {
            return redirect('/admin/products')->with('error', 'Product not found');
        }
    }

    public function edit($product_id)
    {
        $product = Product::find($product_id);
        $brands = Brand::all();
        $categories = Category::all();
        $options = Option::all();
        $optionsCat = OptionCategories::all();
        $option_combinations = OptionCombination::all();


        return view('admin.products.edit', compact('product', 'brands', 'categories', 'options', 'optionsCat'));
    }


    public function update(Request $request, $product_id)
{
    $product = Product::find($product_id);

    $product->name = $request->input('title');
    $product->price = $request->input('price');
    $product->oldprice = $request->input('oldPrice');
    $product->brand_id = $request->input('brandID');

    $product->save();

    $product->categories()->sync($request->input('categories', []));
    $insertedOptionIds = $request->input('product_options');
    $product->options()->sync($insertedOptionIds);

        $combinationData = [];

        if($request->input('combinations')){
        foreach ($request->input('combinations')[$insertedOptionIds[0]] as $key=>$firstOptionValueId) {
            $firstOptionId = $insertedOptionIds[0];
            $secondOptionId = null;

            if (count($insertedOptionIds) == 2) {
                $secondOptionId = $insertedOptionIds[1];
            }

            $firstOptionValues = $firstOptionId ? $request->input('combinations')[$firstOptionId] : [];
            $secondOptionValues = $secondOptionId ? $request->input('combinations')[$secondOptionId] : [];

                $combinationData[] = [
                    'product_id' => $product->id,
                    'first_option_id' => $firstOptionId,
                    'first_option_value_id' => $firstOptionValueId,
                    'second_option_id' => $secondOptionId,
                    'second_option_value_id' => isset($secondOptionValues[$key]) ? $secondOptionValues[$key] : null,
                ];
        }
        OptionCombination::insert($combinationData);
        }

    return redirect('/admin/products')->with('success', 'Product updated successfully');
}

    public function fetchOptionValues(Request $request)
    {
        $optionID = $request->input('optionID');

        $optionValues = OptionCategories::where('option_id', $optionID)->get(['id', 'value_name']);

        return response()->json($optionValues);
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

