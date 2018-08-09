<?php

namespace app\Http\Controllers;
use\DB;
use\app\prover;
use Illuminate\Http\Request;

class ProverController extends Controller
{
    public function index()
    {
    	$provers = DB::table('prover')->get();
    	return view ('panel.prover.index')->with('provers', $provers);
    }
    public function new()
    {
        $provers = DB::table('prover')->get();
    	return view ('panel.prover.new')->with('provers', $provers);
    }
    public function create(prover $prover)
    {
    	$prover = new prover;
		$prover->name = request()->name;
		$prover->email = request()->email;
		$prover->telefono = request()->telefono;
		$prover->direccion = request()->direccion;
		$prover->cuit_cuil = request()->cuit_cuil;
		$prover->active = 1;
		$prover->save();
		return redirect('/PROVEEDORES');
    }
    public function edit(prover $prover)
    {
    	return view ('panel.prover.view')->with('prover', $prover);
    }
    public function update(prover $prover)
    {
    	$prover->name = request()->name;
		$prover->email = request()->email;
		$prover->telefono = request()->telefono;
		$prover->direccion = request()->direccion;
		$prover->cuit_cuil = request()->cuit_cuil;
		$prover->active = 1;
		$prover->save();
		return redirect('/PROVEEDORES');
    }
    public function destroy(prover $prover)
    {
    	$prover->delete();
		return redirect('/PROVEEDORES');
    }
}
