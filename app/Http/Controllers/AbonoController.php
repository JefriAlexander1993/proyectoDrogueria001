<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente_abono;
use App\Repository\AbonoRepository;
use App\Repository\Cliente_abonoRepository;
use App\Repository\Cliente_creditoRepository;
use App\Http\Requests\FormRequestCreateAbono;




class AbonoController extends Controller
{
    protected $manure;
    protected $client_manure;
    protected $client_credit;
    
    public function __construct(AbonoRepository $manure, Cliente_abonoRepository $client_manure , Cliente_creditoRepository  $client_credit)
    {
        // Filtrar todos los métodos
        $this->middleware('auth');
        $this->manure = $manure;
        $this->client_manure = $client_manure;
        $this->client_credit = $client_credit;
    }
    

    public function index()
    {          
        return view('abono.index', ['cliente_abonos'=> $this->manure->sql_client_manure()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      
        return view('abono.create', ['clientes' => $this->manure->sql_clients()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormRequestCreateAbono $request)
    {      
           
            $manure = $this->manure->create_manure($request);
            $this->client_manure->create_client_manure($request, $manure->id);
             
            return redirect()->route('abono.index')->with('info', 'El abono fue guardado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  view('abono.show', ['client_manure'=> $this->client_manure->get_client_manure_credit($id)]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $this->manure->delete_manure($id);

        return back()->with('error', 'El  abono fue eliminado.');
    }
}
