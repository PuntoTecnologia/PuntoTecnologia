<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Controllers\Controller;

class rem_comprasController extends Controller
{
    public function cargar_rem_comp_tmp()
        {
            $crear_rem = new rem_comp_tmp;
            $crear_rem->prod_id = request()->prod_id;
            $crear_rem->cantidad = request()->cantidad;
            $crear_rem->costo_unit = request()->costo_unit;
            $crear_rem->prov_id = request()->prov_id;
            $crear_articulo->usu_id = request()->usu_id;
            $crear_articulo->save();

        $provers = DB::table('prover')->get();
    	$product = DB::table('productos')->get();
        $temporal = DB::table('rem_comp_tmp')->get();
    	return view('mostrador.compra')->with('provers', $provers)->with('product', $product)->with('temporales',$temporal);
        }
}
