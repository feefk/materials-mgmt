<?php


namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use DefaultDatetimeFormat;

    protected $table = 'Components';


    public function category() {
        return $this->belongsTo(Category::class);
    }

}