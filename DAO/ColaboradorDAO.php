<?php

require_once '../BEAN/TrabajadorBean.php';
require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/UsuarioBean.php';
require_once '../BEAN/AreasBean.php';

class ColaboradorDAO
{

    public function Listar_Informes_de_Colaborador($id_trabajador)
    {
        $instanciaCompartida = ConexionBD::getInstance();
        $sql                 = "
                SELECT *  FROM informe as inf
                    INNER JOIN colaborador as col on col.id_colaborador=inf.id_colaborador
                    INNER JOIN trabajador as trab on trab.id_trabajador=col.id_trabajador
                    INNER JOIN area as area on area.id_area=col.id_area
                    INNER JOIN estado_informe as est on est.id_estado_inf=inf.id_estado_inf
                    INNER JOIN periodo as per on per.id_periodo=inf.id_periodo
                    WHERE trab.id_trabajador=$id_trabajador
            ";
        $rs    = $instanciaCompartida->ejecutar($sql);
        $array = $instanciaCompartida->obtener_filas($rs);

        return $array;
    }

    public function Registrar_Colaborador(AreasBean $AreasBean, TrabajadorBean $TrabajadorBean)
    {

        $instanciacompartida = ConexionBD::getInstance();   
        $sql                 = "INSERT INTO colaborador(id_area, id_trabajador)
                VALUES ($AreasBean->id_area,$TrabajadorBean->ID_trabajador)";
        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;
    }
    
    
        public function ActualizarColaborador(AreasBean $AreasBean, TrabajadorBean $TrabajadorBean) {

         try {
            $instanciacompartida = ConexionBD::getInstance();
//            $sql = "UPDATE colaborador as c inner join trabajador as tra on tra.id_colaborador=c.id_colaborador  inner join area as a on a.id_area=c.id_area set  c.id_area =$AreasBean->id_area, "
//                  . " WHERE tra.id_trabajador =$TrabajadorBean->ID_trabajador;"
//                  ;
   $sql="UPDATE colaborador as col SET id_area =$AreasBean->id_area WHERE col.id_trabajador = $TrabajadorBean->ID_trabajador";

    
            
            $estado = $instanciacompartida->EjecutarConEstado($sql);
           
            
            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }

    public function Enviar_a_Jefatura($id_informe)
    {

        $instanciaCompartida = ConexionBD::getInstance();
        $sql                 = "UPDATE informe SET id_estado_inf = 2 WHERE informe.id_informe = $id_informe;";
        $estado              = $instanciaCompartida->EjecutarConEstado($sql);

        return $estado;
    }

    // Wilson:
    public function ListarInformePorID($id_informe)
    {
        try {
            $instanciaCompartida = ConexionBD::getInstance();
            $sql                 = "SELECT inf.id_informe, inf.inf_titulo_col,inf.inf_descripcion,per.id_periodo,per.periodo_ini,per.periodo_fin,per.periodo_horas FROM informe as inf INNER JOIN periodo as per
                    on inf.id_periodo = per.id_periodo
                    WHERE inf.id_informe=$id_informe";
            $rs    = $instanciaCompartida->ejecutar($sql);
            $array = $instanciaCompartida->obtener_filas($rs);
            $instanciaCompartida->setArray(null);

            return $array;

        } catch (Exception $e) {

        }
    }
    //Wilson:

}
