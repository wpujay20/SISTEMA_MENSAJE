<?php

require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/TipoUsuarioBean.php';
require_once '../BEAN/UsuarioBean.php';
require_once '../BEAN/TrabajadorBean.php';
require_once '../BEAN/AreasBean.php';



class GestionDAO{
    
     public function Listar_usuarios(){
            
        $instanciaCompartida = ConexionBD::getInstance();
        $sql = "
           Select * from trabajador as tra inner join usuario as usu on tra.id_usu=usu.id_usu inner join tipo_usuario as tip on tip.id_tipo_usu=usu.id_tipo_usu
            ;
            ";
            
        $rs = $instanciaCompartida->ejecutar($sql);
        $array = $instanciaCompartida->obtener_filas($rs);
        
        $instanciaCompartida->setArray(null);
        
        return $array;
    }
    
    
    
 public function InsertarTrabajador(TrabajadorBean $objTrabajadorBean){
        try {
        
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "INSERT INTO trabajador (id_usu,nombre,apellido,dni)"
                    . "VALUES (2,'$objTrabajadorBean->trab_nombre','$objTrabajadorBean->trab_apellido',$objTrabajadorBean->trab_dni);";
            
            $estado = $instanciacompartida->EjecutarConEstado($sql);
              $objTrabajadorBean->ID_trabajador = $instanciacompartida->Ultimo_ID();
              
            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }
    
    
        public function InsertarTipoUsuario(TipoUsuarioBean $objTipoUsuarioBean ){
        try {
        
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "INSERT INTO tipo_usuario (tipo_nombre,tipo_descripcion) "
                    . "VALUES ('$objTipoUsuarioBean->tipo_nombre','$objTipoUsuarioBean->tipo_descripcion');";
            
            $estado1 = $instanciacompartida->EjecutarConEstado($sql);
            
              $objTipoUsuarioBean->id_tipo_usu = $instanciacompartida->Ultimo_ID();

            return $estado1;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
        }
    
        public function InsertarUsuario(TipoUsuarioBean $objTipoUsuarioBean ,UsuarioBean $objUsuarioBean ){
        try {
        
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "INSERT INTO usuario (id_tipo_usu,usu_nombre,usu_contra) "
                    . "VALUES (2,'$objUsuarioBean->usu_nombre','$objUsuarioBean->usu_contra');";
            
            $estado2 = $instanciacompartida->EjecutarConEstado($sql);
            
                $objUsuarioBean->id_usu = $instanciacompartida->Ultimo_ID();

            return $estado2;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }
    
    
    
    public function ElimianrColaborador($id_trabajador2){
        try {
        
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE FROM colaborador WHERE id_trabajador = $id_trabajador2";
            $estado = $instanciacompartida->EjecutarConEstado($sql);
            
            echo $sql;

            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }  
    }
    
    
        public function ElimianrTrabajador($id_trabajador2){
        try {
        
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "DELETE FROM trabajador WHERE id_trabajador = $id_trabajador2";
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            echo $sql;
            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }  
    }
    
    public function HabilitarUsuario($id_usu){
        try {
        
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE usuario set estado='habilitado' WHERE id_usu = $id_usu";
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            echo $sql;
            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }  
    }
    
        public function InhabilitarUsuario($id_usu){
        try {
        
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE usuario set estado='inhabilitado' WHERE id_usu = $id_usu";
            $estado = $instanciacompartida->EjecutarConEstado($sql);

            echo $sql;
            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }  
    }
    
   // FUNCIO PARA VALIDAR EL ESADO DE USUSARIO
        public function ValidarEstado(UsuarioBean $UsuarioBean ){
        try {
        
            $instancia = ConexionBD::getInstance();
            $sql = "SELECT usu.estado from usuario as usu 
                 WHERE usu.usu_nombre = '$UsuarioBean->usu_nombre' and usu.usu_contra='$UsuarioBean->usu_contra';";
           
          
            
            $res = $instancia->EjecutarConEstado($sql);
             $estado = $instancia->obtener_filas($res);
   

            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }

    
    }
    
    
}

