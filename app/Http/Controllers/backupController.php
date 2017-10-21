<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class backupController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function index(){

        $dbhost = 'localhost';
        $dbname = 'usandoentrust';
        $dbuser = 'root';
        $dbpass = '';
         
        $backup_file = $dbname. "-" .date("Y-m-d-H-i-s"). ".sql";
         
        // comandos a ejecutar
        $commands = array(
                "mysqldump --opt -h $dbhost -u $dbuser -p$dbpass -v $dbname > $backup_file",
              "bzip2 $backup_file"
        );
         
        // ejecución y salida de éxito o errores
        foreach ( $commands as $command ) {
                system($command,$output);
                echo $output;
        }
     }
   

    



}