<?php
    class Singleton 
    {
        private static $singleton;
        
        private function __construct(){

        }

        public static function GetInstance(){
            if(!isset(Singleton::$singleton))
                Singleton::$singleton = new Singleton();
            return Singleton::$singleton;
        }
        function mostrarAlgo(){
            return "algo";
        }




        
    }
    


?>