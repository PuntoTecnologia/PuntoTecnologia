<?php
use Illuminate\Support\Facades\Storage;
use App\Contact;
use App\metakeys;
use App\my_site;
use App\meta_description;
//MODIFIQUE INDEX POR DESTACADOS. INDEX DIRECCIONABA A VISTA HOME QUE NO ESTA TERMINADA
Route::get('/back','PublicHomeController@ultimos_ingresos');
Route::post('/suscribir','PanelController@suscribe');
Route::get('/catalogo','PublicHomeController@catalogo');
Route::get('/ofertas','PublicHomeController@ofertas');
Route::get('/destacados','PublicHomeController@destacados');
Route::get('/ultimos/ingresos','PublicHomeController@ultimos_ingresos');
Route::get('/catalogo/busqueda','SearchController@index');
Route::get('/detalle/{product}','PublicHomeController@detalle');

//EL PRIMER CASO - PADRE SOLO MENU PRINCIPAL
Route::get('/catalogo/cat/{id}','PublicHomeController@catalogo_padre');
//SEGUNDO CASO HIJO O SUB CATEGORIA MENU 2 NIVELES
Route::get('/catalogo/subcat/{id}','PublicHomeController@catalogo_hijo');
//TERCER CASO HIJO O SUB CATEGORIA MENU 2 NIVELES
Route::get('/catalogo/subcat_2/{id}','PublicHomeController@catalogo_hijo_3niv');
//CUARTO CASO NIETOS DE NIVEL 3
Route::get('/catalogo/subcat2/{id}','PublicHomeController@catalogo_nieto');


//PANEL DE GESTION ROUTES
//echas por matias para Ivas...(18/5)
Route::get('/IVA','IvaController@index')->middleware('auth');
Route::get('/CREAR-IVA', 'IvaController@new')->middleware('auth');
Route::post('/crear-iva', 'IvaController@create')->middleware('auth');
Route::post('/ELIMINAR-IVA/{iva}', 'IvaController@desactivar')->middleware('auth');
Route::patch('/EDITAR-IVA/{iva}', 'IvaController@update')->middleware('auth');
Route::patch('/editar-iva/{iva}', 'IvaController@edit')->middleware('auth');
//echas por matias para planes
Route::get('/PLANES','PlanesController@index')->middleware('auth');
Route::get('/CREAR-PLAN', 'PlanesController@new')->middleware('auth');
Route::post('/crear-plan', 'PlanesController@create')->middleware('auth');
Route::post('/ELIMINAR-PLAN/{plan}', 'PlanesController@desactivar')->middleware('auth');
Route::patch('/EDITAR-PLAN/{plan}', 'PlanesController@update')->middleware('auth');
Route::patch('/editar-plan/{plan}', 'PlanesController@edit')->middleware('auth');

Route::get('/ACCESO', 'PanelController@index')->middleware('auth');
Route::get('/TUTORIAL', 'PanelController@tuto')->middleware('auth');
Route::get('/AYUDA', 'PanelController@ayuda')->middleware('auth');
Route::get('/CONFIGURACION', 'PanelController@config')->middleware('auth');
Route::post('/CONFIGURACION', 'PanelController@update_meta')->middleware('auth');
Route::post('ACTUALIZA-WEB-TITULO', 'PanelController@update_title')->middleware('auth');
Route::post('ACTUALIZA-META-DESCRIPCION', 'PanelController@update_description')->middleware('auth');

Route::get('/CATALOGO', 'PanelController@catalogo')->middleware('auth');
Route::get('/ESTADISTICAS', 'PanelController@estadisticas')->middleware('auth');
//CRUTAS DE ARTICULO
Route::patch('/EDITAR-ARTICULO/{product}', 'ProductController@edit')->middleware('auth');
Route::patch('/EDITAR_ARTICULO_INFO/{product}', 'ProductController@update_info')->middleware('auth');
Route::patch('/EDITAR-ARTICULO-IMG/{product}', 'ProductController@update_img_view')->middleware('auth');
Route::get('/NUEVO-ARTICULO', 'ProductController@nuevo_articulo')->middleware('auth');
Route::post('/CREAR_ARTICULO', 'ProductController@crear_articulo')->middleware('auth');
Route::post('/ELIMINAR-FOTO/{id_img}/{id_prod}/{product}', 'ProductController@destroy')->middleware('auth');
Route::delete('/ELIMINAR-ARTICULO/{product}', 'ProductController@destroy_art')->middleware('auth');
//RUTA DE MENSAJES
Route::get('/CONSULTAS', 'ContactsController@index')->middleware('auth');
Route::post('/ENVIAR-CONSULTA', 'ContactsController@create')->middleware('auth');
//RUTAS DE CATEGORIAS
Route::get('/CREAR-CATEGORIA', 'CategoriasController@index_create')->middleware('auth');
Route::post('/CREAR-CATEGORIA', 'CategoriasController@create')->middleware('auth');
Route::get('/EDITAR-CATEGORIAS', 'CategoriasController@index')->middleware('auth');
Route::post('/EDITAR-CATEGORIA/{categori}', 'CategoriasController@edit')->middleware('auth');
Route::patch('/EDITAR-CATEGORIA/{categori}', 'CategoriasController@update')->middleware('auth');
Route::post('/EDITAR-CATEGORIAS', 'CategoriasController@edit_categoria')->middleware('auth');
Route::delete('/ELIMINAR-CATEGORIA/{categori}', 'CategoriasController@destroy')->middleware('auth');

//RUTAS DE MODULO CLIENTES
Route::get('/CLIENTES', 'ClientsController@index')->middleware('auth');
Route::get('/CREAR-CLIENTE', 'ClientsController@index_new')->middleware('auth');
Route::post('/CREAR-CLIENTE', 'ClientsController@create')->middleware('auth');
Route::post('/EDITAR-CLIENTE/{clients}', 'ClientsController@edit')->middleware('auth');
Route::patch('/EDITAR-CLIENTE/{clients}', 'ClientsController@update')->middleware('auth');
Route::delete('/ELIMINAR-CLIENTE/{clients}', 'ClientsController@destroy')->middleware('auth');

//RUTAS MODULO TALLER
Route::get('/TALLER', 'RepairController@index')->middleware('auth');
Route::get('/TALLER/{clients}', 'RepairController@view_new_client')->middleware('auth');
Route::get('/CREAR-ORDEN', 'RepairController@view_new')->middleware('auth');
Route::get('/DETALLE-ORDEN/{id}', 'RepairController@detail')->middleware('auth');
Route::post('/GRABAR-ORDEN', 'RepairController@new')->middleware('auth');
Route::post('/ACTUALIZAR-ORDEN/{repair}', 'RepairController@update')->middleware('auth');
//RUTAS DE PRUEBA PDF
Route::get('/ejemplo/{id}', array (
    'as'=>'pdf',
    'uses'=>'RepairController@pdf'
    ));

//DROPZONE ROUTES
Route::post('/drop', 'DropzoneController@drop')->middleware('auth');

//RUTA FICTICIA DE IMG	
//php artisan storage:link 
 Route::get('/uploads/{file}', function ($file) {
    return Storage::response("uploads/$file");
})->where([
    'file' => '(.*?)\.(jpg|png|jpeg|gif)$'
])->middleware('auth');

//RUTAS DE AUTH CREADAS POR LARAVEL  
Auth::routes();
Route::get('/logout', function ()
{
    Auth::logout();
    return redirect('/');
})->middleware('auth');

//Route::get('HOME', 'HomeController@index')->name('home');
//RUTAS MODULO PROVEEDORES
Route::get('/PROVEEDORES', 'ProverController@index')->middleware('auth');
Route::get('/CREAR-PROVEEDOR', 'ProverController@new')->middleware('auth');
Route::post('/new-prover', 'ProverController@create')->middleware('auth');
Route::delete('/ELIMINAR-PROVER/{prover}', 'ProverController@destroy')->middleware('auth');
Route::get('/EDITAR-PROVER/{prover}', 'ProverController@edit')->middleware('auth');
Route::patch('/EDITAR-PROVER/{prover}', 'ProverController@update')->middleware('auth');

//RUTAS DE MODULO MARCAS
Route::get('/MARCAS', 'MarcasController@index')->middleware('auth');
Route::get('/CREAR-MARCA', 'MarcasController@new')->middleware('auth');
Route::post('/crear-marca', 'MarcasController@create')->middleware('auth');

//RUTAS MODULO DOLAR
Route::get('/DOLAR', 'DolarController@index')->middleware('auth');
Route::post('/new_dolar', 'DolarController@new')->middleware('auth');

//RUTAS DEL MOSTRADOR
//VENTA
Route::get('/mostrador/punto_venta', 'MostradorController@index');
//COMPRA
Route::get('/mostrador/punto_compra', 'MostradorController@compra');
Route::post('/mostrador/punto_compra/search_code', 'MostradorController@search_code');
Route::get('/mostrador/punto_compra/search_product/{id}', 'MostradorController@search_product');