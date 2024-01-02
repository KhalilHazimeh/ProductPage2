<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionCategories extends Model
{
    protected $table = 'option_values';
    protected $fillable = ['option_id' , 'value_name'];

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id', 'id');
    }

}
