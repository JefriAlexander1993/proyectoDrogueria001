<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;



class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
 
  

    public function index()
    {
        $productos = Producto::orderBy('id', 'DESC')->paginate();;
        // return $productos;
        return  view('producto.index', compact('productos'));// SE carga en vista y le pasamos la variable
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $product = new Producto;/*Crear un instancia*/
        $product->fechaLlegada= $request->fechaLlegada;
        $product->nombre= $request->nombre;
        $product->precioCompra= $request->precioCompra;
        $product->cantidad= $request->cantidad;
        $product->iva= $request->iva;
        $product->precioVenta= $request->precioVenta;
        $product->fechaVencimiento= $request->fechaVencimiento;
        $product->nombreProveedor= $request->nombreProveedor;
        $product->stock= $request->stock;


     /*$request->Validacion*/
        $product->save();
        return redirect()->route('producto.index')
        ->with('info', 'El producto fue guardado.');
//*Guardado todos los camppos guardados y mira si todos los capos son validos*//

        return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Producto::find($id); // Busca un Producto por medio del  id-
         return view('producto.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $product = Producto::find($id); // Busca un Producto por medio del  id-
        
        return view('producto.edit', compact('product'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        
        $product =Producto::find($id);/*Buscar en Product*/
        $product->fechaLlegada= $request->fechaLlegada;
        $product->nombre=$request->nombre;
        $product->precioCompra=$request->precioCompra;
        $product->cantidad=$request->cantidad;
        $product->iva=$request->iva;
        $product->precioVenta=$request->precioVenta;
        $product->fechaVencimiento=$request->fechaVencimiento;
        $product->nombreProveedor=$request->nombreProveedor;
        $product->stock=$request->stock;
     /*$request->Validacion*/
        $product->save();
        return redirect()->route('producto.index')
        ->with('info', 'El producto fue actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product = Producto::find($id);
        $product->delete();
        return back()->with('info', 'El producto fue eliminado');
    }
}
