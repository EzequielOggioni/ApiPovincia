<?php   

    class Ciudad extends Localidad implements IInterfaz {
  
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
            return Ciudad::$cantidad.$this->nombre;
        }

        public static function RetornarCantidad(){
            return Ciudad::$cantidad;
        }

        public function MostrarValor(){
            return $this->valor;
        }

        public static function obtenerTodos()
        {
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("SELECT id as valor, nombre FROM Ciudads");
            $consulta->execute();
    
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'Ciudad');
        }

        public  function CrearUsuario()
        {
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `Ciudads`(`ID`, `Nombre`) VALUES (?,?)");
            
            $this->autor;
            $consulta->execute();
    
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'Ciudad');
        }

        public function __construct(){
            parent::__construct();
            $this->departamentos =  array();
            
            Ciudad::$cantidad++;
        }

        
    }

?>