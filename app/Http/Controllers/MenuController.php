<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function home()
    {
    	$padres = DB::table('categorias')->get();
    	return view('web.home', ['padres' => $padres]);
    }
}
