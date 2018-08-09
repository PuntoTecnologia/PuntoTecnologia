<?php

namespace App\Http\Controllers;
use App\Contact;
use DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function index()
	{
		
	}
    public function create()
    {
    	$padres = DB::table('categorias')->get();
    	$contact = new Contact;
    	$contact->nombre = request()->nombre;
        $contact->telefono = request()->telefono;
    	$contact->email = request()->email;
    	$contact->consulta = request()->consulta;
    	$contact->save();

        $metakeys = DB::table('metakeys')->limit(1)->get();
        $meta_description = DB::table('meta_description')->limit(1)->get();
        $my_site = DB::table('my_site')->limit(1)->get();
    	return view('web.home')->with('padres', $padres)->with('meta_description', $meta_description)->with('my_site', $my_site)->with('metakeys', $metakeys);
    }
}
