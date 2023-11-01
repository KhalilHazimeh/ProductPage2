<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['brand_name'];

    public function getAllBrands() {
        $brands = Brand::all();
        $count = $brands->count();
        return ['brands' => $brands, 'count' => $count];
    }

    public function addBrand($name) {
        $brand = new Brand();
        $brand->brand_name = $name;
        $brand->save();

        return $brand->id; // Assuming 'id' is the primary key column
    }
    public function deleteBrand($id) {
        $brand = Brand::find($id);

        if ($brand) {
            $brand->delete();
            return true;
        }

        return false;
    }
}
