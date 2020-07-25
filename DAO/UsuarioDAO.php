<?php
require_once '../UTILS/ConexionBD.php';
require_once '../BEAN/UsuarioBean.php';
require_once '../BEAN/TipoUsuarioBean.php';


echo' <script src="../jquery/jquery-3.3.1.min.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';

class UsuarioDAO {

    public function ValidarUsuarioSegunRol(UsuarioBean $objUsuarioBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "SELECT * from usuario as usu 
                INNER JOIN tipo_usuario as tip on usu.id_tipo_usu = tip.id_tipo_usu 
                INNER JOIN trabajador as trab on trab.id_usu=usu.id_usu WHERE usu.usu_nombre = '$objUsuarioBean->usu_nombre' and usu.usu_contra='$objUsuarioBean->usu_contra' and usu.estado='habilitado'";

        //  echo $sql;
          
        $res = $instanciacompartida->ejecutar($sql);
        $lista = $instanciacompartida->obtener_filas($res);
        $verificar = mysqli_affected_rows($instanciacompartida->getLink());

        if ($verificar > 0) {
            session_destroy();
            ob_start();
            session_start();
            //var_dump($lista);
            $_SESSION['id_tipo_usu'] = $lista[0]['id_tipo_usu'];
            $_SESSION['id_usu'] = $lista[0]['id_usu'];
            $_SESSION['id_trabajador'] = $lista[0]['id_trabajador'];
            $_SESSION['nombre'] = $lista[0]['nombre'];
            $_SESSION['apellido'] = $lista[0]['apellido'];

            
            $this->RedireccionarSegunRol($_SESSION['id_tipo_usu']);
        } else {
            echo '<script src="../JAVASCRIPT/ErrorLogin.js"></script> ';
        }
    }

    public function RedireccionarSegunRol($rol) {

        switch ($rol) {
            case 1: {
                    //ENVIA A UN JEFE A SU MENU PRINCIPAL

                    $this->ObtenerDatosDeJefe($_SESSION['id_trabajador']);
                    echo '<script src="../JAVASCRIPT/LoginCorrecto(Jefe).js"></script>';

                    break;
                }
            case 2: {
                    //ENVIA A UN COLABORADOR A SU MENU PRINCIPAL


                    $this->ObtenerDatosDeColaborador($_SESSION['id_trabajador']);
                    
                    echo '<script src="../JAVASCRIPT/LoginCorrecto(Colaborador).js"></script>';
                    break;
                }

            case 3: {
                    //ENVIA A UN RR.HH A SU MENU PRINCIPAL
                    
                    $_SESSION['id_area'] = 7;
                    $_SESSION['area_nombre'] = "RR.HH"; 
                    echo '<script src="../JAVASCRIPT/LoginCorrecto(RRHH).js"></script>';
                    break;
                }
        }
    }

    public function ObtenerDatosDeColaborador($id_trabajador) {

        try {
            $instanciacompartida = ConexionBD::getInstance();
            
            $sql = "SELECT * from colaborador AS col
                         INNER JOIN area as area on col.id_area=area.id_area
                         WHERE id_trabajador=$id_trabajador";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);
            
            $_SESSION['id_colaborador'] = $lista[1]["id_colaborador"];
            $_SESSION['id_area'] = $lista[1]["id_area"];
            $_SESSION['area_nombre'] = $lista[1]["area_nombre"];
            
            $instanciacompartida->setArray(null);

        } catch (Exception $ex) {
        } finally {
        }
    }

    
    public function ObtenerDatosDeJefe($id_trabajador) {
        try {

            $instanciacompartida = ConexionBD::getInstance();
            $sql = "SELECT * from jefe AS jef
                         INNER JOIN area as area on jef.id_area=area.id_area
                         WHERE id_trabajador=$id_trabajador";

            $res = $instanciacompartida->ejecutar($sql);
            $lista = $instanciacompartida->obtener_filas($res);

            //var_export($lista);
            echo '<pre>' . var_export($lista, true) . '</pre>';
            $_SESSION['id_jefe'] = $lista[1]["id_jefe"];
            $_SESSION['id_area'] = $lista[1]["id_area"];
            $_SESSION['area_nombre'] = $lista[1]["area_nombre"];
            
            $instanciacompartida->setArray(null);
            
        } catch (Exception $ex) {
        } finally {
        }
    }

    public function RegistrarUsuario(UsuarioBean $UsuarioBean) {

        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO usuario (id_tipo_usu, usu_nombre, usu_contra, estado )
                VALUES ($UsuarioBean->id_tipo_usu,'$UsuarioBean->usu_nombre','$UsuarioBean->usu_contra','habilitado')";
        $estado = $instanciacompartida->EjecutarConEstado($sql);

        $UsuarioBean->id_usu = $instanciacompartida->Ultimo_ID();

        return $estado;
    }
    
      public function ActualizarUsuario(UsuarioBean $UsuarioBean) {

         try {
            $instanciacompartida = ConexionBD::getInstance();
            $sql = "UPDATE usuario set  id_tipo_usu =$UsuarioBean->id_tipo_usu,"
                    . " usu_nombre='$UsuarioBean->usu_nombre', usu_contra ='$UsuarioBean->usu_contra' WHERE id_usu =$UsuarioBean->id_usu " ;
            
       
            $estado = $instanciacompartida->EjecutarConEstado($sql);
           
            
            return $estado;
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString() . "ERROR EN LA LINEA : " . $ex->getLine() . " " . $ex->getMessage();
        }
    }
    

    public function RegistrarUsuarioCOLABORADOR(UsuarioBean $UsuarioBean) {


        $instanciacompartida = ConexionBD::getInstance();
        $sql = "INSERT INTO usuario (id_tipo_usu, usu_nombre, usu_contra)
                VALUES (2,'$UsuarioBean->usu_nombre','$UsuarioBean->usu_contra')";

        $estado = $instanciacompartida->EjecutarConEstado($sql);


        $UsuarioBean->id_usu = $instanciacompartida->Ultimo_ID();

        return $estado;
    }

}
?>
<a href="../index.php"></a>

