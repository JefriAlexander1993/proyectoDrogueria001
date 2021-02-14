<?php

use Illuminate\Http\Request;
use App\Venta;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
});



// Route::get('/ventas/{año}', function ($años) {
        
		// $ayer_ventas = Venta::whereDate('created_at', today()->subDays(1))->sum('totalventa');
        // $hoy_ventas =  Venta::whereDate('created_at', today())->sum('totalventa');
        // $semanal_ventas = Venta::whereDate('created_at', today()->subDays(7))->sum('totalventa');
		
        // $mensual_ventas= Venta::whereDate('created_at', today()->subDays(31))->sum('totalventa');
       
    //    return response()->json ([
	// 	       'ayer_ventas'=>$enero,
	// 	    //    'hoy_ventas'=>$hoy_ventas,
		    //    'semanal_ventas'=>$semanal_ventas,
		    //    'mensual_ventas'=>$mensual_ventas,
// 		'code'=>200
//        ]);
// });





