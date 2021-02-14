<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    // Mail::to('bbac4f60d2-440227@inbox.mailtrap.io')->send(new App\Mail\newMail);
    return redirect('login');
});

Auth::routes();
// Se le agrego 'verify'=>true
Auth::routes(['verify' => true]);
// Luego se registra mailtrap
//Luego se hace este procedimiento
//En el archivo EventServiceProvider se agrego un codigo que está en la documentación

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::middleware(['verified'])->group(function () {

    Route::resource('proveedor', 'ProveedorController');
    Route::resource('venta', 'VentasController');
    Route::post('venta/cliente', 'VentasController@storeCliente')->name('venta.storeCliente');

    Route::get('venta/cliente/{nuip}', 'ClienteController@update')->name('venta.cliente.update');

    Route::resource('cliente', 'ClienteController');

    Route::resource('compra', 'CompraController');
    Route::resource('articulo', 'ArticuloController');
    Route::get('perfil/{id}', 'PerfilController@show')->name('perfil.show');
    Route::get('perfil/{id}/edit', 'PerfilController@edit')->name('perfil.edit');
    Route::put('perfil/{id}', 'PerfilController@update')->name('perfil.update');
    // Route::resource('perfil', 'PerfilController');

    Route::resource('abono', 'AbonoController');
    Route::resource('credito', 'CreditosController');
    Route::resource('role', 'RoleController');
    Route::resource('permission_role', 'PermissionRoleController');
    Route::resource('role_user', 'RoleUserController');
    Route::resource('permission', 'PermissionController');
    Route::resource('user', 'UserController');

    Route::get('/inventario', 'InventarioController@index')->name('inventario.index');
    // Route::get('perfil/reset', 'PerfilController@reset');

    // Ruta de busqueda.
    Route::get('articulo/getArticulo/{codigo}', 'ArticuloController@getArticuloByCodigo')->name('articulo.getcodigo');

    // Ruta de busquedad de venta
    Route::get('venta/getVenta/{id}', 'VentasController@getVentaById')->name('venta.getid');
    // Ruta de busqueda.
    Route::get('venta/agregar_producto_editar_venta/{codigo}/{id_venta}', 'VentasController@find_producto_edit_venta')->name('venta.find_producto_edit_venta');

     // Ruta de busquedad de compra
     Route::get('compra/getCompra/{id}', 'CompraController@getCompraById')->name('compra.getid');
     Route::get('compra/agregar_producto_editar_compra/{codigo}/{id_compra}', 'CompraController@find_producto_edit_compra')->name('venta.find_producto_edit_compra');



    Route::get('cliente/getClient/{nuip}', 'ClienteController@getClientByNuip')->name('cliente.getnuip');

    // Ruta de busqueda credito.
    Route::get('credito/getCredito/{id}', 'CreditosController@getCreditByNuip')->name('credito.getid');

    //backup
    Route::get("/backup", function () {

        Artisan::call('backup:run --only-db');
        return back()->with('info', 'La copia de seguridad se ha creado exitosamente.');
    })->name('backup.segurity');
    //pdf
    Route::get("/cajapdf", "PdfController@cajasPDF");
    Route::get("/proveedorpdf", "PdfController@proveedoresPDF");
    Route::get("/compraspdf", "PdfController@comprasPDF");
    Route::get("/articulopdf", "PdfController@articulosPDF");
    Route::get("/clientepdf", "PdfController@clientesPDF");
    Route::get("/facturapdf", "PdfController@facturaPDF");
    Route::get("facturapdf/{id}", "PdfController@facturaPDF")->name('facturapdf');
    Route::get('sales/{year}','VentasController@generate_chart_sale_month');
});
