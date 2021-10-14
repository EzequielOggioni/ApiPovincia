<?php

class UsuarioController{
    
    public function crear($request, $response, $args){

        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
        
    
            //recorro los valores del objeto
            $MiUsuario = new Usuario();
            foreach ($ObjetoProvenienteDelFront as $atr => $valueAtr) {
                $MiUsuario->{$atr} = $valueAtr;
            }
    
        $MiUsuario= UsuarioDAO::CrearUsuario($MiUsuario);

        $response->getBody()->Write(json_encode($MiUsuario));
     
        return $response;
    }

public function loguear($request, $response, $args){

    $ObjetoProvenienteDelFront =  json_decode($request->getBody());
    //var_dump($ObjetoProvenienteDelFront);

        //recorro los valores del objeto
        $MiUsuario = new Usuario();
        foreach ($ObjetoProvenienteDelFront as $atr => $valueAtr) {
            $MiUsuario->{$atr} = $valueAtr;
        }

        $MiUsuario =   UsuarioDAO::ValidarUsuario($MiUsuario);

        foreach ($MiUsuario as $usr) {
            $usr->generarToken();
        }

    $response->getBody()->Write(json_encode($MiUsuario));
     
    return $response;
}

    public function traerTodos($request, $response, $args){
        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
        if (md5($args["id"]) != $ObjetoProvenienteDelFront["token"])
        return $response;
        
    $MiUsuario =   UsuarioDAO::TraerTodos($args["id"]);


    $response->getBody()->Write(json_encode($MiUsuario));
     
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