<?php

namespace app\Http\Controllers;
use\DB;
use\app\prover;
use\app\product;
use Illuminate\Http\Request;

class MostradorController extends Controller
{
    public function index()
    {
    	return view('mostrador.index');
    }
    public function compra()
    {
    	$provers = DB::table('prover')->get();
    	$product = DB::table('productos')->get();
    	return view('mostrador.compra')->with('provers', $provers)->with('product', $product);
    }
    public function search_code()
    {
        dd('ingreso un codigo');
    }
    public function search_product()
    {
        dd('selecciono un articulo');
    }
}
