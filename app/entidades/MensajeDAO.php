<?php

    class MensajeDAO{

        public static function CrearMensaje(Mensaje $men)
        {
            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            $consulta = $objAccesoDatos->prepararConsulta("INSERT INTO `mensaje`( `emisorId`, `receptorId`, `mensaje`, `fechaHora`) VALUES (?,?,?,now())");
            $consulta->bindParam(1, $men->emisorId);
            $consulta->bindParam(2, $men->receptorId);
            $consulta->bindParam(3, $men->mensaje);            
            $consulta->bindParam(4, $men->fechaHora);

            $consulta->execute();
    
            $id = $objAccesoDatos->obtenerUltimoId();
    
            $consulta = $objAccesoDatos->prepararConsulta("select * from  `mensaje` where `idd` != ? ");
            $consulta->bindParam(1, $userId);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'Mensaje');
        }

       public static function TraerTodos(int $userId, int $desId)
        {

            $objAccesoDatos = AccesoDatos::obtenerInstancia();
            
            $consulta = $objAccesoDatos->prepararConsulta("select  `id`,`emisorId`, `receptorId`, `mensaje`, `fechaHora` from  `mensaje` where (`emisorId` = :id and  `receptorId` = :usuarioId) or (`emisorId` = :usuarioId and  `receptorId` = :id) order by fecha desc  ");
            $consulta->bindParam(':id', $userId);
            $consulta->bindParam(':usuarioId', $desId);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_CLASS, 'Usuario');
        }
    }

?>