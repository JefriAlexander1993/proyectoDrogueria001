<?php

namespace App\Observers;

use App\Articulo;

class ArticuloObserver
{
    /**
     * Handle the articulo "created" event.
     *
     * @param  \App\Articulo  $articulo
     * @return void
     */
    public function created(Articulo $articulo)
    {
         
      
    }

    /**
     * Handle the articulo "updated" event.
     *
     * @param  \App\Articulo  $articulo
     * @return void
     */
    public function updated(Articulo $articulo)
    {
        //
    }

    /**
     * Handle the articulo "deleted" event.
     *
     * @param  \App\Articulo  $articulo
     * @return void
     */
    public function deleted(Articulo $articulo)
    {
        //
    }

    /**
     * Handle the articulo "restored" event.
     *
     * @param  \App\Articulo  $articulo
     * @return void
     */
    public function restored(Articulo $articulo)
    {
        //
    }

    /**
     * Handle the articulo "force deleted" event.
     *
     * @param  \App\Articulo  $articulo
     * @return void
     */
    public function forceDeleted(Articulo $articulo)
    {
        //
    }
}
