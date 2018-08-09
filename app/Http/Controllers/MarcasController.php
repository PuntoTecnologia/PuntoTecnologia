<?php

namespace app\Http\Controllers;
use\DB;
use\app\marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    public function index()
    {
    	$marcas = DB::table('marcas')->get();
    	return view('panel.marcas.index')->with('marcas', $marcas);
    }
    public function new()
    {
    	return view ('panel.marcas.new');
    }
    public function create()
    {
    	$marca = new marcas;
		$marca->marca = request()->marca;
		$marca->save();
		return redirect('MARCAS');
    }
}
