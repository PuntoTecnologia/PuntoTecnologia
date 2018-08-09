<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\dolar;
class DolarController extends Controller
{
    public function index()
    {
    	$dolar_t = DB::table('dolar')->get();
    	return view('panel.dolar.index')->with('dolar_t', $dolar_t);
    }
    public function new()
    {
    	$dolar = new dolar;
		$dolar->valor = request()->dolar;
		$dolar->save();
		return redirect('/DOLAR');
    }
}
