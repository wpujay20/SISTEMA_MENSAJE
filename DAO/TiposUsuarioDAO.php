<?php

class TipoUsuarioDAO {
    

    public function ListarTipos_Usuarios() {

        try {

            $cn = mysqli_connect("localhost", "root", "", "bdinformes");
            mysqli_set_charset($cn, "utf8");
            $sql2 = "SELECT * FROM tipo_usuario";

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

}
