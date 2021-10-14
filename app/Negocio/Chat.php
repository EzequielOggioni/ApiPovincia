
<?php

class Chat
{
    private static $instance;

    private $usuarios;

    private function __construct()
    {
        $this->$usuarios = array(); 
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function agregarUsuario(Usuario $nuevoUser)
    {
        array_push( $this->$usuarios, $nuevoUser);
    }

    public function getCounter()
    {
        return $this->counter;
    }
}

?>