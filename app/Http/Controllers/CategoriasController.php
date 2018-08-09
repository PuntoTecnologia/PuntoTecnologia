<?php

namespace app\Http\Controllers;
use Illuminate\Http\Request;
use app\categori;
use DB;
class CategoriasController extends Controller
{
    public function index()
	{
		$lista_categorias = DB::table('categorias')->get();
		return view('panel.categories.home')->with('lista_categorias', $lista_categorias);
	}

	public function index_create()
	{
		$lista_categorias = DB::table('categorias')->get();
		return view('panel.categories.new')->with('lista_categorias', $lista_categorias);
	}

	public function create()
	{
		$categorias = new categori;
		$categorias->nombre = request()->nombre;
		$categorias->padre = request()->padre;
		$categorias->active = request()->active;
		$categorias->save();
		
		$lista_categorias = DB::table('categorias')->get();
		return view('panel.categories.home')->with('lista_categorias', $lista_categorias);
	}

	public function Edit(Categori $categori)
	{
		return view('panel.categories.edit')->with('categori', $categori);;
	}

	public function update(Categori $categori)
	{
		
		$categori->nombre = request('nombre');
		$categori->active = request('active');
		$categori->save();
		$lista_categorias = DB::table('categorias')->get();
		return view('panel.categories.home')->with('categori', $categori)->with('lista_categorias', $lista_categorias);
	}

	public function destroy(categori $categori)
	{
		$categori->delete();
		return redirect('/EDITAR-CATEGORIAS');
	}
}
