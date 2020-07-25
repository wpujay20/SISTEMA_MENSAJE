<?php

class TipoUsuarioDAO {
    

    public function ListarTipos_Usuarios() {

        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * FROM tipo_usuario";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);

            $instanciacompartida->setArray(null);
            return $lista;
            

        } catch (Exception $ex) {
        } finally {
        }
    }

}
