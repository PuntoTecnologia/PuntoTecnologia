<?php

namespace app\Http\Controllers;
use\DB;
use\app\prover;
use\app\product;
use\app\rem_comp_tmp;
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
       
    	return view('mostrador.compra')->with('provers', $provers)->with('product', $product)->with('temporal',$temporal);
    }

    public function search_code($id)
    {
        if($id == 0)
        {
        $cod = request()->codigo;
        $productos = DB::table('productos')
        ->where('productos.codigo', $cod)
        ->get();

        $busqueda = $productos[0]->id;

        }
        else
        {
            $busqueda = $id;
        }   

        //AL HACER LA CONSULTADE ESTE MODO, LOS PRODUCTOS SIN FOTO NO SE PUBLICAN EN LA WEB
        $productos = DB::table('productos')
        ->where('productos.id', $busqueda)
        ->get();
        
        if(!($productos)->isEmpty())
        {     
           
           $crear_compra_tmp = new rem_comp_tmp;

            $temp = DB::table('rem_comp_tmp')->where('prod_id',$productos[0]->id)->where('rem_comp_tmp.usu_id',auth::user()->id)->limit(1)->get();

            //return dd($temp);
            if(($temp)->isEmpty())
            {
            
            $crear_compra_tmp->prod_id = $productos[0]->id;
            $crear_compra_tmp->cantidad = 1;
            $crear_compra_tmp->costo_unit = $productos[0]->costo;
            $crear_compra_tmp->prov_id = $productos[0]->prover;
            $crear_compra_tmp->usu_id = auth::user()->id;
            $crear_compra_tmp->save();
            }
            else
            {
                $crear_compra_tmp = $crear_compra_tmp->find($temp[0]->id);
                $crear_compra_tmp->cantidad = $crear_compra_tmp->cantidad + 1;
                $crear_compra_tmp->save();
            }
        }
    else{
            
            dd('ingreso un codigo erroneo');
        }

            $provers = DB::table('prover')->get();
            $product = DB::table('productos')->get();
            $temporal = DB::table('productos')->join('rem_comp_tmp','rem_comp_tmp.prod_id','=','productos.id')->where('rem_comp_tmp.usu_id',auth::user()->id)->get();

            return view('mostrador.compra')->with('provers', $provers)->with('product', $product)->with('temporal', $temporal);
        
    }


    public function search_product()
    {
        dd('selecciono un articulo');
    }

    public function modificar_cantidad($id)
    {
        
    }
}
