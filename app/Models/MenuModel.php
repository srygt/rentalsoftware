<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    //Menu

    protected $table = 'menus';
    protected $fillable = [

    ];

    const COLUMN_ID         ='id';
    const COLUMN_MENUTITLE  = 'menu_title';
}
