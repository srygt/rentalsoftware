<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Support\Renderable;

class MainController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function home(){

        return view('index');
    }
}
