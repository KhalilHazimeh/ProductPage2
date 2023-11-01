<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category_name'];
    protected $primaryKey = 'category_id';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }

    public function getAllCategories() {
        $categories = Category::all();
        $count = $categories->count();

        return ['categories' => $categories, 'count' => $count];
    }

    public function addCategory($name) {
        $category = new Category;
        $category->category_name = $name;

        if ($category->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategory($id) {
        $category = Category::find($id);

        if ($category) {
            if ($category->delete()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false; // Handle not found category
        }
    }
}
