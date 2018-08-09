<?php

namespace app\Http\Controllers;
use app\repair;
use app\clients;
use App\state;
use DB;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function index()
    {   
        $lista_repairs = DB::table('repair')
        ->select('repair.id', 'repair.client_id', 'repair.precio', 'repair.marca_modelo', 'repair.datos', 'repair.descripcion', 'repair.estado', 'clients.name', 'clients.last_name', 'clients.email', 'clients.telefono', 'clients.cuit_cuil')
        ->join('clients', 'clients.id', '=', 'repair.client_id')
        ->orderbyRaw('id DESC')
        ->get();
        //return dd($lista_repairs);
    	return view ('panel.repairs.home')->with('lista_repairs', $lista_repairs);
    }
    public function view_new()
    {
        $lista_clients = DB::table('clients')->get();
        return view ('panel.repairs.new')->with('lista_clients', $lista_clients);
    }
    public function view_new_client(clients $clients)
    {
        $lista_clients = DB::table('clients')->get();
        return view ('panel.repairs.new_client_objet')->with('lista_clients', $lista_clients)->with('clients', $clients);
    }
    public function detail($rep1)
    {
        $states = DB::table('state')->get();
        $repair = DB::table('repair')
        ->select('repair.id', 'repair.client_id', 'repair.precio', 'repair.observacion', 'repair.marca_modelo', 'repair.datos', 'repair.descripcion', 'repair.estado', 'clients.name', 'clients.last_name', 'clients.email', 'clients.telefono', 'clients.cuit_cuil')
        ->join('clients', 'clients.id', '=', 'repair.client_id')
        ->where('repair.id', $rep1)
        ->get();
        return view ('panel.repairs.detail')->with('repair', $repair)->with('states', $states);
    }
    public function new()
    {
        $repair = new repair;
		$repair->client_id = request()->client_id;
		$repair->marca_modelo = request()->marca_modelo;
		$repair->datos = request()->datos;
		$repair->descripcion = request()->descripcion;
        $repair->observacion = '';
		$repair->estado = '1';
        $repair->precio = '';
		$repair->save();
        $repair2 = DB::table('repair')
        ->select('repair.id', 'repair.client_id', 'repair.marca_modelo', 'repair.datos', 'repair.descripcion', 'repair.estado', 'clients.name', 'clients.last_name', 'clients.email', 'clients.telefono', 'clients.cuit_cuil')
        ->join('clients', 'clients.id', '=', 'repair.client_id')
        ->where('repair.id', $repair->id)
        ->get();

         return view ('panel.repairs.pdf')->with('repair2', $repair2);
         
         
    }
    //ESTA FUNCION ES PARA LA RUTA DE PRUEBA PDF
    public function pdf($id)
    {
        $repair2 = DB::table('repair')
        ->select('repair.id', 'repair.client_id', 'repair.marca_modelo', 'repair.datos', 'repair.descripcion', 'repair.estado', 'clients.name', 'clients.last_name', 'clients.email', 'clients.telefono', 'clients.cuit_cuil')
        ->join('clients', 'clients.id', '=', 'repair.client_id')
        ->where('repair.id', $id)
        ->get();

        $pdf = \PDF::loadView('panel.ejemplo', compact('repair2'));
        return $pdf->stream($id.'.pdf');
    }
    public function update(repair $repair)
    {
        
        $repair->observacion =  request()->observacion;
        $repair->estado =  request()->state;
        $repair->precio =  request()->precio;
        
        $repair->save();
        return redirect('/TALLER');

    }
}
