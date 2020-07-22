<?php

require_once '../BEAN/JefeBean.php';
require_once '../BEAN/AreasBean.php';
require_once '../BEAN/Detalle_Informe_Bean.php';
require_once '../BEAN/TrabajadorBean.php';
require_once '../UTILS/ConexionBD.php';

class JefeDAO {

    public function Registrar_Jefe(AreasBean $AreasBean, TrabajadorBean $TrabajadorBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO jefe(id_area, id_trabajador) VALUES ($AreasBean->id_area,$TrabajadorBean->ID_trabajador)";
        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;
    }
    
    public function ActualizarJefe(AreasBean $AreasBean, TrabajadorBean $TrabajadorBean) {

         try {
           $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE colaborador as c inner join trabajador as tra on tra.id_colaborador=c.id_colaborador  inner join area as a on a.id_area=c.id_area set  c.id_area =$AreasBean->id_area, "
                  . " WHERE tra.id_trabajador =$TrabajadorBean->ID_trabajador;"
                  ;

            $estado = $instanciacompartida->EjecutarConEstado($sql);
           
            
            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }
    
    
    
    
    public function AgregarDettale_informe(Detalle_Informe_Bean $DetalleInformeBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO detalle_informe(id_jefe, titulo_desc, desc_det, asunto_det) 
                VALUES ($DetalleInformeBean->id_jefe, '$DetalleInformeBean->titulo_desc', '$DetalleInformeBean->descripcion', '$DetalleInformeBean->asunto')";
        
        $estado = $instanciacompartida->EjecutarConEstado($sql);
        
        $DetalleInformeBean->setId_detalle_informe($instanciacompartida->Ultimo_ID());

        return $estado;
    }
    
    
    public function AñadirDetalle(Detalle_Informe_Bean $DetalleInformeBean, $id_informe) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "UPDATE informe SET id_det_inf = $DetalleInformeBean->id_detalle_informe WHERE id_informe=$id_informe";
        $estado = $instanciacompartida->EjecutarConEstado($sql);
       
        return $estado;
    }

    public function Listar_Informes_JEFE_PRELIMINAR() {

        $instanciaCompartida = ConexionBD::getInstance();
        $sql = "
            SELECT *  FROM informe as inf 
            INNER JOIN colaborador as col on col.id_colaborador=inf.id_colaborador 
            INNER JOIN area as area on col.id_area=area.id_area 
            INNER JOIN actividad as act on act.id_informe=inf.id_informe
            INNER JOIN rubro as rub on rub.id_rubro=act.id_rubro
            INNER JOIN estado_informe as est on est.id_estado_inf=inf.id_estado_inf 
            INNER JOIN periodo as per ON per.id_periodo=inf.id_periodo
            INNER JOIN trabajador as trab on trab.id_trabajador=col.id_trabajador
            INNER JOIN tipo_actividad as tac on tac.id_tipo_act=act.id_tipo_act
            WHERE area.id_area = " . $_SESSION['id_area'] . "
            AND inf.id_estado_inf  BETWEEN 2 AND 4
            GROUP by inf.id_informe
            ";

        $rs = $instanciaCompartida->ejecutar($sql);
        $array = $instanciaCompartida->obtener_filas($rs);

        return $array;
    }

    public function Listar_Informes_JEFE_CONOSOLIDAR() {

        $instanciaCompartida = ConexionBD::getInstance();
        $sql = "
            SELECT *  FROM informe as inf 
            INNER JOIN colaborador as col on col.id_colaborador=inf.id_colaborador 
            INNER JOIN area as area on col.id_area=area.id_area 
            INNER JOIN actividad as act on act.id_informe=inf.id_informe
            INNER JOIN rubro as rub on rub.id_rubro=act.id_rubro
            INNER JOIN estado_informe as est on est.id_estado_inf=inf.id_estado_inf 
            INNER JOIN periodo as per ON per.id_periodo=inf.id_periodo
            INNER JOIN trabajador as trab on trab.id_trabajador=col.id_trabajador
            INNER JOIN tipo_actividad as tac on tac.id_tipo_act=act.id_tipo_act
            WHERE area.id_area = " . $_SESSION['id_area'] . "
            AND inf.id_estado_inf BETWEEN 2 and 3
            GROUP by inf.id_informe"
        ;

        $rs = $instanciaCompartida->ejecutar($sql);
        $array = $instanciaCompartida->obtener_filas($rs);

        return $array;
    }

    public function ActualizarInformeOK($id_informe, $op) {

        $instanciaCompartida = ConexionBD::getInstance();

        switch ($op) {
            case 1: { //APROBAR UN INFORRME
                    $sql = "UPDATE informe SET id_estado_inf = 3 WHERE id_informe = $id_informe";
                    $estado = $instanciaCompartida->EjecutarConEstado($sql);
                    break;
                }

            case 2: { //ENVIAR A RRHH 
                    $sql = "UPDATE informe SET id_estado_inf = 4 WHERE id_informe = $id_informe";
                    $estado = $instanciaCompartida->EjecutarConEstado($sql);

                    break;
                }
        }
        return $estado;
    }

    public function ActualizarInforme_BACK($id_informe, $op) {

        $instanciaCompartida = ConexionBD::getInstance();

        switch ($op) {
            case 1: { //RECHAZAR UN INFORME Y PASARLO A GENERADO
                    $sql = "UPDATE informe SET id_estado_inf = 1 WHERE id_informe = $id_informe";
                    $estado = $instanciaCompartida->EjecutarConEstado($sql);
                    break;
                }
            case 2: { //DESAPROBAR UN INFORME Y PASARLO A ENVADO A JEFATURA
                    $sql = "UPDATE informe SET id_estado_inf = 2 WHERE id_informe = $id_informe";
                    $estado = $instanciaCompartida->EjecutarConEstado($sql);
                    break;
                }
        }
        return $estado;
    }

}
