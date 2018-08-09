<?php

namespace app\Http\Controllers;
use Illuminate\Http\UploadedFile;
use app\metakeys;
use app\product;
use app\image;
use app\my_site;
use DB;
use app\suscribe;
use app\categori;
use app\marcas;
use app\meta_description;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    
    public function index()
	    {
	    	return view('panel/index');
	    }
    
    public function tuto()
	    {
	    	return view('panel/tuto');
	    }
    
    public function ayuda()
	    {
	    	return view('panel/ayuda');
	    }
    
    public function config()
	    {
	    	$meta_key = DB::table('metakeys')->limit('1')->orderby('id', 'desc')
	    	->get();
	    	$title = DB::table('my_site')->limit('1')->orderby('id', 'desc')
	    	->get();
	    	$description = DB::table('meta_description')->limit('1')->orderby('id', 'desc')
	    	->get();	
	    	return view('panel/config')->with('meta_key', $meta_key)->with('title', $title)->with('description', $description);
	    }

    public function catalogo()
	    {	
	    	$lista_categorias = DB::table('categorias')->get();
	    	//$productos = DB::table('productos')->get();
	    	$productos= product::get();
	    	//$img_productos = DB::table('img_productos')->get();
	    	$marcas = DB::table('marcas')->get();
	    	
	    	
	    	return view('panel.products.catalogo')->with('marcas', $marcas)->with('productos', $productos)->with('lista_categorias', $lista_categorias);
	    }

	public function estadisticas()
	    {
	    	return view('panel/estadisticas');
	    }

	public function update_meta()
	{
		$meta_key= new metakeys;
		$meta_key->key1=request()->key1;
		$meta_key->key2=request()->key2;
		$meta_key->key3=request()->key3;
		$meta_key->key4=request()->key4;
		$meta_key->key5=request()->key5;
		$meta_key->key6=request()->key6;
		$meta_key->key7=request()->key7;
		$meta_key->key8=request()->key8;
		$meta_key-> save();

		$meta_key = DB::table('metakeys')->limit('1')->orderby('id', 'desc')
	    	->get();
	    $title = DB::table('my_site')->limit('1')->orderby('id', 'desc')
	    	->get();
    	$description = DB::table('meta_description')->limit('1')->orderby('id', 'desc')
    	->get();	
		return view('panel.config')->with('meta_key', $meta_key)->with('title', $title)->with('description', $description);
	}

	public function update_title ()
	{
		$title = new my_site;
		$title->title=request()->title;
		$title->save();

		$meta_key = DB::table('metakeys')->limit('1')->orderby('id', 'desc')
	    	->get();
	    $title = DB::table('my_site')->limit('1')->orderby('id', 'desc')
	    	->get();
    	$description = DB::table('meta_description')->limit('1')->orderby('id', 'desc')
    	->get();	
	    		
		return view('panel.config')->with('meta_key', $meta_key)->with('title', $title)->with('description', $description);

	}

	public function update_description ()
	{
			$description = new meta_description;
			$description->description=request()->description;
			$description->save();
			
		

		$meta_key = DB::table('metakeys')->limit('1')->orderby('id', 'desc')
	    	->get();
	    $title = DB::table('my_site')->limit('1')->orderby('id', 'desc')
	    	->get();
	    
	    $description = DB::table('meta_description')->limit('1')->orderby('id', 'desc')
	    	->get();

		return view('panel.config')->with('meta_key', $meta_key)->with('title', $title)->with('description', $description);

	}
	public function suscribe ()
	{
		$suscribe= new suscribe;
		$suscribe->email=request()->email;
		$suscribe-> save();
		return redirect('');
	}

}
