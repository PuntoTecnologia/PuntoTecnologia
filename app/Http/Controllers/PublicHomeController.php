<?php
namespace app\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\categori;
use app\product;
use app\marcas;

class PublicHomeController extends Controller
{
    public function index()
    {
    	$categorias = DB::table('categorias')->get();
    	return view('web.home')->with('categorias', $categorias);
    }
    public function detalle (product $product)
    {
        //return dd($product);
        $marcas = DB::table('marcas')->get();
        $categorias = DB::table('categorias')->get();
        $img_productos = DB::table('img_productos')->get();
        return view('web.detail')->with('marcas', $marcas)->with('categorias', $categorias)->with('img_productos', $img_productos)->with('product', $product);
    }
    public function catalogo ()
    {
    	$categorias = DB::table('categorias')->get();
    	//AL HACER LA CONSULTADE ESTE MODO, LOS PRODUCTOS SIN FOTO NO SE PUBLICAN EN LA WEB
    	$productos = DB::table('productos')
    	->select('productos.*', 'img_productos.*')
    	->join('img_productos', 'img_productos.producto_id', 'productos.id')
    	->limit(45)
        ->groupby('img_productos.producto_id')
    	->get();
    	//return dd($productos);
    	return view('web.product')->with('productos', $productos)->with('categorias', $categorias);
    }
    public function ofertas()
    {
        $categorias = DB::table('categorias')->get();
        //AL HACER LA CONSULTADE ESTE MODO, LOS PRODUCTOS SIN FOTO NO SE PUBLICAN EN LA WEB
        $productos = DB::table('productos')
        ->select('productos.*', 'img_productos.*')
        ->join('img_productos', 'img_productos.producto_id', 'productos.id')
        ->where('productos.oferta', 1)
        ->limit(45)
        ->groupby('img_productos.producto_id')
        ->get();
        //return dd($productos);
        return view('web.product')->with('productos', $productos)->with('categorias', $categorias);
    }
    public function destacados()
    {
        $categorias = DB::table('categorias')->get();
        //AL HACER LA CONSULTADE ESTE MODO, LOS PRODUCTOS SIN FOTO NO SE PUBLICAN EN LA WEB
        $productos = DB::table('productos')
        ->select('productos.*', 'img_productos.*')
        ->join('img_productos', 'img_productos.producto_id', 'productos.id')
        ->limit(45)
        ->groupby('img_productos.producto_id')
        ->get();
        //return dd($productos);
        return view('web.product')->with('productos', $productos)->with('categorias', $categorias);
    }
    public function ultimos_ingresos()
    {
        $categorias = DB::table('categorias')->get();
        //AL HACER LA CONSULTADE ESTE MODO, LOS PRODUCTOS SIN FOTO NO SE PUBLICAN EN LA WEB
        $productos = DB::table('productos')
        ->select('productos.*', 'img_productos.*')
        ->join('img_productos', 'img_productos.producto_id', 'productos.id')
        ->orderByraw('productos.id DESC')
        ->limit(45)
        ->groupby('img_productos.producto_id')
        ->get();
        //return dd($productos);
        return view('web.product')->with('productos', $productos)->with('categorias', $categorias);
    }
    //RUTAS DEL MENU PRINCIPAL
    //EL PRIMER CASO - PADRE SOLO MENU PRINCIPAL
    public function catalogo_padre($id)
    {
        //MANDO CATEGORIAS PARA CONSTRUIR MENU
        $categorias = DB::table('categorias')->get();
        $padre=$id;
        $hijo=$id;
        $hijos = DB::table('categorias')->select('id')->where('padre',$padre)->get();

         $data = array();
         $data[] = array($id);
        foreach ($hijos as $result) {
           $data[] = (array)$result;  
        }
        $nietos = DB::table('categorias')->select('id')->wherein('padre',$data)->get();
        foreach ($nietos as $result) {
           $data[] = (array)$result;  
        }
        //return dd($data);
        //MANDO PRODUCTOS DE LA CATEGORIA RECIBIDA $ID
        $productos = DB::table('productos')
        ->select('productos.*', 'img_productos.producto_id', 'img_productos.file_name')
        ->join('img_productos', 'productos.id', 'img_productos.producto_id')
        ->wherein('productos.padre', $data)
        ->groupby('img_productos.producto_id')
        ->get();
        //return dd($data, $productos);
        return view('web.product')->with('productos', $productos)->with('categorias', $categorias);
    }
    //SEGUNDO CASO HIJO O SUB CATEGORIA MENU 2 NIVELES
    public function catalogo_hijo($id)
    {
        $categorias = DB::table('categorias')->get();

        $todas = DB::table('categorias')->select('id','padre')->where('padre',$id)->orWhere('id',$id)->get();
        $padrecons = DB::table('categorias')->select('padre')->where('id',$id)->limit(1)->get();
        
        $hijo=$id;
        foreach ($padrecons as $key) {
            $padre=$key->padre;
        }
        $nieto=$id; 
        $productos = DB::table('productos')
        ->select('productos.*', 'img_productos.producto_id', 'img_productos.file_name')
        ->join('img_productos', 'productos.id', 'img_productos.producto_id')
        ->wherein('productos.padre', [$padre, $hijo, $nieto])
        ->groupby('img_productos.producto_id')
        ->get();
        //return dd($productos);
        return view('web.product')->with('productos', $productos)->with('categorias', $categorias);
    }
    //TERCER CASO HIJO O SUB CATEGORIA MENU 2 NIVELES
    public function catalogo_hijo_3niv ($id)
    {
        
        $categorias = DB::table('categorias')->get();

        $todas = DB::table('categorias')->select('id','padre')->where('padre',$id)->orWhere('id',$id)->get();
        $hijo=$id;
        foreach ($todas as $key) {
            $nieto=$key->id;
        }
        $productos = DB::table('productos')
        ->select('productos.*', 'img_productos.producto_id', 'img_productos.file_name')
        ->join('img_productos', 'productos.id', 'img_productos.producto_id')
        ->wherein('productos.padre', [$hijo, $nieto])
        ->groupby('img_productos.producto_id')
        ->get();
        //return dd($todas, $productos);
        return view('web.product')->with('productos', $productos)->with('categorias', $categorias);
    }
    //CUARTO CASO NIETOS DE NIVEL 3
    public function catalogo_nieto($id)
    {
    	$categorias = DB::table('categorias')->get();

        $productos = DB::table('productos')
        ->select('productos.*', 'img_productos.producto_id', 'img_productos.file_name')
        ->join('img_productos', 'productos.id', 'img_productos.producto_id')
        ->where('productos.padre', $id)
        ->groupby('img_productos.producto_id')
        ->get();

        return view('web.product')->with('productos', $productos)->with('categorias', $categorias);
    }
}
