<?php
if (!isset($_SESSION)) {
    session_start();
}
echo' <script src="../jquery/jquery-3.3.1.min.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';

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


$opciones = $_REQUEST['op'];


switch ($opciones) {

    case 1: {
            //permite obtener los datos del registro de clientes
            

            $objUsuarioDAO = new UsuarioDAO();
            $objUsuarioBean = new UsuarioBean();

            $usu_nombre = $_REQUEST['usuario'];
            $usu_contra = $_REQUEST['password'];

            $objUsuarioBean->setUsu_nombre($usu_nombre);
            $objUsuarioBean->setUsu_contra($usu_contra);
            $objUsuarioDAO->ValidarUsuarioSegunRol($objUsuarioBean);
            break;
        }

//****************************************************************************************************


    case 2: {

            unset($_SESSION['Lista_Areas']);
            unset($_SESSION['Lista_Tipos_Usuarios']);

            $AreasDAO = new AreasDAO();
            $TipoUsuariosDAO = new TipoUsuarioDAO();

            $_SESSION['Lista_Areas'] = $AreasDAO->ListarAreas();
            $_SESSION['Lista_Tipos_Usuarios'] = $TipoUsuariosDAO->ListarTipos_Usuarios();



            //var_dump($_SESSION['Lista_Tipos_Usuarios']);
            echo '<script> document.location.href="../Vistas/RegistrarUsuario.php";</script>';
            break;
        }

    case 3: { //RECOLECCION DE LOS DATOS LLEGADOS DEL REGISTRO DE USUARIOS MULTIPLE
            $trab_nombre = $_REQUEST['nombre'];
            $trab_apellido = $_REQUEST['apellido'];
            $trab_dni = $_REQUEST['dni'];
            $usu_nombre = $_REQUEST['usuario'];
            $usu_contra = $_REQUEST['pass1'];
            $tipo_usu = $_REQUEST['tipo_usu'];
            $area = $_REQUEST['area'];

            $TrabajadorDAO = new TrabajadorDAO();
            $UsuarioDAO = new UsuarioDAO();
            $AreasDAO = new AreasDAO();
            $ColaboradorDAO = new ColaboradorDAO();
            $JefeDAO = new JefeDAO();
            $RRHH_DAO = new RRHH_DAO();

            $UsuarioBean = new UsuarioBean();
            $TrabajadorBean = new TrabajadorBean();
            $AreaBean = new AreasBean();

            $UsuarioBean->setId_tipo_usu($tipo_usu);
            $UsuarioBean->setUsu_nombre($usu_nombre);
            $UsuarioBean->setUsu_contra($usu_contra);
            $TrabajadorBean->setTrab_nombre($trab_nombre);
            $TrabajadorBean->setTrab_apellido($trab_apellido);
            $TrabajadorBean->setTrab_dni($trab_dni);
            $AreaBean->setId_area($area);



            $estado = $UsuarioDAO->RegistrarUsuario($UsuarioBean); //REGISTRAMOS EL USUARIO

            if ($estado > 0) {
                $estado2 = $TrabajadorDAO->Registrar_Trabajador($UsuarioBean, $TrabajadorBean); //REGISTRAMOS EL TRABAJADOR


                switch ($tipo_usu) {
                    case 1: { //REGISTRAR JEFE
                            $estado4 = $JefeDAO->Registrar_Jefe($AreaBean, $TrabajadorBean);
                            echo '<script src="../JAVASCRIPT/RegistarJefe(RRHH).js"></script> ';
                            break;
                        }
                    case 2: {  //REGISTRAR COLABORADOR
                            $estado4 = $ColaboradorDAO->Registrar_Colaborador($AreaBean, $TrabajadorBean);
                            echo '<script src="../JAVASCRIPT/RegistrarColaborador(RRHH).js"></script> ';
                            break;
                        }
                    case 3: {   //REGISTRAR RR.HH
                            $estado5 = $RRHH_DAO->Registrar_RRHH($AreaBean, $TrabajadorBean);
                            echo '<script src="../JAVASCRIPT/RegistarRR_HH(RRHH).js"></script> ';
                            break;
                        }
                }
                break;
            }
        }


    case 4: { //REGISTRO SOLO DE COLABORADORES
            unset($_SESSION['Lista_Areas']);


            $AreasDAO = new AreasDAO();

            $_SESSION['Lista_Areas'] = $AreasDAO->ListarAreas();

            //var_dump($_SESSION['Lista_Tipos_Usuarios']);
            echo '<script> document.location.href="../Vistas/RegistrarColaborador.php";</script>';
            break;
        }


    case 5: { //RECOLECCION DE LOS DATOS LLEGADOS DEL REGISTRO DE COLABORADOR MULTIPLE
            $trab_nombre        = $_REQUEST['nombre'];
            $trab_apellido      = $_REQUEST['apellido'];
            $trab_dni           = $_REQUEST['dni'];
            $usu_nombre         = $_REQUEST['usuario'];
            $usu_contra         = $_REQUEST['pass1'];
            $area               = $_REQUEST['area'];      
           
            $TrabajadorDAO2 = new TrabajadorDAO();
            $UsuarioDAO2 = new UsuarioDAO();
            $AreasDAO2 = new AreasDAO();
            $ColaboradorDAO2 = new ColaboradorDAO();

            $UsuarioBean2 = new UsuarioBean();
            $TrabajadorBean2= new TrabajadorBean();
            $AreaBean2 = new AreasBean();


            $UsuarioBean2->setUsu_nombre($usu_nombre);
            $UsuarioBean2->setUsu_contra($usu_contra);
            $TrabajadorBean2->setTrab_nombre($trab_nombre);
            $TrabajadorBean2->setTrab_apellido($trab_apellido);
            $TrabajadorBean2->setTrab_dni($trab_dni);
            $AreaBean2->setId_area($area);
 
            $estado = $UsuarioDAO2->RegistrarUsuarioCOLABORADOR($UsuarioBean2); //REGISTRAMOS EL USUARIO
            
            if ($estado > 0) {
                
                $estado2 = $TrabajadorDAO2->Registrar_Trabajador($UsuarioBean2, $TrabajadorBean2); //REGISTRAMOS EL TRABAJADOR
               
                //REGISTRAR COLABORADOR
                
                $estado4 = $ColaboradorDAO2->Registrar_Colaborador($AreaBean2, $TrabajadorBean2);
              
                echo '<script src="../JAVASCRIPT/Colaborador_Insertado_1.js"></script> ';

                
            }
            break;
        }
}
?>
<a href="../JAVASCRIPT/Colaborador_Insertado_1.js"></a>
