<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use app\product;
use app\iva;
use app\image;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function edit (Product $product)
    {
    	$images = DB::table('img_productos')
    	->select('img_productos.id',  'img_productos.file_name', 'img_productos.producto_id', 'productos.id', 'productos.padre')
    	->join('productos', 'productos.id', '=', 'img_productos.producto_id')
    	->where('productos.id', '=' ,$product->id)
    	->get();
        $provers = DB::table('prover')->get();
        $iva = DB::table('iva')->get();
        $lista_categorias = DB::table('categorias')->get();
        $marcas = DB::table('marcas')->get();
    	//return dd($product, $lista_categorias);
    	return view('panel.products.edit')->with('product', $product)->with('images', $images)->with('lista_categorias', $lista_categorias)->with('provers', $provers)->with('marcas',$marcas)->with('iva',$iva);
    }
    public function nuevo_articulo()
        {
            $provers = DB::table('prover')->get();
            $lista_categorias = DB::table('categorias')->get();
            $marcas = DB::table('marcas')->get();
            $iva = DB::table('iva')->get();    
            return view('panel.products.new')->with('lista_categorias', $lista_categorias)->with('provers', $provers)->with('marcas',$marcas)->with('iva',$iva);
        }
    public function crear_articulo()
        {
            $crear_articulo = new product;
            $crear_articulo->codigo = request()->codigo;
            $crear_articulo->titulo = request()->titulo;
            $crear_articulo->descripcion = request()->descripcion;
            $crear_articulo->stockminimo = request()->minimo;
            $crear_articulo->id_marca = request()->id_marca;
            $crear_articulo->costo = request()->costo;
            $crear_articulo->rent = request()->rent;
            $crear_articulo->iva = request()->iva;
            $crear_articulo->prover = request()->prover;
            $crear_articulo->padre = request()->padre;
            $crear_articulo->oferta = request()->oferta;
            $crear_articulo->tipo = request()->tipo;
            $crear_articulo->active = 1;
            $crear_articulo->save();

            return view('panel.products.crear_articulo_img')->with('crear_articulo', $crear_articulo);
        }
    public function update_info(Product $product)
    {
        $product->codigo = request()->codigo;
        $product->titulo = request()->titulo;
        $product->descripcion = request()->descripcion;
        $product->stockminimo = request()->minimo;
        $product->id_marca = request()->id_marca;
        $product->costo = request()->costo;
        $product->rent = request()->rent;
        $product->iva = request()->iva;
        $product->prover = request()->prover;
        $product->padre = request()->padre;
        $product->oferta = request()->oferta;
        $product->tipo = request()->tipo;
        $product->active = request()->active;
        $product->save();
        
        return redirect()->action('PanelController@catalogo');
    }
    public function update_img_view(Product $product)
    {
        $images = DB::table('img_productos')
        ->select('img_productos.id',  'img_productos.file_name', 'img_productos.producto_id')
        ->join('productos', 'productos.id', '=', 'img_productos.producto_id')
        ->where('productos.id', '=' ,$product->id)
        ->get();
        //return dd($images);
        return view('panel.products.update_img')->with('product', $product)->with('images', $images);
    }

    public function destroy($id_img, $id_prod, Product $product)
    {
        $image = DB::table('img_productos')
        ->where('img_productos.id', '=' ,$id_img);
        $image->delete();
        //PARA PODER RETORNAR A LA VISTA DE EDICION DE ESE ARTICULO NECESITO LA VARIABLE IMAGES PARA CONSTRUIR ETIQUETAS IMG Y ELEMENTO PRODUCT PARA SUBIR IMG CON DROPZONE
        $images = DB::table('img_productos')
        ->select('img_productos.id',  'img_productos.file_name', 'img_productos.producto_id')
        ->join('productos', 'productos.id', '=', 'img_productos.producto_id')
        ->where('productos.id', '=' ,$id_prod)
        ->get();

        return view('panel.products.update_img')->with('product', $product)->with('images', $images);
    }

    public function destroy_art(Product $product)
    {
        $dir='/uploads/'.$product->id;
        Storage::deleteDirectory($dir);
        $product->delete();
        return redirect('/CATALOGO');
    }
}
