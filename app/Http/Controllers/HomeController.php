<?php

namespace App\Http\Controllers;
use App\Venta;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
    
        $años = [];
     
        
        for ($i=0; $i < 6; $i++) { 
           $a= 2015 +$i;
            array_push($años,$a); 
        }
     
        return view('home',compact('años'));
    }

}
