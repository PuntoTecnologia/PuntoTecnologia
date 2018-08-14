<?php

namespace app\Http\Controllers;
use\DB;
use\app\prover;
use\app\product;
use\app\rem_comp_tmp;
use\app\rem_comp;
use auth;
use Illuminate\Http\Request;

class RemitoCompraController extends Controller
{
    public function update_prov($id)
    {
        $provers = DB::table('prover')->get();
        $product = DB::table('productos')->get();
        $temporal = DB::table('productos')->join('rem_comp_tmp','rem_comp_tmp.prod_id','=','productos.id')->where('rem_comp_tmp.usu_id',auth::user()->id)->get();
        $prov=rem_comp::where('usu_id', auth::user()->id)->first();
        $prov->prov_id = $id;
        $prov -> save();
        //obtengo el id del remito que tiene el usuario ya creado para realizar la compra y lo envio
        $remito_existente = DB::table('rem_comp')->where('usu_id', auth::user()->id)->orWhere('valor', '')->first();
        return view('mostrador.compra')->with('provers', $provers)->with('product', $product)->with('temporal', $temporal)->with('remito_existente',$remito_existente);
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

        //AL HACER LA CONSULTA DE ESTE MODO, LOS PRODUCTOS SIN FOTO NO SE PUBLICAN EN LA WEB
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
            $remito_existente = DB::table('rem_comp')->where('usu_id', auth::user()->id)->orWhere('valor', '')->first();

            return view('mostrador.compra')->with('provers', $provers)->with('product', $product)->with('temporal', $temporal)->with('remito_existente',$remito_existente);
        
    }

    public function cant_edit($id)
    {
    	$cant = new rem_comp_tmp;
        $cant = $cant->find($id);
        $cant->cantidad = request()->cantidad;
        $cant->save();
        return redirect('/mostrador/punto_compra');
    }
    public function unitario_edit($id)
    {
    	$cant = new rem_comp_tmp;
        $cant = $cant->find($id);
        $cant->costo_unit = request()->unitario;
        $cant->save();
        return redirect('/mostrador/punto_compra');
    }
    public function cond_pago_edit()
    {
    	$temporal = DB::table('rem_comp')->where('usu_id', auth::user()->id)->orWhere('valor', '')->first();
    	$cond_pago = new rem_comp;
        $cond_pago = $cond_pago->find($temporal->id);
        $cond_pago->cond_pago = request()->cond_pago;
        $cond_pago->save();
        return redirect('/mostrador/punto_compra');
    }
    public function ref_rem_prov()
    {
    	$temporal = DB::table('rem_comp')->where('usu_id', auth::user()->id)->orWhere('valor', '')->first();
    	$cond_pago = new rem_comp;
        $cond_pago = $cond_pago->find($temporal->id);
        $cond_pago->ref_fact_prov = request()->ref_rem_prov;
        $cond_pago->save();
        return redirect('/mostrador/punto_compra');
    }
    public function destroy_rem_comp_tmp(rem_comp_tmp $rem_comp_tmp)
    {
    	$rem_comp_tmp->delete();
		return redirect('/mostrador/punto_compra');
    }
}
