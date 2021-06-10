<?php

class UsuarioController{

public function RetornarUsuario($request, $response, $args){

    $usr=  new Usuario();

    
    $usr->nombre = "Ezequiel";
    $usr->apellido = "Oggioni";
    $usr->pathImagen = "imagen54.jpg";
    
    $response->getBody()->Write(json_encode($usr) );

    return $response;
}

}


?>