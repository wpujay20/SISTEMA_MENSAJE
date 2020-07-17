<?php

if (!isset($_SESSION)) {
    session_start();
}
echo' <script src="../jquery/jquery-3.3.1.min.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">';


require_once '../DAO/InformesDAO.php';


$opciones = $_REQUEST['op'];
switch ($opciones) {
    case 1: { //VISUALIZAR INFORMES
            unset($_SESSION['lista_informes_sin_productos']);
            unset($_SESSION['lista_informes_con_productos']);
            unset($_SESSION['lista_detalle_informes']);

            $id_informe = $_REQUEST['id_informe'];

            $InformesDAO = new InformesDAO();


            $_SESSION['lista_informes_sin_productos'] = $InformesDAO->ListarInformeCompleto_SinProductos($id_informe);
            $_SESSION['lista_informes_con_productos'] = $InformesDAO->ListarInformeCompleto_ConProductos($id_informe);
            $_SESSION['lista_detalle_informes'] = $InformesDAO->Detalle_Inf($id_informe);

            echo '<script> document.location.href="../Vistas/(RRHH)_Visualizar_Informe.php";</script>';


            break;
        }
    case 2: {//ARCHIVAR INFORMES
            $msj = $_REQUEST['msj'];

            if ($msj == 1) {
                $_SESSION['id_informe'] = $_REQUEST['id_informe'];
                echo '<script src="../JAVASCRIPT/(RRHH)_Archivar_Inf.js"></script> ';
            } else {
                $InformesDAO = new InformesDAO();
                $estado = $InformesDAO->Archivar_Inf($_SESSION['id_informe']);
                unset($_SESSION['id_informe']);
                if ($estado > 0) {
                    echo '<script> document.location.href="UsuariosControlador.php?op=3";</script>';
                }
            }
            break;
        }
   
}