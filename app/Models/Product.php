<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table_name = 'products';
    protected $fillable = ['name', 'price', 'oldprice', 'image', 'brand_id'];
    public $timestamps = false;
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

    public function options()
    {
        return $this->belongsToMany(Option::class, 'product_options');
    }
    public function combinations()
{
    return $this->hasMany(OptionCombination::class, 'product_id');
}

    public function getProductCategories($id) {
        $product = Product::find($id);

        if ($product) {
            $categoryNames = $product->categories->pluck('category_name')->toArray();
            return $categoryNames;
        }

        return [];
    }
    }

