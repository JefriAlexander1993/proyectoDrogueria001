<?php

namespace App\Observers;

use App\Cliente_abono;
use Illuminate\Http\Request;

class Cliente_abonoObserver
{
    /**
     * Handle the cliente_abono "created" event.
     *
     * @param  \App\Cliente_abono  $clienteAbono
     * @return void
     */
    public function created(Request $request)
    {
  
    }

    /**
     * Handle the cliente_abono "updated" event.
     *
     * @param  \App\Cliente_abono  $clienteAbono
     * @return void
     */
    public function updated(Cliente_abono $clienteAbono)
    {
        //
    }

    /**
     * Handle the cliente_abono "deleted" event.
     *
     * @param  \App\Cliente_abono  $clienteAbono
     * @return void
     */
    public function deleted(Cliente_abono $clienteAbono)
    {
        //
    }

    /**
     * Handle the cliente_abono "restored" event.
     *
     * @param  \App\Cliente_abono  $clienteAbono
     * @return void
     */
    public function restored(Cliente_abono $clienteAbono)
    {
        //
    }

    /**
     * Handle the cliente_abono "force deleted" event.
     *
     * @param  \App\Cliente_abono  $clienteAbono
     * @return void
     */
    public function forceDeleted(Cliente_abono $clienteAbono)
    {
        //
    }
}
