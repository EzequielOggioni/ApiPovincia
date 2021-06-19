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

        public static function obtenerTodos()
        {
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("SELECT id as valor, nombre FROM provincias");
            $consulta->execute();
    
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'Provincia');
        }

        public  function CrearUsuario()
        {
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `provincias`(`ID`, `Nombre`) VALUES (?,?)");
            
            $this->autor;
            $consulta->execute();
    
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'Provincia');
        }

        public function __construct(){
            parent::__construct();
            $this->departamentos =  array();
            
            Provincia::$cantidad++;
        }

        
    }

?>