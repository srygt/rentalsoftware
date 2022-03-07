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
       Menu::COLUMN_ID,
       Menu::COLUMN_MENUTITLE,
       Menu::COLUMN_MENUICON,
       Menu::COLUMN_PARENTID,
       Menu::COLUMN_SORTORDER,
       Menu::COLUMN_SLUG,
    ];

    const COLUMN_ID         ='id';
    const COLUMN_MENUTITLE  = 'menu_title';
    const COLUMN_MENUICON   = 'menu_icon';
    const COLUMN_PARENTID   = 'parent_id';
    const COLUMN_SORTORDER  = 'sort_order';
    const COLUMN_SLUG       = 'slug';


    public function parent()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'parent_id')->orderBy('sort_order');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Menu','parent_id','id')->orderBy('sort_order');
    }

    public static function tree()
    {
        return static::with(implode('.',array_fill(0,100,'children')))->where('parent_id','=','0')->orderBy('sort_order')->get();
    }    
}
