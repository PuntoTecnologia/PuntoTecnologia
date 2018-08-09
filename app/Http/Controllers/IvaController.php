<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\iva;

class IvaController extends Controller
{
    public function index()
	    {
	    	$iva = iva::devolver();
	    	//return dd($plan);
	    	return view('panel.iva.index',['ivas' => $iva]);
	    }

	public function new()
    {
    	return view ('panel.iva.new');
    }
    public function create()
    {
    	$iva = new iva;
    	$iva->coef = request()->coef;
		$iva->save();
		return redirect('/IVA');
    } 
  public function desactivar(iva $iva)
    {
    	$ivaedit = iva::find($iva->id);
        $ivaedit->save();
		return redirect('/IVA');
    }

    public function edit(iva $iva)
    {
        return view ('panel.iva.edit')->with('iva', $iva);
    }
    public function update(iva $iva)
    {
        //return dd($plan);
        $iva->coef = request()->coef;
        $iva->save();
        return redirect('IVA');
    }
}
