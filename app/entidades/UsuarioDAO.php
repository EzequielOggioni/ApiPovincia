<?php

    class UsuarioDAO{

        public static function CrearUsuario(Usuario $user)
        {
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `usuario`( `nombre`, `apellido`, `pass`, `usuario`) VALUES (?,?,?,?)");
            $consulta->bindParam(1, $user->nombre);
            $consulta->bindParam(2, $user->apellido);
            $consulta->bindParam(3, $user->pass);            
            $consulta->bindParam(4, $user->usuario);

            $consulta->execute();
    
            $id = $objAccesoDatos->obtenerUltimoId();
    
            $consulta = $objAccesoDatos->prepararConsulta("select `nombre`, `apellido`, `id`, `usuario` from  `usuario` where `id` = ? ");
            $consulta->bindParam(1, $id);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
        }

        public static function ValidarUsuario(Usuario $user)
        {

            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("select `nombre`, `apellido`, `id`, `usuario` from  `usuario` where `usuario` = ? and `pass` = ? ");
            $consulta->bindParam(1, $user->usuario);
            $consulta->bindParam(2, $user->pass);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
        }

        public static function TraerTodos(int $userId)
        {

            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("select `nombre`, `apellido`, `id`, `usuario` from  `usuario` where `id` != ? ");
            $consulta->bindParam(1, $userId);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
        }
    }

?>