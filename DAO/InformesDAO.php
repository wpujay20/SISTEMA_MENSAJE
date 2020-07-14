<?php

require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/PeriodoBean.php';
require_once '../BEAN/InformesBean.php';

class InformesDAO {

    public function registrarPeriodoInforme(PeriodoBean $PeriodoBean, InformesBean $InformesBean) {


        unset($_SESSION['id_periodo_ultimo_informe']);
        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO periodo (periodo_ini, periodo_fin,periodo_horas)
                VALUES ('$PeriodoBean->periodo_ini','$PeriodoBean->periodo_fin',$PeriodoBean->horas_dedicadas)";

        $estado = $instanciacompartida->EjecutarConEstado($sql);

        $InformesBean->id_periodo = $instanciacompartida->Ultimo_ID();
        $_SESSION['id_periodo_ultimo_informe'] = $InformesBean->id_periodo;

        return $estado;
    }

    public function registrarInformeNormal(InformesBean $InformesBean) {

        unset($_SESSION['id_ultimo_informe']);

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO informe (id_colaborador, id_estado_inf, id_periodo, inf_titulo_col, inf_descripcion) 
                VALUES ($InformesBean->id_colaborador,$InformesBean->id_estado_inf,$InformesBean->id_periodo,'$InformesBean->inf_titulo_col','$InformesBean->inf_descripcion');";


        $estado = $instanciacompartida->EjecutarConEstado($sql);
        $_SESSION['id_ultimo_informe'] = $instanciacompartida->Ultimo_ID();


        return $estado;
    }

    public function EliminarInforme_por_ID($id_informe) {


        $instanciacompartida = ConexionBD::getInstance();
        $sql = "UPDATE informe SET id_estado_inf='Archivado' WHERE id_informe=$id_informe";

        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;
    }

    public function ListarInformeCompleto_SinProductos($id_informe) {

        $instanciaCompartida = ConexionBD::getInstance();
        $sql = "SELECT *  FROM informe as inf 
                    INNER JOIN colaborador as col on col.id_colaborador=inf.id_colaborador 
                    INNER JOIN area as area on col.id_area=area.id_area 
                    INNER JOIN actividad as act on act.id_informe=inf.id_informe
                    INNER JOIN rubro as rub on rub.id_rubro=act.id_rubro
                    INNER JOIN estado_informe as est on est.id_estado_inf=inf.id_estado_inf 
                    INNER JOIN periodo as per ON per.id_periodo=inf.id_periodo
                    INNER JOIN trabajador as trab on trab.id_trabajador=col.id_trabajador
                    
                    WHERE inf.id_informe=$id_informe";
        
        $rs = $instanciaCompartida->ejecutar($sql);
        $lista = $instanciaCompartida->obtener_filas($rs);
//        var_export($lista);
        $instanciaCompartida->setArray(null);
        
        return $lista;
    }

    public function ListarInformeCompleto_ConProductos($id_informe) {

        $instanciaCompartida = ConexionBD::getInstance();

        $sql = "SELECT act.act_nombre,act.id_tipo_act, tac.nomb_tipo_act, rb.nomb_rubro, inf.id_informe, rub.id_rubro_productos, rub.pro_titulo, rub.pro_autor, rub.pro_estado FROM informe as inf 
                INNER JOIN actividad as act on act.id_informe=inf.id_informe 
                INNER JOIN rubro_productos as rub on rub.id_rubro_productos =act.id_rubro_productos 
                INNER JOIN tipo_actividad as tac on tac.id_tipo_act=act.id_tipo_act
                INNER JOIN rubro as rb on rb.id_rubro=act.id_rubro 
                WHERE inf.id_informe=$id_informe";
        
        $rs = $instanciaCompartida->ejecutar($sql);
        $lista = $instanciaCompartida->obtener_filas($rs);
//        var_export($lista);
        $instanciaCompartida->setArray(null);

        return $lista;
    }

    public function Detalle_Inf($id_informe) {
        
        $instanciaCompartida = ConexionBD::getInstance();
        
        $sql = "SELECT * FROM informe as inf 
                INNER JOIN detalle_informe as det on det.id_det_inf=inf.id_det_inf 
                WHERE inf.id_informe=$id_informe";
       
        $rs = $instanciaCompartida->ejecutar($sql);
        $lista = $instanciaCompartida->obtener_filas($rs);
//        var_export($lista);
        $instanciaCompartida->setArray(null);
        return $lista;
    }

    public function Archivar_Inf($id_informe) {
        $instanciaCompartida = ConexionBD::getInstance();
        $sql = "UPDATE INFORME SET id_estado_inf=5 WHERE id_informe=$id_informe";
        $estado = $instanciaCompartida->EjecutarConEstado($sql);

        return $estado;
    }

}
