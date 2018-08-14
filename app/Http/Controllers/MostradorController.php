<?php

namespace app\Http\Controllers;
use\DB;
use\app\prover;
use\app\product;
use\app\rem_comp_tmp;
use\app\rem_comp;
use auth;
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
        $temporal = DB::table('productos')->join('rem_comp_tmp','rem_comp_tmp.prod_id','=','productos.id')->where('rem_comp_tmp.usu_id',auth::user()->id)->get();
       //VERIFICO SI EL USUARIO TIENE UN REMITO SIN TERMINAR, CASO CONTRARIO LO CREO Y LO PASO
        $remito_existente = DB::table('rem_comp')->where('usu_id', auth::user()->id)->orWhere('valor', '')->first();
        if ($remito_existente == null) {
            $crear_remito = new rem_comp;
            $crear_remito->usu_id = auth::user()->id;
            $crear_remito->save();
            $remito_existente=$crear_remito;
        }
    	return view('mostrador.compra')->with('provers', $provers)->with('product', $product)->with('temporal',$temporal)->with('remito_existente',$remito_existente);
    }

    
}
