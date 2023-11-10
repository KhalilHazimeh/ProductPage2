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

    public function getAllOptionCategories() {
        $optionsCat = OptionCategories::all();
        $count = $optionsCat->count();
        return ['optionsCat' => $optionsCat, 'count' => $count];
    }

    public function addOptionCat($id, $name) {
        $optionsCat = new Option();
        $optionsCat->option_id = $id;
        $optionsCat->value_name = $name;
        $optionsCat->save();

        return $optionsCat->id;
    }
    public function deleteOptionCat($id) {
        $optionsCat = Option::find($id);

        if ($optionsCat) {
            $optionsCat->delete();
            return true;
        }

        return false;
    }
}
