<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once '../DAO/GestionarUsuarioDAO.php';
require_once '../DAO/UsuarioDAO.php';
require_once '../DAO/AreasDAO.php';
require_once '../DAO/TiposUsuarioDAO.php';
require_once '../DAO/TrabajadorDAO.php';
require_once '../DAO/ColaboradorDAO.php';
require_once '../DAO/JefeDAO.php';
require_once '../DAO/RRHH_DAO.php';

require_once '../BEAN/JefeBean.php';
require_once '../BEAN/AreasBean.php';
require_once '../BEAN/ColaboradorBean.php';
require_once '../BEAN/TrabajadorBean.php';
require_once '../BEAN/UsuarioBean.php';
require_once '../BEAN/TipoUsuarioBean.php';
require_once '../BEAN/RRHH_Bean.php';



echo' <script src="../jquery/jquery-3.3.1.min.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">';

$opciones = $_REQUEST['op'];
switch ($opciones) {
    
      case 1: {

            //permite listar la gestion de usuarios
            unset($_SESSION['GESTIONAR_USUARIO']); 
            $objGestionDAO = new GestionDAO();
            $_SESSION['GESTIONAR_USUARIO']= $objGestionDAO->Listar_usuarios();  
           echo '<script> document.location.href="../Vistas/Gestionar_RRHH(Usuario).php";</script>';
          
            echo '<pre>' . var_export($_SESSION['GESTIONAR_USUARIO'], true) . '</pre>';
            break;
        }
        
      case 2: { 
                $objTrabajadorBean = new TrabajadorBean();
                $objTipoUsuarioBean = new TipoUsuarioBean();
                $objUsuarioBean = new UsuarioBean();
                
                
                $objGestionDAO = new GestionDAO();
               
                $trab_nombre =  $_REQUEST['nombre'];
                $trab_apellido =  $_REQUEST['apellido'];
                $trab_dni =  $_REQUEST['dni'];
                $tipo_nombre =  $_REQUEST['tipo_nombre'];
                $usu_nombre =  $_REQUEST['usu_nombre'];
                $usu_contra =  $_REQUEST['usu_contra'];
                $tipo_descripcion = $_REQUEST['tipo_descripcion'];

                
                $objTrabajadorBean->setTrab_nombre($trab_nombre);
                $objTrabajadorBean->setTrab_apellido($trab_apellido);
                $objTrabajadorBean->setTrab_dni($trab_dni);
                
                
                $objTipoUsuarioBean->setTipo_nombre($tipo_nombre);
                
                $objUsuarioBean->setUsu_nombre($usu_nombre);
                $objUsuarioBean->setUsu_contra($usu_contra);
                
                $objTipoUsuarioBean->setTipo_descripcion($tipo_descripcion);
              
              
               $estado = $objGestionDAO->InsertarTrabajador($objTrabajadorBean,$objUsuarioBean );
                       
               if($estado>0){
                    
                    $estado1 = $objGestionDAO->InsertarTipoUsuario($objTipoUsuarioBean );
                    
                      $estado2 = $objGestionDAO->InsertarUsuario($objTipoUsuarioBean, $objUsuarioBean );
                      
                        echo '<script> document.location.href="GestionarUsuario.php?op=1";</script>';
                 } else {
                        echo 'error al insertar';    
                 }
              
       break;
   
      }
     case 3: {// MODIFICAR USUARIO
          
            $TrabajadorDAO = new TrabajadorDAO();
            $UsuarioDAO = new UsuarioDAO();
            $ColaboradorDAO = new ColaboradorDAO();
            $JefeDAO = new JefeDAO();
            $RRHH_DAO = new RRHH_DAO();

            $UsuarioBean = new UsuarioBean();
            $TrabajadorBean = new TrabajadorBean();
            $AreaBean = new AreasBean();
            $TipoUsuarioBean = new TipoUsuarioBean();
            
           
            $id_trabajador = $_REQUEST['ID_TRABA'];
            $id_usu = $_REQUEST['id_usu'];
            $trab_nombre_nuevo = $_REQUEST['nombre'];
            $trab_apellido_nuevo = $_REQUEST['apellido'];
            $trab_dni_nuevo = $_REQUEST['dni'];
            $usu_nombre_nuevo = $_REQUEST['usu_nombre'];
            $usu_contra_nuevo = $_REQUEST['usu_contra'];
            $tipo_usu_nuevo = $_REQUEST['tipo_usu'];
            $area_nuevo = $_REQUEST['area'];
            $usu_estado_nuevo = $_REQUEST['usu_estado'];


            $TrabajadorBean->setID_trabajador($id_trabajador);
            $TrabajadorBean->setTrab_nombre($trab_nombre_nuevo);
            $TrabajadorBean->setTrab_apellido($trab_apellido_nuevo);
            $TrabajadorBean->setTrab_dni($trab_dni_nuevo);
            $UsuarioBean->setId_usu($id_usu);
            $UsuarioBean->setUsu_nombre($usu_nombre_nuevo);
            $UsuarioBean->setUsu_contra($usu_contra_nuevo);
            
            $UsuarioBean->setUsu_estado($usu_estado_nuevo);
            $UsuarioBean->setId_tipo_usu($tipo_usu_nuevo);
            $AreaBean->setArea_nombre($area_nuevo);
            


            $estado = $UsuarioDAO->ActualizarUsuario($UsuarioBean); //REGISTRAMOS EL USUARIO
           // var_dump($estado);

            if ($estado > 0) {             
                $estado2 = $TrabajadorDAO->ActualizarTrabajo($TrabajadorBean); //REGISTRAMOS EL TRABAJADOR

                switch ($tipo_usu_nuevo ) {
                                      
                    case 1: { //REGISTRAR JEFE
                            $estado4 = $JefeDAO->ActualizarJefe($AreaBean, $TrabajadorBean);
                            echo '<script src="../JAVASCRIPT/RegistarJefe(RRHH).js"></script> ';
                            break;
                        }
                    case 2: {  //REGISTRAR COLABORADOR
                            $estado4 = $ColaboradorDAO->ActualizarColaborador($AreaBean, $TrabajadorBean);
                            echo '<script src="../JAVASCRIPT/RegistrarColaborador(RRHH).js"></script> ';
                            break;
                        }
                    case 3: {   //REGISTRAR RR.HH
                            $estado5 = $RRHH_DAO->ActualizarRRHH($AreaBean, $TrabajadorBean);
                            echo '<script src="../JAVASCRIPT/RegistarRR_HH(RRHH).js"></script> ';
                            break;
                        }
                }
                  
              // echo   'href="../CONTROLADOR/GestionarUsuario.php">';
               
            }
             break;
                
              
        }

          
          
      case 4: {//ELIMIANR USUARIO
          
               $id_trabajador = $_REQUEST['id_trabajador'];
               $_SESSION['id_trabajador']=$id_trabajador;
               echo '<script src="../JAVASCRIPT/Eliminar_Usuario.js"></script>';    
            
       break;
   
       }
       case 5: {//SI QUIERO ELIMINAR
               $objGestionDAO = new GestionDAO();
               
               $id_trabajador2 = $_SESSION['id_trabajador'];
               $estado = $objGestionDAO->ElimianrColaborador($id_trabajador2);
             
              var_dump($estado);
               if($estado>0){
                     $estado2= $objGestionDAO->ElimianrTrabajador($id_trabajador2);
                   
                        unset($_SESSION['ID_USU']);
                        //echo '<script> document.location.href="GestionarUsuario.php?op=1";</script>';
                 } else {
                        echo 'error al borrar';    
                 }
          
          
       break;
   
       }
       case 6:{
           
            $id_usu = $_REQUEST['usu'];
            $objGestionDAO = new GestionDAO();
            
            $estado = $objGestionDAO->InhabilitarUsuario($id_usu);
            if($estado>0){
                echo '<script> document.location.href="GestionarUsuario.php?op=1";</script>';
            }
           
               break;
       }
       
              case 7:{
           
            $id_usu = $_REQUEST['usu'];
            $objGestionDAO = new GestionDAO();
            
            $estado = $objGestionDAO->HabilitarUsuario($id_usu);
            if($estado>0){
                echo '<script> document.location.href="GestionarUsuario.php?op=1";</script>';
            }
           
               break;
       }
       

}