<?php
if (!isset($_SESSION)) {
    session_start();
}
echo' <script src="../jquery/jquery-3.3.1.min.js"></script>
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

    case 1: {
//permite obtener los datos NECESARIOS PARA LA REDACCION DE LOS INFORMES (SELECTS)
//1: planificadas
//2: realizadas

            $RubrosDAO = new RubrosDAO();

            $id_tipo_actividad = $_REQUEST['tipo_Actividad'];

            echo '<script> document.location.href="../Vistas/(Colaborador)_Llenar_Informe.php?tipo_Actividad=' . $id_tipo_actividad . '";</script>';
            break;
        }


    case 2: {

            //ESTOS SON LOS RECURSOS PARA LA INSERCION DE ACTIVIDADES A UN INFORME EN ESPECIFICO
            unset($_SESSION['tipo_Actividad']);
            unset($_SESSION['Lista_Actividades_Agregadas']);
            unset($_SESSION['Lista_Actividades_Productos']);
            unset($_SESSION['listarRubrosSinProductos']);

            $id_colaborador = $_SESSION['id_colaborador'];
            $id_estado = 1;
            $titulo = $_REQUEST['titulo'];
            $_SESSION['tipo_Actividad'] = $_REQUEST['tipo_Actividad'];
            $fecha_ini = $_REQUEST['fecha_ini'];
            $fecha_fin = $_REQUEST['fecha_fin'];
            $horas = $_REQUEST['horas'];
            $descripcion_informe = $_REQUEST['descripcion_informe'];


            $informesDAO = new InformesDAO();
            $ActividadesDAO = new ActividadesDAO();
            $ProductosDAO = new ProductosDAO();
            $RubrosDAO = new RubrosDAO();


            $informesBean = new InformesBean();
            $PeriodoBean = new PeriodoBean();
            $ProductosBean = new ProductosBean();

            $informesBean->setId_colaborador($id_colaborador);
            $informesBean->setId_estado_inf($id_estado);
            $informesBean->setInf_titulo_col($titulo);
            $informesBean->setInf_descripcion($descripcion_informe);

            $PeriodoBean->setPeriodo_ini($fecha_ini);
            $PeriodoBean->setPeriodo_fin($fecha_fin);
            $PeriodoBean->setHoras_dedicadas($horas);



            $insertarPeriodo = $informesDAO->registrarPeriodoInforme($PeriodoBean, $informesBean);

            if ($insertarPeriodo > 0) {
                $insertarIinforme = $informesDAO->registrarInformeNormal($informesBean);
                $_SESSION['listarRubrosSinProductos'] = $RubrosDAO->ListarRubrosSinProductos();
                echo '<script> document.location.href="../Vistas/(Colaborador)_LLenar_Actividades.php";</script>';
            }

            break;
        }

    case 3: { // AQUI SE HACE EL LLENADO DE LAS ACTIVIDADES DE CUALQUIER TIPO
            $ActividadesBean = new ActividadesBean();
            $ProductosDAO = new ProductosDAO();
            $RubrosDAO = new RubrosDAO();

            $ProductosBean = new ProductosBean();
            $RubrosBean = new RubrosBean();
            $ActividadesDAO = new ActividadesDAO();


            $ActividadesBean->setId_tipo_actividad($_SESSION['tipo_Actividad']);


            if (!isset($_REQUEST['toogle_productos']) && !isset($_REQUEST['rubro_nuevo'])) {

                $actividad = $_REQUEST['actividad'];
                $rubro = $_REQUEST['rubro'];


                $ActividadesBean->setId_rubro($rubro);
                $ActividadesBean->setAct_nombre($actividad);
                $ActividadesBean->setId_informe($_SESSION['id_ultimo_informe']);

                $RegistrarActividad = $ActividadesDAO->RegistrarActividad_NORMAL($ActividadesBean);
            }


            if (isset($_REQUEST['toogle_productos'])) {

                $actividad = $_REQUEST['actividad'];
                $titulo_producto = $_REQUEST['titulo_producto'];
                $autor_producto = $_REQUEST['autor_producto'];
                $estados_producto = $_REQUEST['estados_producto'];

                $ProductosBean->setPro_titulo($titulo_producto);
                $ProductosBean->setPro_autor($autor_producto);
                $ProductosBean->setPro_estado($estados_producto);

                $InsertarProducto = $ProductosDAO->InsertarDetallesProducto($ProductosBean);

                if ($InsertarProducto > 0) {

                    $ActividadesBean->setId_rubro(5);
                    $ActividadesBean->setAct_nombre($actividad);
                    $ActividadesBean->setId_informe($_SESSION['id_ultimo_informe']);

                    $RegistrarActividad = $ActividadesDAO->RegistrarActividad_PRODUCTOS($ActividadesBean, $ProductosBean);
                }
            }


            if (isset($_REQUEST['rubro_nuevo'])) {

                $actividad = $_REQUEST['actividad'];
                $nombre_rubro_nuevo = $_REQUEST['nombre_rubro_nuevo'];
                $descripcion = $_REQUEST['descripcion'];

                $RubrosBean->setNomb_rubro($nombre_rubro_nuevo);
                $RubrosBean->setDesc_rubro($descripcion);

                $insertarRubro = $RubrosDAO->RegistarRubro_Personalizado($RubrosBean);

                if ($insertarRubro > 0) {

                    $ActividadesBean->setAct_nombre($actividad);
                    $ActividadesBean->setId_informe($_SESSION['id_ultimo_informe']);

                    $RegistrarActividad = $ActividadesDAO->RegistrarActividad_RUBRO_NUEVO($ActividadesBean, $RubrosBean);
                }
            }
//SE LISTAN LOS REGISTROS Y LOS NUEVOS RUBROS QUE SE AÑANDAN

            $_SESSION['Lista_Actividades_Agregadas'] = $ActividadesDAO->ListarActividadesSegunInforme($ActividadesBean);
            $_SESSION['Lista_Actividades_Productos'] = $ActividadesDAO->ListarActividadesSegunInformeProductos($ActividadesBean);
            $_SESSION['listarRubrosSinProductos'] = $RubrosDAO->ListarRubrosSinProductos();

            echo '<script> document.location.href="../Vistas/(Colaborador)_LLenar_Actividades.php";</script>';
            break;
        }


    case 4: {// MENU DE CANCELACION DE REDACCION DE INFORME - COLABORADOR
            echo '<script src="../JAVASCRIPT/(Colaborador)_Cancelar_Informe_Redaccion.js"></script>';
            break;
        }


    case 5: { //   CANCELACION DE REDACCION DE INFORME - COLABORADOR
            $ActividadesDAO = new ActividadesDAO();
            $InformesDAO = new InformesDAO();
            $RubrosDAO = new RubrosDAO();


            $id_informe = $_SESSION['id_ultimo_informe'];
            $id_ultimo_periodo = $_SESSION['id_periodo_ultimo_informe'];

            $lista_rubros_personalizados = $RubrosDAO->ListarEliminarRubros($id_informe);
            $lista_rubro_productos = $RubrosDAO->ListarEliminarRubrosProductos($id_informe);


            $eliminacion_de_Actividades = $ActividadesDAO->EliminarActividadesPor_ID_informe($id_informe);


            if ($eliminacion_de_Actividades > 0) {

                $InformesDAO->EliminarInforme_por_ID($id_informe);
                $RubrosDAO->ArraydeRubrosPersonalizadosParaBorrar($lista_rubros_personalizados);
                $RubrosDAO->ArraydeRubrosPersonalizadosParaBorrar_Productos($lista_rubro_productos);
                $InformesDAO->Periodos_Eliminar($id_ultimo_periodo);

                echo '<script> document.location.href="../CONTROLADOR/UsuariosControlador.php?op=1";</script>';
            }


            break;
        }


    case 6: { //   ELIMINACION DE UNA ACTIVIDAD DE RUBROS PERSONALIZADOS

            $id_actividad = $_REQUEST['id_actividad'];
            $id_informe = $_SESSION['id_ultimo_informe'];

            $ActividadesDAO = new ActividadesDAO();
            $estado = $ActividadesDAO->EliminarActividadesPor_ID_Actividad($id_actividad);
            echo '<script> document.location.href="ColaboradorControlador.php?op=3";</script>';

            break;
        }

    case 7: { //   ELIMINACION DE UNA ACTIVIDAD DE RUBROS PRODUCTOS

            $id_actividad = $_REQUEST['id_actividad'];
            $id_informe = $_SESSION['id_ultimo_informe'];
            $id_rubro_productos = $_REQUEST['id_rubro_productos'];

            $ActividadesDAO = new ActividadesDAO();
            $RubrosDAO = new RubrosDAO();
            $estado = $ActividadesDAO->EliminarActividadesPor_ID_Actividad($id_actividad);

            if($estado>0){
                $RubrosDAO->EliminarRubroProductosPorID($id_rubro_productos);
                 echo '<script> document.location.href="ColaboradorControlador.php?op=3";</script>';
            }


            break;
        }

     case 8: { //   ELIMINACION DE UNA ACTIVIDAD DE RUBROS PRODUCTOS
            $msj = $_REQUEST['msj'];
            if($msj==1){

               $_SESSION['id_informe'] = $_REQUEST['id_informe'];
               echo '<script src="../JAVASCRIPT/(Colaborador)_Enviar_informe.js"></script> ';

            } else{

                $ColaboradorDAO = new ColaboradorDAO();
                $estado = $ColaboradorDAO->Enviar_a_Jefatura($_SESSION['id_informe']);
                unset($_SESSION['id_informe']);

                if($estado>0){
                     echo '<script> document.location.href="UsuariosControlador.php?op=1";</script>';
                }
            }

            break;
        }
        //Wilson: ir a modificar  Informe
    case 9:

             echo '<script> document.location.href="../Vistas/(colaborador)_modificar_informe.php";</script>';
             break;


}
?>
<a href=""></a>