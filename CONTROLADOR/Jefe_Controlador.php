<?php
if (!isset($_SESSION)) {
    session_start();
}
echo ' <script src="../jquery/jquery-3.3.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">';

require_once '../DAO/UsuarioDAO.php';
require_once '../DAO/AreasDAO.php';
require_once '../DAO/TiposUsuarioDAO.php';
require_once '../DAO/TrabajadorDAO.php';
require_once '../DAO/ColaboradorDAO.php';
require_once '../DAO/JefeDAO.php';
require_once '../DAO/RRHH_DAO.php';
require_once '../DAO/ActividadesDAO.php';
require_once '../DAO/RubrosDAO.php';
require_once '../DAO/InformesDAO.php';
require_once '../DAO/PeriodoDAO.php';
require_once '../DAO/ProductosDAO.php';
require_once '../BEAN/Detalle_Informe_Bean.php';

require_once '../DAO/Detalle_InformeDAO.php';
require_once '../BEAN/RubrosBean.php';
require_once '../BEAN/InformesBean.php';
require_once '../BEAN/JefeBean.php';
require_once '../BEAN/AreasBean.php';
require_once '../BEAN/ColaboradorBean.php';
require_once '../BEAN/TrabajadorBean.php';
require_once '../BEAN/UsuarioBean.php';
require_once '../BEAN/TipoUsuarioBean.php';
require_once '../BEAN/RRHH_Bean.php';
require_once '../BEAN/PeriodoBean.php';
require_once '../BEAN/ProductosBean.php';

require_once '../UTILS/ConexionBD.php';

$opciones = $_REQUEST['op'];

switch ($opciones) {

    case 1:{
//PERMITE AÑANIR NUEVOS RUBROS - POR PARTE DEL JEFE

            $RubrosDAO  = new RubrosDAO();
            $RubrosBean = new RubrosBean();

            $nombre_rubro      = $_REQUEST['nombre_rubro'];
            $descripcion_Rubro = $_REQUEST['descripcion'];

            $RubrosBean->setNomb_rubro($nombre_rubro);
            $RubrosBean->setDesc_rubro($descripcion_Rubro);

            $estado = $RubrosDAO->RegistarRubro_Personalizado($RubrosBean);
            if ($estado > 0) {
                echo '<script src="../JAVASCRIPT/(Jefe)_Rubro_Insertado_OK.js"></script> ';
                //echo '<script> document.location.href="../CONTROLADOR/UsuariosControlador.php?op=2";</script>';
            } else {
                echo '<script src="../JAVASCRIPT/(Jefe)ErrorGeneral.js"></script> ';
            }
            break;
        }

    case 2:{
//PERMITE ELIMINAR  RUBROS - POR PARTE DEL JEFE

            $RubrosDAO  = new RubrosDAO();
            $RubrosBean = new RubrosBean();

            $id_rubro = $_REQUEST['id_rubro'];

            $RubrosBean->setId_rubro($id_rubro);
            $RubrosDAO->EliminarRubroSeleccionadoporID($RubrosBean);

            echo '<script> document.location.href="../CONTROLADOR/UsuariosControlador.php?op=2";</script>';
            break;
        }

    case 3:{
//PERMITE LISTAR LOS INFROMES QUE SE VAN CONSOLIDAR
            unset($_SESSION['lista_informes_con_productos']);
            unset($_SESSION['lista_informes_sin_productos']);
            unset($_SESSION['LISTA_INFORMES_JEFE_CONSOLIDAR']);

            $JefeDAO                                    = new JefeDAO();
            $_SESSION['LISTA_INFORMES_JEFE_CONSOLIDAR'] = $JefeDAO->Listar_Informes_JEFE_CONOSOLIDAR();

            echo '<script> document.location.href="../Vistas/(Jefe)_Gestionar_Informes.php";</script>';

            break;
        }

    case 4:{
//PERMITE APROBAR LOS INFORMES RECIBIDOS DE LOS COLABORADORES

            $id_informe = $_REQUEST['id_informe'];

            $JefeDAO           = new JefeDAO();
            $ActualizarInforme = $JefeDAO->ActualizarInformeOK($id_informe, 1);

            if ($ActualizarInforme > 0) {
                echo '<script> document.location.href="../CONTROLADOR/Jefe_Controlador.php?op=3";</script>';
            }
            break;
        }

    case 5:{
//PERMITE DESAPROBAR LOS INFORMES RECIBIDOS DE LOS COLABORADORES

            $id_informe = $_REQUEST['id_informe'];

            $JefeDAO           = new JefeDAO();
            $ActualizarInforme = $JefeDAO->ActualizarInforme_BACK($id_informe, 2);

            if ($ActualizarInforme > 0) {
                echo '<script> document.location.href="../CONTROLADOR/Jefe_Controlador.php?op=3";</script>';
            }
            break;
        }

    case 6:{
//PERMITE RECHAZAR LOS INFORMES RECIBIDOS DE LOS COLABORADORES

            $id_informe = $_REQUEST['id_informe'];

            $JefeDAO           = new JefeDAO();
            $ActualizarInforme = $JefeDAO->ActualizarInforme_BACK($id_informe, 1);

            if ($ActualizarInforme > 0) {
                echo '<script> document.location.href="../CONTROLADOR/Jefe_Controlador.php?op=3";</script>';
            }
            break;
        }

//    case 7: {
    //
    ////PERMITE ENVIAR A RR.HH LOS INFORMES CONVALIDADOS
    //            date_default_timezone_set('America/Lima');
    //            //INICIALIZACION DE VARIABLES
    //            $dat1 = null;
    //            $dat2 = null;
    //            //VARIABLES NECESARIAS PARA ENVIAR INFORME -------------
    //            //$datfin = null;
    //            $arg = 'Aprobado';
    //            //------------------------------------------------------
    //            $id_informe = $_REQUEST['id_informe'];
    //            $id_traba=$_SESSION['id_trabajador'];
    //
    //            $InformesDAO = new InformesDAO();
    //            //OBTENER ARRAY CON LISTA DE FECHAS Y NOMBRES DE ESTADOS DE INFORMES
    //            $dateinf = $InformesDAO->Fecha_Inf($id_traba);
    //            //EXTRAER EL NUMERO DE SEMANA DE LA FECHA ACTUAL
    //            $fecha = date('m/d/Y', strtotime('now'));
    //            $dat2 = strftime("%V", strtotime($fecha));
    //            //RECORRER EL ARRAY DE LA LISTA CON FECHAS Y NOMBRES DE ESTADOS DE INFORMES
    //            foreach ($dateinf as $info):
    //                //EXTRAER EL NUMERO DE SEMANA DE LA FECHA DE LOS INFORMES 1 POR 1
    //                $ars = date('m/d/Y', strtotime($info['inf_fecha']));
    //                $dat1 = strftime("%V", strtotime($ars));
    //                //CONDICIONAL PARA EVALUAR SI HAY NUMERO DE SEMANA IGUALES EN FUNCION AL ESTADO
    //                if ($dat1 == $dat2 && ($info['nom_estado_inf']=='Enviado a RRHH' || $info['nom_estado_inf']=='Archivado')) {
    ////                    $arg = $info['nom_estado_inf'];
    //                    $arg=null;
    //                }
    //                //DESTRUIR LAS VARIABLES PARA QUE NO SE ACUMULEN DURANTE EL RECORRIDO
    //                unset($ars);
    //                unset($dat1);
    //            endforeach;
    //
    ////            var_dump($datfin);
    ////            var_dump($arg);
    //
    //            if ($arg!=null) {
    //                $date = null;
    //                $date = getdate();
    //
    //                if (($date['weekday'] == 'Friday' || $date['weekday'] == 'Saturday' || $date['weekday'] == 'Sunday') && $date['hours'] >= 20) {
    //                    echo '<script src="../JAVASCRIPT/(Jefe)ErrorGeneral.js"></script>';
    //                } else {
    //
    //                    $Titulo = $_REQUEST['Titulo'];
    //                    $Asunto = $_REQUEST['Asunto'];
    //                    $Descripcion = $_REQUEST['Descripcion'];
    //                    $id_jefe = $_SESSION['id_jefe'];
    //
    //
    //                    $JefeDAO = new JefeDAO();
    //                    $DetalleBean = new Detalle_Informe_Bean();
    //
    //                    $DetalleBean->setId_jefe($id_jefe);
    //                    $DetalleBean->setTitulo_desc($Titulo);
    //                    $DetalleBean->setAsunto($Asunto);
    //                    $DetalleBean->setDescripcion($Descripcion);
    //
    //                    $AñadirDetalleInforme = $JefeDAO->AgregarDettale_informe($DetalleBean);
    //
    //
    //                    if ($AñadirDetalleInforme > 0) {
    //
    //                        $informeListo = $JefeDAO->AñadirDetalle($DetalleBean, $id_informe);
    //
    //                        $ActualizarInforme = $JefeDAO->ActualizarInformeOK($id_informe, 2);
    //
    //                        if ($ActualizarInforme > 0) {
    //                            echo '<script> document.location.href="../CONTROLADOR/Jefe_Controlador.php?op=3";</script>';
    //                        }
    //                    }
    //                }
    //            } else {
    //                echo '<script src="../JAVASCRIPT/InformeDiario.js"></script>';
    //            }
    //
    //            break;
    //        }
    case 7:{

//PERMITE ENVIAR A RR.HH LOS INFORMES CONVALIDADOS

            $id_informe  = $_REQUEST['id_informe'];
            $Titulo      = $_REQUEST['Titulo'];
            $Asunto      = $_REQUEST['Asunto'];
            $Descripcion = $_REQUEST['Descripcion'];
            $id_jefe     = $_SESSION['id_jefe'];

            $JefeDAO     = new JefeDAO();
            $DetalleBean = new Detalle_Informe_Bean();

            $DetalleBean->setId_jefe($id_jefe);
            $DetalleBean->setTitulo_desc($Titulo);
            $DetalleBean->setAsunto($Asunto);
            $DetalleBean->setDescripcion($Descripcion);

            $AñadirDetalleInforme = $JefeDAO->AgregarDettale_informe($DetalleBean);

            if ($AñadirDetalleInforme > 0) {

                $informeListo = $JefeDAO->AñadirDetalle($DetalleBean, $id_informe);

                $ActualizarInforme = $JefeDAO->ActualizarInformeOK($id_informe, 2);

                if ($ActualizarInforme > 0) {
                    echo '<script> document.location.href="../CONTROLADOR/Jefe_Controlador.php?op=3";</script>';
                }
                break;
            }

        }

    case 8:{
//VISUALIZACION DE INFORMES ESPECIFICOS POR SU ID- YA SEA DE PRODUCTOS O NO
            unset($_SESSION['lista_informes_con_productos']);
            unset($_SESSION['lista_informes_sin_productos']);

            $id_informe = $_REQUEST['id_informe'];

            $InformesDAO                              = new InformesDAO();
            $_SESSION['lista_informes_sin_productos'] = $InformesDAO->ListarInformeCompleto_SinProductos($id_informe);
            $_SESSION['lista_informes_con_productos'] = $InformesDAO->ListarInformeCompleto_ConProductos($id_informe);
            echo '<script> document.location.href="../Vistas/(Jefe)_Visualizar_Informes.php";</script>';

            break;
        }
    case 9:{
//VISUALIZACION DE INFORMES PARA RRHH
            $id_informe                               = $_REQUEST['id_informe'];
            $InformesDAO                              = new InformesDAO();
            $_SESSION['lista_informes_sin_productos'] = $InformesDAO->ListarInformeCompleto_SinProductos($id_informe);
            $_SESSION['lista_informes_con_productos'] = $InformesDAO->ListarInformeCompleto_ConProductos($id_informe);
            echo '<script> document.location.href="../Vistas/(RRHH)_Visualizar_Informe.php";</script>';
        }
}
