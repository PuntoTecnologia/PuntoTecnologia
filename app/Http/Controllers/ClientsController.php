<?php

namespace app\Http\Controllers;
use DB;
use app\clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
    	$lista_clients = DB::table('clients')->get();
    	return view ('panel.clients.home')->with('lista_clients', $lista_clients);
    }
    public function index_new()
    {
    	$lista_clients = DB::table('clients')->get();
    	return view ('panel.clients.new')->with('lista_clients', $lista_clients);
    }
    public function create()
    {
    	$clients = new clients;
		$clients->name = request()->name;
		$clients->last_name = request()->last_name;
		$clients->email = request()->email;
		$clients->telefono = request()->telefono;
		$clients->cuit_cuil = request()->cuit_cuil;
		$clients->active = request()->active;
		$clients->save();
		return redirect('/CLIENTES');
    }
    public function edit(clients $clients)
    {	
    	return view('panel.clients.edit')->with('clients', $clients);
    }

    public function update(clients $clients)
    {
		$clients->name = request()->name;
		$clients->last_name = request()->last_name;
		$clients->email = request()->email;
		$clients->telefono = request()->telefono;
		$clients->cuit_cuil = request()->cuit_cuil;
		$clients->active = request()->active;
		$clients->save();
		return redirect('/CLIENTES');
    }
    public function destroy(clients $clients)
	{
		$clients->delete();
		return redirect('/CLIENTES');
	}
}
