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

    public function getAllOptions() {
        $options = Option::all();
        $count = $options->count();
        return ['options' => $options, 'count' => $count];
    }

    public function addOption($name) {
        $option = new Option();
        $option->name = $name;
        $option->save();

        return $option->id;
    }
    public function deleteOption($id) {
        $option = Option::find($id);

        if ($option) {
            $option->delete();
            return true;
        }

        return false;
    }
}
