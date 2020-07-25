<?php
if (!isset($_SESSION)) {
    ob_start();
    session_start();
}

require_once '../DAO/UsuarioDAO.php';
require_once '../DAO/ColaboradorDAO.php';
require_once '../DAO/JefeDAO.php';
require_once '../DAO/RRHH_DAO.php';
require_once '../DAO/RubrosDAO.php';

require_once '../BEAN/ColaboradorBean.php';
require_once '../BEAN/TrabajadorBean.php';
require_once '../BEAN/UsuarioBean.php';
require_once '../BEAN/TipoUsuarioBean.php';


$opciones = $_REQUEST['op'];


switch ($opciones) {

    case 1: {

            //permite listar los informes de un colaborador COMPLETO POR SU ID ******************************************
            unset($_SESSION['LISTA_INFORMES_COLABORADOR']);
            
            $id_trabajador=$_SESSION['id_trabajador'];
            
            $objColaboradorDAO = new ColaboradorDAO();
            $_SESSION['LISTA_INFORMES_COLABORADOR']= $objColaboradorDAO->Listar_Informes_de_Colaborador($id_trabajador);
            
            echo '<script> document.location.href="../Vistas/EmpleadoPrincipal.php";</script>';
           
          
            break;
        }

    case 2: {

            //permite listar los informes de un JEFE - completos - VISTA PRELIMINAR SOLAMENTE
            unset($_SESSION['LISTA_INFORMES_JEFE_PRELIMINAR']);
            unset($_SESSION['LISTA_RUBROS']);
           
            $JefeDAO = new JefeDAO();
            $RubrosDAO= new RubrosDAO();
            
            $_SESSION['LISTA_INFORMES_JEFE_PRELIMINAR']= $JefeDAO->Listar_Informes_JEFE_PRELIMINAR();
            $_SESSION['LISTA_RUBROS'] = $RubrosDAO->ListarRubrosCompletos();
            
            echo '<script> document.location.href="../Vistas/InterfaceJefe.php";</script>';
            break;
        }

    case 3: {
            
            unset($_SESSION['LISTA_INFORMES_RR_HH']);
            unset($_SESSION['lista_informes_sin_productos']);
            unset($_SESSION['lista_informes_con_productos']);
            unset($_SESSION['lista_detalle_informes']);
            $RRHH_DAO = new RRHH_DAO();
            $_SESSION['LISTA_INFORMES_RR_HH']= $RRHH_DAO->Listar_Informes_RR_HH();
            
            //permite listar los informes de RR.HH
            echo '<script> document.location.href="../Vistas/InterfaceRRHH.php";</script>';
            break;
        }


//****************************************************************************************************
}
?>
<a href="../index.php"></a>