<?php

require_once '../UTILS/ConexionBD.php';

class AreasDAO {

    public function ListarAreas() {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM area";

        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        $instanciacompartida->setArray(null);
        return $lista;
    }

    // área del jefe
    public function ListarAreaPorID($idTrabajador) {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT a.area_nombre FROM jefe as je inner JOIN area as a
                    on je.id_area = a.id_area INNER JOIN trabajador as tra
                    on je.id_trabajador = tra.id_trabajador
                    WHERE tra.id_trabajador =$idTrabajador";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
            $instanciacompartida->setArray(null);
            return $lista;
        } catch (Exception $ex) {
            
        }
    }

    //área del colaborador
    public function ListarAreaPorIDCol($idTrabajador) {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT a.area_nombre FROM colaborador as col inner JOIN area as a
                    on col.id_area = a.id_area INNER JOIN trabajador as tra
                    on col.id_trabajador = tra.id_trabajador
                    WHERE tra.id_trabajador =$idTrabajador";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
            $instanciacompartida->setArray(null);
            return $lista;
        } catch (Exception $ex) {
            
        }
    }

    //Función para Listar todos los jefes 
    public function ListarJefesPorArea() {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM jefe as je inner JOIN area as a
                    on je.id_area = a.id_area INNER JOIN trabajador as tra
                    on je.id_trabajador = tra.id_trabajador  
                    ORDER BY `a`.`id_area` ASC";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
            $instanciacompartida->setArray(null);
            return $lista;
        } catch (Exception $ex) {
            
        }
    }
    
    //Funcion para listar los colaboradores de cada Jefe
      public function ListarLosColaboradoresDeCadaArea($idArea) {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM colaborador as col inner JOIN area as a
                    on col.id_area = a.id_area INNER JOIN trabajador as tra
                    on col.id_trabajador = tra.id_trabajador  INNER JOIN jefe
                    on jefe.id_area = a.id_area 
                    WHERE jefe.id_area=$idArea";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
            $instanciacompartida->setArray(null);
            return $lista;
        } catch (Exception $ex) {
            
        }
    }
    
    //función para saber cuantos empleados hay en cada área
       public function NumeroDeColaboradoresEnUnaArea($idArea) {
        try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT COUNT(*) FROM colaborador as col inner JOIN area as a
                    on col.id_area = a.id_area INNER JOIN trabajador as tra
                    on col.id_trabajador = tra.id_trabajador  INNER JOIN jefe
                    on jefe.id_area = a.id_area 
                    WHERE jefe.id_area=$idArea";
            $res = $instanciacompartida->ejecutar($sql);
             $lista = $instanciacompartida->obtener_filas($res);
            $instanciacompartida->setArray(null);
            return  $lista;
        } catch (Exception $ex) {
            
        }
    }
    
    

}
