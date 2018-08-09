<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\plan;

class PlanesController extends Controller
{
    public function index()
	    {
	    	$plan = plan::devolver();
	    	//return dd($plan);
	    	return view('panel.planes.index',['planes' => $plan]);
	    }

	public function new()
    {
    	return view ('panel.planes.new');
    }
    public function create()
    {
    	$plan = new plan;
    	$plan->card = request()->card;
		$plan->cuotas = request()->cuotas;
		$plan->coef = request()->coef;
		$plan->active = 1;
		$plan->save();
		return redirect('PLANES');
    } 

    public function desactivar(plan $plan)
    {
    	$planedit = plan::find($plan->id);
        $planedit->active = 0;
        $planedit->save();
		return redirect('/PLANES');
    }

    public function edit(plan $plan)
    {
        return view ('panel.planes.edit')->with('plan', $plan);
    }
    public function update(plan $plan)
    {
        $plan->card = request()->card;
        $plan->cuotas = request()->cuotas;
        $plan->coef = request()->coef;
        $plan->active = request()->active;
        $plan->save();
        return redirect('PLANES');
    }
}
