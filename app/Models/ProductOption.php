<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{

    protected $table = 'product_options';
    protected $fillable = ['product_id', 'option_id'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
