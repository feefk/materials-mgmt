<?php


namespace App\Models;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class Bead extends Model
{
    use DefaultDatetimeFormat;

    protected $table = 'beads';

}