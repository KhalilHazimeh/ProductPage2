<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table_name = 'products';
    protected $fillable = ['name', 'price', 'oldprice', 'image', 'brandid'];

    public function getProduct($id) {
        $product = Product::with('brand')->find($id);

        if ($product) {
            return $product;
        }

        return false;
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function getProductCategories($id) {
        $product = Product::find($id);

        if ($product) {
            $categoryNames = $product->categories->pluck('category_name')->toArray();
            return $categoryNames;
        }

        return [];
    }


    public function getAllProductValues() {
        $products = Product::select('products.id', 'products.name', 'products.price', 'products.oldprice')
            ->selectRaw('GROUP_CONCAT(DISTINCT categories.category_name ORDER BY categories.category_name ASC) AS categories')
            ->leftJoin('product_categories', 'products.id', '=', 'product_categories.product_id')
            ->leftJoin('categories', 'product_categories.category_id', '=', 'categories.category_id')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.brand_id')
            ->groupBy(['products.id'])
            ->get();

        return ['products' => $products, 'count' => $products->count()];
    }


    public function addProduct($id, $name, $price, $old_price, $image, $brand_id, $selectedCategories) {
        // Create a new Product instance
        $product = new Product();
        $product->id = $id;
        $product->name = $name;
        $product->price = floatval($price);
        $product->old_price = floatval($old_price);
        $product->image = $image;
        $product->brand_id = intval($brand_id);

        // Save the product to the database
        $product->save();

        // Attach selected categories to the product
        $product->categories()->attach($selectedCategories);

        return $product->id;
    }


    public function deleteProduct($id) {
        $product = Product::find($id);

        if (!$product) {
            return false; // Product with the given ID not found
        }

        $product->productCategories()->delete();
        $product->sizes()->delete();
        $product->delete();

        return true;
    }


    public function deleteAllProduct() {
        $deleted = Product::truncate();

        return $deleted;
    }

    public function getProductOptionIDs($product_id) {
        $product = Product::find($product_id);

        if ($product) {
            return $product->productOptions->pluck('option_id')->toArray();
        }

        return [];
    }

    }

