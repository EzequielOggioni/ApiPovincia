<?php

    class Usuario{
        public $nombre;
        public $apellido;
        public $usuario;
        public $pass;
        public $id;
        public $token;

        public function __Construct()
        {
           
        }

        public function generarToken(){
            $this->$token =  md5($this->$id);
        }
    }

?>