<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';
    protected $fillable = ['name'];

    public function optionCategories()
    {
        return $this->hasMany(OptionCategories::class, 'option_id', 'id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_options', 'option_id', 'product_id');
    }
}
