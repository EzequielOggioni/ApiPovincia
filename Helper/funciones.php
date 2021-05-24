
<?php


    function mostrarValor($parametro="Por defecto"){
        echo "<br>";
        echo $parametro;
        return 5;
    }

    function crearArchivo($nombre){
        //r
        //w
        //a


        $arch = fopen($nombre,'w');

        fclose($arch);

    }


    function leerArchivo($nombre){
        //r
        $salida ="";
        $arch = fopen($nombre,'r');

        //mostrarValor(fread($arch,filesize($nombre)));

        while (!feof($arch)){

            $salida .= fgets($arch);
        }
        

        fclose($arch);

        return $salida ;

    }


    function escribirArchivo($nombre, $texto){
        //r

        $arch = fopen($nombre,'a');

        fwrite($arch,$texto);
        fputs($arch,$texto);
        

        fclose($arch);
        copy($nombre, 'log.txt');
        unlink($nombre);
    }


    



?>