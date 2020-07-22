<?php

require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/TrabajadorBean.php';
require_once '../BEAN/UsuarioBean.php';

class TrabajadorDAO {
       public function Registrar_Trabajador(UsuarioBean $UsuarioBean, TrabajadorBean $TrabajadorBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO trabajador(id_usu, nombre, apellido, dni) 
                 VALUES ($UsuarioBean->id_usu,'$TrabajadorBean->trab_nombre','$TrabajadorBean->trab_apellido','$TrabajadorBean->trab_dni');
                ";
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        
        $TrabajadorBean->ID_trabajador = $instanciacompartida->Ultimo_ID();
       
        return $estado;
    }
    
      public function ActualizarTrabajo( TrabajadorBean $TrabajadorBean) {

         try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE trabajador set   nombre='$TrabajadorBean->trab_nombre', apellido ='$TrabajadorBean->trab_apellido',
                     dni=$TrabajadorBean->trab_dni
                     WHERE id_trabajador=$TrabajadorBean->ID_trabajador ;
";

            $estado = $instanciacompartida->EjecutarConEstado($sql);
            echo $sql;
            
            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }
    
    
}
