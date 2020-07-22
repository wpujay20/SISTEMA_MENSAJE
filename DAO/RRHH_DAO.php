 <?php

require_once '../BEAN/TrabajadorBean.php';
require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/UsuarioBean.php';
require_once '../BEAN/AreasBean.php';
require_once '../BEAN/RRHH_Bean.php';

class RRHH_DAO {
    public function Registrar_RRHH(AreasBean $AreasBean, TrabajadorBean $TrabajadorBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO jefe(id_area, id_trabajador) VALUES ($AreasBean->id_area,$TrabajadorBean->ID_trabajador)";
        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;
    }
    
      public function ActualizarRRHH(AreasBean $AreasBean, TrabajadorBean $TrabajadorBean) {

         try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE jefe as j inner join area as a on j.id_jefe=a.id_area inner join trabajador as tra on tra.id_trabajador=j.id_trabajador set  c.id_area =$AreasBean->id_area, "
                  . " WHERE a.id_trabajador =$TrabajadorBean->id_trabajador;"
                 ;

            $estado = $instanciacompartida->EjecutarConEstado($sql);
           
            
            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }
    
    
     public function Listar_Informes_RR_HH(){
            
        $instanciaCompartida = ConexionBD::getInstance();
        $sql = "
            SELECT * from informe as  inf 
            INNER join detalle_informe as det on det.id_det_inf=inf.id_det_inf
            INNER join jefe as jef on jef.id_jefe=det.id_jefe
            INNER join trabajador as trab on trab.id_trabajador=jef.id_trabajador
            INNER join area as area on area.id_area=jef.id_area
            INNER join estado_informe as est on inf.id_estado_inf=est.id_estado_inf
            INNER join actividad as act on act.id_informe=inf.id_informe
            INNER join tipo_actividad as tac on tac.id_tipo_act=act.id_tipo_act
            where (inf.id_estado_inf=4) or (inf.id_estado_inf=5)
            GROUP BY det.id_det_inf;";

            
        $rs = $instanciaCompartida->ejecutar($sql);
        $array = $instanciaCompartida->obtener_filas($rs);
        
        $instanciaCompartida->setArray(null);
        
        return $array;
    }
    
    
    
}
