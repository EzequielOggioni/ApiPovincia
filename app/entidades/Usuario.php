<?php

    class Usuario{
        public $nombre;
        public $apellido;
        public $pathImagen;
        public $usuario;
        public $pass;

        public function __Construct()
        {
            $this->nombre ="Ezequiel";
            $this->apellido ="Oggioni";
            $this->pathImagen ="photo.bmp";
            $this->usuario ="eoggioni";
            $this->pass ="123456";
        }

    }

?>