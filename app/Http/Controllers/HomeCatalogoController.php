<?php

namespace app\Http\Controllers;
use DB;
use app\product;
use app\image;
use Illuminate\Http\Request;

class HomeCatalogoController extends Controller
{
    public function index ($id_cat)
    {
    	$metakeys = DB::table('metakeys')->limit(1)->get();
        $meta_description = DB::table('meta_description')->limit(1)->get();
        $my_site = DB::table('my_site')->limit(1)->get();
        $padres = DB::table('categorias')->get();
    	$productos = DB::table('productos')
	        ->select('productos.*', 'img_productos.producto_id', 'img_productos.file_name')
	        ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
	        ->where('productos.padre', $id_cat)
	        ->groupby('img_productos.producto_id')
	        ->get();
    		//return dd($productos);
	        return view('web.catalogo')->with('productos', $productos)->with('padres', $padres)->with('metakeys', $metakeys)->with('meta_description', $meta_description)->with('my_site', $my_site);
    }

    public function detail(Product $product)
    {
    	$metakeys = DB::table('metakeys')->limit(1)->get();
        $meta_description = DB::table('meta_description')->limit(1)->get();
        $my_site = DB::table('my_site')->limit(1)->get();
        $padres = DB::table('categorias')->get();
    	$oferts = DB::table('productos')
	        ->select('productos.*', 'img_productos.producto_id', 'img_productos.file_name')
	        ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
	        ->where('productos.oferta', '1')
	        ->inRandomOrder()
	        ->limit(4)
	        ->get();
    	$relacionados = DB::table('productos')->where('padre', $product->padre)->get();
    	$producto = DB::table('productos')
	        ->select('productos.*', 'img_productos.producto_id', 'img_productos.file_name')
	        ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
	        ->where('productos.id', $product->id)
	        ->get();
    	//return dd($oferts);
    	return view('web.detalle')->with('oferts', $oferts)->with('product', $product)->with('padres', $padres)->with('relacionados', $relacionados)->with('producto', $producto)->with('metakeys', $metakeys)->with('meta_description', $meta_description)->with('my_site', $my_site);
    }

    public function oferts ()
    {
        $metakeys = DB::table('metakeys')->limit(1)->get();
        $meta_description = DB::table('meta_description')->limit(1)->get();
        $my_site = DB::table('my_site')->limit(1)->get();
    	$padres = DB::table('categorias')->get();
    	$oferts = DB::table('productos')
	        ->select('productos.*', 'img_productos.producto_id', 'img_productos.file_name')
	        ->join('img_productos', 'productos.id', '=', 'img_productos.producto_id')
	        ->where('productos.oferta', '1')
	        ->get();
    	return view('web.ofertas')->with('padres', $padres)->with('oferts', $oferts)->with('metakeys', $metakeys)->with('meta_description', $meta_description)->with('my_site', $my_site);
    }
}
