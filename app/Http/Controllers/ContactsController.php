<?php

namespace app\Http\Controllers;
use app\contacts;
use app\cotegori;
use Illuminate\Http\Request;
use DB;

class ContactsController extends Controller
{
    public function index()
    {
        $consultas = DB::table('contacts')->orderBy('created_at', 'DESC')->get();
    	return view('panel/consultas')->with('consultas', $consultas);
    }

    public function create ()
    {
    	$contacts = new contacts;
		$contacts->nombre = request()->nombre;
		$contacts->telefono = request()->telefono;
		$contacts->email = request()->email;
		$contacts->consulta = request()->consulta;
		$contacts->save();
		$padres = DB::table('categorias')->get();
        
        $metakeys = DB::table('metakeys')->limit(1)->get();
        $meta_description = DB::table('meta_description')->limit(1)->get();
        $my_site = DB::table('my_site')->limit(1)->get();
		return view('web.home')->with('padres', $padres)->with('meta_description', $meta_description)->with('my_site', $my_site)->with('metakeys', $metakeys);
    }
}
