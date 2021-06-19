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


public function LeerJSONPost($request, $response, $args){
    // parametro que llego por el ruteo
     $valor =  $args['param'];
   
    //$response->getBody()->Write($valor);
    //objeto enviado via FormData
     //$listaDeParametros = $request->getParsedBody();
     //$response->getBody()->Write($listaDeParametros['pass']);
    //El dato llega por el body como texto
  
    $ObjetoProvenienteDelFront =  json_decode($request->getBody());
    //var_dump($ObjetoProvenienteDelFront);

        //recorro los valores del objeto
        $MiUsuario = new Usuario();
        foreach ($ObjetoProvenienteDelFront as $atr => $valueAtr) {
            $MiUsuario->{$atr} = $valueAtr;
        }


    $response->getBody()->Write(json_encode($MiUsuario));

    return $response;
}


}
?>