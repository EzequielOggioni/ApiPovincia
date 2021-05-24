<?php   

    class Provincia extends Localidad implements IInterfaz {
  
        //atributos
        public $valor;
        public static $cantidad=0;
        public $departamentos;


        //metodos
        public function GetNombre(){
            
            return $this->nombre;
         }

         public function AgregarDptp($dpto){
            $this->departamentos[$dpto->Numero] = $dpto; 
         }
        
         public function mostrarCantidad(){
            return Provincia::$cantidad.$this->nombre;
        }

        public static function RetornarCantidad(){
            return Provincia::$cantidad;
        }

        public function MostrarValor(){
            return $this->valor;
        }

        function mostrarNumero10(){
            return parent::mostrarNumero10() + 10;
        }
        function metodo(){
            
        }
        public function __construct(){
            parent::__construct();
            $this->departamentos =  array();
            
            Provincia::$cantidad++;
        }

        
    }

?>