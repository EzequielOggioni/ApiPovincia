<?php

class MensajeController{
    
    public function crear($request, $response, $args){

        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
        if (md5($args["id"]) != $ObjetoProvenienteDelFront->token)
        { 
             $response->getBody()->Write("token inválido");
            return $response;
        }
        
        $MiMensaje = new Mensaje();
        $MiMensaje->emisorId = $args["id"];
        $MiMensaje->receptorId = $args["idUsuario"];
        $MiMensaje->mensaje  =  $ObjetoProvenienteDelFront->mensaje;
        
        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
        
    
        $MiMensaje= MEnsajeDAO::CrearMEnsaje($MiMensaje);

        $response->getBody()->Write(json_encode($MiMensaje));
     
        return $response;
    }

    public function traerTodos($request, $response, $args){
        $ObjetoProvenienteDelFront =  json_decode($request->getBody());
        if (md5($args["id"]) != $ObjetoProvenienteDelFront->token)
        { 
             $response->getBody()->Write("token inválido");
            return $response;
        }
        
    $MiMensaje =   MensajeDAO::TraerTodos($args["id"], $args["idUsuario"]);


    $response->getBody()->Write(json_encode($MiMensaje));
     
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