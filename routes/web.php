<?php
use App\Http\Middleware\CheckPermission;

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
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/error', 'ErrorController@index')->name('home');


Auth::routes();
  
        Route::resource('proveedor','ProveedorController');
        Route::resource('venta','VentasController');
        Route::resource('cliente','ClienteController');
        Route::resource('caja','CajaController'); 
        Route::resource('producto', 'ProductosController');
        Route::resource('articulo', 'ArticuloController');
        Route::get("/cajapdf","PdfController@cajasPDF");  
        Route::get("/proveedorpdf","PdfController@proveedoresPDF");  
        Route::get("/productopdf","PdfController@productosPDF");  
   