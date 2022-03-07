<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    //Menu
    public function getMenu()
    {
        $menu = Menu::get();
        //$menulist = $menu->tree();
        return view('anasayfa', ['menu' => $menu]);
    }
}
