<?php


namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use DefaultDatetimeFormat;

    protected $table = 'categories';


    public function components() {
        return $this->hasMany(Component::class);
    }
}