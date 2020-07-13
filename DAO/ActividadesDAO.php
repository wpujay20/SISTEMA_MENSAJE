<?php

require_once '../UTILS/ConexionBD.php';

require_once '../BEAN/ActividadesBean.php';
require_once '../BEAN/InformesBean.php';
require_once '../BEAN/ProductosBean.php';

class ActividadesDAO {

    public function ListarActividadesPlanificadas() {

        //1 : planificadas
        //2: realizadas

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * FROM actividad as act where act.id_tipo_act=1";

        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        return $lista;
    }

    public function ListarActividadesRealizadas() {

        //1 : planificadas
        //2: realizadas

        try {
            $cn = mysqli_connect("localhost", "root", "", "bdinformes");
            mysqli_set_charset($cn, "utf8");

            $sql2 = "SELECT * FROM actividad as act where act.id_tipo_act=2";

            $res = mysqli_query($cn, $sql2);
            while ($row = mysqli_fetch_assoc($res)) {
                $lista[] = $row;
            }

            return $lista;
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        } finally {
            mysqli_close($cn);
        }
    }

    public function InsertarActividad(ActividadesBean $ActividadBean, InformesBean $InformesBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO actividad (act_nombre, id_tipo_act, id_rubro) VALUES ('$ActividadBean->act_nombre', $ActividadBean->id_tipo_actividad, $ActividadBean->id_rubro)";

        $estado = $instanciacompartida->EjecutarConEstado($sql);
        $InformesBean->id_actividad = $instanciacompartida->Ultimo_ID();


        return $estado;
    }

    public function RegistrarActividad_NORMAL(ActividadesBean $ActividadBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO actividad ( act_nombre, id_tipo_act, id_rubro, id_informe)
               VALUES ( '$ActividadBean->act_nombre', $ActividadBean->id_tipo_actividad, $ActividadBean->id_rubro, $ActividadBean->id_informe)";

        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;
    }

    public function RegistrarActividad_PRODUCTOS(ActividadesBean $ActividadBean, ProductosBean $ProductosBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO actividad (act_nombre, id_tipo_act, id_rubro, id_rubro_productos, id_informe)
                VALUES ('$ActividadBean->act_nombre', $ActividadBean->id_tipo_actividad, $ActividadBean->id_rubro, $ProductosBean->id_rubro_prodcutos, $ActividadBean->id_informe)";


        $estado = $instanciacompartida->EjecutarConEstado($sql);


        return $estado;
    }

    public function RegistrarActividad_RUBRO_NUEVO(ActividadesBean $ActividadBean, RubrosBean $RubrosBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO actividad ( act_nombre, id_tipo_act, id_rubro, id_informe)
               VALUES ( '$ActividadBean->act_nombre', $ActividadBean->id_tipo_actividad,$RubrosBean->id_rubro, $ActividadBean->id_informe)";

        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;
    }

    public function ListarActividadesSegunInforme(ActividadesBean $ActividadBean) {


        $instanciacompartida = ConexionBD::getInstance();
        $sql = " SELECT * FROM actividad as act
                 INNER JOIN rubro as rub on rub.id_rubro=act.id_rubro
                 WHERE act.id_informe= $ActividadBean->id_informe and rub.id_rubro<>5";


        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);

        return $lista;
    }















    public function ListarActividadesSegunInformeProductos(ActividadesBean $ActividadBean) {

        try {
            $lista = array();

            $cn = mysqli_connect("localhost", "root", "", "bdinformes");
            mysqli_set_charset($cn, "utf8");

            $sql2 = " SELECT * FROM rubro_productos as pro
                        INNER JOIN actividad as act on act.id_rubro_productos=pro.id_rubro_productos
                        INNER JOIN rubro as rub on rub.id_rubro=act.id_rubro
                        where act.id_informe=$ActividadBean->id_informe";

            $res = mysqli_query($cn, $sql2);
            while ($row = mysqli_fetch_assoc($res)) {
                $lista[] = $row;
            }

            return $lista;
        } catch (Exception $ex) {

            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        } finally {
            mysqli_close($cn);
        }
    }

    public function EliminarActividadesPor_ID_informe($id_informe) {


        $instanciacompartida = ConexionBD::getInstance();
        $sql = "DELETE FROM actividad WHERE id_informe=$id_informe";

        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;
    }



    public function EliminarActividadesPor_ID_Actividad($id_actividad) {


        $instanciacompartida = ConexionBD::getInstance();
        $sql = "DELETE FROM actividad WHERE id_actividad=$id_actividad";

        $estado = $instanciacompartida->EjecutarConEstado($sql);

        return $estado;
    }
///___________________________funciones para editar____________________________________________________________________________________________
    public function ListarActividadesSegunInformeProductos2($id_informe) {

            try {
                 $instanciacompartida = ConexionBD::getInstance();
                $sql = " SELECT act.id_actividad, act.act_nombre,rub.id_rubro,rub.nomb_rubro,rub.desc_rubro,pro.id_rubro_productos,pro.pro_titulo,pro.pro_autor,pro.pro_estado FROM rubro_productos as pro
                        INNER JOIN actividad as act on act.id_rubro_productos=pro.id_rubro_productos
                        INNER JOIN rubro as rub on rub.id_rubro=act.id_rubro
                        where act.id_informe=$id_informe";

                  $res = $instanciacompartida->EjecutarConEstado($sql);
                   $lista = $instanciacompartida->obtener_filas($res);


                return $lista;
            } catch (Exception $ex) {
                echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
            }
        }

}

