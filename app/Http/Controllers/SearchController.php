<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\categori;

class SearchController extends Controller
{
    public function index ()
    {
    	$busqueda = request()->busqueda;
    	$categorias = DB::table('categorias')->get();
    	//AL HACER LA CONSULTADE ESTE MODO, LOS PRODUCTOS SIN FOTO NO SE PUBLICAN EN LA WEB
    	$productos = DB::table('productos')
    	->select('productos.*', 'productos.titulo', 'img_productos.*')
    	->join('img_productos', 'img_productos.producto_id', 'productos.id')
    	->where('productos.titulo', 'LIKE','%'.$busqueda.'%')
    	->limit(15)
        ->groupby('img_productos.producto_id')
    	->get();
    	//return dd($busqueda);
    	return view('web.product')->with('productos', $productos)->with('categorias', $categorias);
    }
}
