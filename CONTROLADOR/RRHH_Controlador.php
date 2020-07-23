<?php

if (!isset($_SESSION)) {
    session_start();
}
echo' <script src="../jquery/jquery-3.3.1.min.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">';


require_once '../DAO/InformesDAO.php';
require_once '../DAO/ActividadesDAO.php';

$opciones = $_REQUEST['op'];
switch ($opciones) {
    case 1: { //VISUALIZAR INFORMES
        
        
            unset($_SESSION['Inf_con_det']);
            $det_inf=$_REQUEST['det_inf'];
            
//
            $InformesDAO = new InformesDAO();

            $_SESSION['Inf_con_det']=$InformesDAO->VisualizarInfRRHH($det_inf);

            echo '<script> document.location.href="../Vistas/(RRHH)_Visualizar_Informe.php";</script>';


            break;
        }
    case 2: {//ARCHIVAR INFORMES
            $msj = $_REQUEST['msj'];

            if ($msj == 1) {
                $_SESSION['id_det'] = $_REQUEST['det_inf'];
                echo '<script src="../JAVASCRIPT/(RRHH)_Archivar_Inf.js"></script> ';
            } else {
                $InformesDAO = new InformesDAO();
                $estado = $InformesDAO->Archivar_Inf($_SESSION['id_det']);
                unset($_SESSION['id_det']);
                if ($estado > 0) {
                    echo '<script> document.location.href="UsuariosControlador.php?op=3";</script>';
                }
            }
            break;
        }
    case 3:{//VER INF DEL COLABORADOR
            unset($_SESSION['id_det']);
            unset($_SESSION['lista_informes_con_productos']);
            unset($_SESSION['lista_informes_sin_productos']);
            unset($_SESSION['Tipoinforme']);
            
            $_SESSION['id_det']=$_REQUEST['det_inf'];
            
            $id_informe = $_REQUEST['id_informe'];

            $InformesDAO = new InformesDAO();
            $ActividadesDAO = new ActividadesDAO();
            $_SESSION['Tipoinforme'] = $ActividadesDAO->ObtenerTipoDeInforme($id_informe);
            $_SESSION['lista_informes_sin_productos'] = $InformesDAO->ListarInformeCompleto_SinProductos($id_informe);
            $_SESSION['lista_informes_con_productos'] = $InformesDAO->ListarInformeCompleto_ConProductos($id_informe);
            echo '<script> document.location.href="../Vistas/(RRHH)_Ver_Inf_Colaborador.php";</script>';
            break;
    }
    
   
}