<?php

abstract class Localidad
{
    public  $nombre;

     function __construct(){
      
    }

    abstract function  MostrarValor();

    function mostrarNumero10(){
        return 10;
    }

}


?>