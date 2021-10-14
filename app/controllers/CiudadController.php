<?php

class CiudadController{

public function RetornarCiudads($request, $response, $args){
/*
    $listaPcias =  json_decode(Archivos::leerArchivo('uploads/Ciudades.json'));
        
    $arratCiudads = array();
    //recorro los objetos de la lista
    foreach ($listaPcias as  $objStandar) {
        //recorro los valores del objeto
        $tempPcia = new Ciudad();
        foreach ($objStandar as $atr => $valueAtr) {
            $tempPcia->{$atr} = $valueAtr;
        }
        array_push($arratCiudads,$tempPcia);
        
    }
    
   */
  $arratCiudads = Ciudad::obtenerTodos();
 $response->getBody()->Write(json_encode($arratCiudads));
//  $response->getBody()->Write("");
 

  return $response ->withHeader('Content-Type', 'application/json');;

}

public function RetornarDepartamentos($request, $response, $args){
    
    $CiudadId = $args['CiudadId'];
    
    $listaDptos =  json_decode(Archivos::leerArchivo('uploads/Dpto'.$CiudadId.'.json'));
        
    $arratCiudads = array();
    //recorro los objetos de la lista
    foreach ($listaDptos as  $objStandar) {
        //recorro los valores del objeto
        $tempPcia = new Ciudad();
        foreach ($objStandar as $atr => $valueAtr) {
            $tempPcia->{$atr} = $valueAtr;
        }
        array_push($arratCiudads,$tempPcia);
        
    }
    
  $response->getBody()->Write(json_encode($arratCiudads));

  return $response;


}
public function RetornarPost($request, $response, $args){
    
    $valor =  $request->getParsedBody();
  //  var_dump($valor);
    $response->getBody()->Write($valor['mensaje']);

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

    //    $retorno =  $MiUsuario->CrearUsuario();
   
       
   

    $response->getBody()->Write(json_encode($ObjetoProvenienteDelFront));

    return $response;
}

public function RetornarImagen($request, $response, $args){
    $valorImagen = $args['CiudadId'];
    $imagen = "";    

    switch ($valorImagen) {
        case '2':
            $imagen =  "/Img/MiImagen.png";
            break;
        case '06':
            $imagen =  "/Img/06.jpg";
            break;
        case '14':
            $imagen =  "/Img/14.png";
            break;

        case '42':
            $imagen =  "/Img/42.png";
            break;
        case '82':
            $imagen =  "/Img/82.png";
            break;
                    
        default:
            $imagen =  "/Img/404.jpg";
            break;
                    
        }

    $response->getBody()->Write($imagen);

    return $response;


}

}


