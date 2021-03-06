<?php
ob_start();
session_start();
if (empty($_SESSION["nombre"])) {
    echo '<script> document.location.href="../index.php";</script>';
} else {
    $ListaXid = $_SESSION['ListaXid'];
//     var_dump($ListaXid);
    if (isset($_SESSION['Lista_Activi_Productos'])) {
        $Lista_Actividades_Productos = $_SESSION['Lista_Activi_Productos'];
//        var_dump($Lista_Actividades_Productos);
    }
    if (isset($_SESSION['Lista_Actividades'])) {
        $Lista_Actividades = $_SESSION['Lista_Actividades'];
        //var_dump($Lista_Actividades);
    }
    $listaRubrosSinProductos = $_SESSION['listarRubrosSinProductos'];
//     var_dump( $listaRubrosSinProductos  );
    $idInform = $_SESSION['id_inform'];
    // Tipo de cada informe
//     var_dump($idInform);
    if (isset($_SESSION['Tipoinforme'])) {
        $Tipoinforme = $_SESSION['Tipoinforme'][0]['id_tipo_act'];
        $NombreTipoInf = $_SESSION['Tipoinforme'][0]['nomb_tipo_act'];
    }
    ?>
    <!DOCTYPE html>
    <html>
        <head lang="es">
            <title>modificación de Informe</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Validate css-->
            <link href="../CSS/EstiloRegister.css" rel="stylesheet">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <!--datables CSS basico-->
            <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
            <!--datables estilo bootstrap 4 CSS-->
            <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
            <style> .Ocultar_div{ display: none;   } </style>
            <title>Menú</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="../JAVASCRIPT/Validacion_de_Campos_VISIBLES_INVISIBLES.js"></script>
            <script src="../jquery/jquery-3.3.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <script src="../JAVASCRIPT/(Colaborador)_Redaccion_Completa.js" type="text/javascript"></script>

            <script src="../js/jquery.validate.min.js"></script>
        </head>
        <body>
        <center>
            <?php foreach ($ListaXid as $info) { ?>
                <br>
                <strong> <h3 style="color: green;"class="modal-title" id="exampleModalLabel">Modificación de Informe con  <?php echo $NombreTipoInf ?></h4></strong>
            </center>
            <div class="d-flex">                
                <div class="col-sm-4">
                    <div class="container">
                        <form name="formRedaccion" id="formInsertar"action="../CONTROLADOR/ColaboradorControlador.php?op=16&id_informe=<?php echo $info['id_informe']; ?>&id_periodo=<?php echo $info['id_periodo']; ?>" method="POST"  >
                            <input type="hidden" name="id" value="<?php echo $info['id_informe'] ?>">
                            <div style="/*padding: 30px 200px 100px 200px*/ ;  " class=" ">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Titulo del Informe</label>
                                        <input  name="titulo" type="text" class="form-control" value="<?php echo $info['inf_titulo_col'] ?>" id="titulo" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Periodo de la actividad(Fecha/Inicio)</label>
                                        <input name="fecha_ini"  type="date" class="form-control"value="<?php echo $info['periodo_ini'] ?>"  id="fecha_ini" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Periodo de la actividad(Fecha/Final)</label>
                                        <input name="fecha_fin"  type="date" class="form-control"value="<?php echo $info['periodo_fin'] ?>" id="fecha_fin" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Horas Dedicadas</label>
                                        <input  name="horas" type="number" class="form-control" value="<?php echo $info['periodo_horas'] ?>" id="horas" required="">
                                    </div>
                                    <div class="form-group" >
                                        <label>Aqui puede redactar su informe </label>
                                        <textarea  style="height: 200px;" name="descripcion_informe" class="form-control " id="descripcion_informe" required="">
                                            <?php echo $info['inf_descripcion'] ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">                                    
                                    <a href="../CONTROLADOR/UsuariosControlador.php?op=1" class="btn btn-secondary" >Volver</a>
                                    <input type="submit" value="Actualizar" id="boton" class="btn btn-info">
                                </div>
                            <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="col-sm-12 ">
                <!--------------------------TABLAS DE ACTIVIDADES SIN PRODUCTO-------------------------->
                <BR>  <BR>  <BR>
                <h5> Actividades Registradas </h5>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogo1">Agregar Actividad</button>
                <form action="" method="post" >
                    <table border="1"style="font-size: small"   class="table table-striped table-bordered" style="width:100%">
                        <br>
                        <?php
                        if (!isset($Lista_Actividades) || $Lista_Actividades == null) {
                            echo 'Su informe no tiene actividades  ';
                        } else {
                            ?>
                            <thead>
                                <tr>
                                    <!-- <th class="th-sm" scope="col">ID_actividad</th> -->
                                    <th class="th-sm" scope="col">Nombre</th>
                                    <th class="th-sm" scope="col">Rubro</th>
                                    <th class="th-sm" scope="col">Descripcion Del Rubro</th>
                                    <th class="th-sm text-center" colspan="2"  >Accion  </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Lista_Actividades as $LA): ?>
                                    <tr>
                                        <!-- <td><?php // echo$LA['id_actividad']            ?></td> -->
                                        <td><?php echo $LA['act_nombre'] ?></td>
                                        <td><?php echo $LA['nomb_rubro'] ?></td>
                                        <td><?php echo $LA['desc_rubro'] ?></td>
                                        <td><a href="../CONTROLADOR/ColaboradorControlador.php?op=14
                                               &id_actividad=<?php echo $LA['id_actividad']; ?>
                                               &id_rubro=<?php echo $LA['id_rubro']; ?>
                                               &idInform=<?php echo $idInform; ?>"
                                               class="btn btn-danger"> Eliminar </a></td>
                                        <td>
                                            <!--de Modal 1 Editar actividades sin producto-->
                                            <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalNuevo" onclick="agregaform('<?php echo $idInform ?>', '<?php echo$LA['id_actividad'] ?>', '<?php echo $LA['act_nombre'] ?>', '<?php echo $LA['nomb_rubro'] ?>')"> Editar </button>
                                        </td>
                                    </tr>                                 
                                    <?php
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
                <!-- Modal para Editar actividades sin producto -->
                <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Editar Actividad</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="" id="id_informe" class="form-control input-sm">
                                <input type="hidden" name=""  id="id" class="form-control input-sm"  >
                                <label>Nombre de actividad</label>
                                <input type="text" name="" id="nombre" class="form-control input-sm">                                                                     
                                <label>Seleccione la Rubro al cual quiere modificar </label>
                                <select class="form-control" name="" id="rubro">
                                    <?php
                                    foreach ($listaRubrosSinProductos as $fila) {
                                        echo "<option value='" . $fila['id_rubro'] . "'>" . $fila['nomb_rubro'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                    <br><br><br>
                    <!--------------------------TABLAS DE ACTIVIDADES CON PRODUCTO-------------------------->
                    <h5> Actividades Registradas con rubro Producto</h5>
                    <table border="1"style="font-size: small"   class="table table-striped table-bordered" style="width:100%">
                        <br>
                        <?php
                        if (!isset($Lista_Actividades_Productos) || $Lista_Actividades_Productos == null) {
                            echo 'Su informe no tiene actividades del tipo producto';
                        } else {
                            ?>
                            <thead>
                                <tr>
                                    <!-- <th class="th-sm" scope="col">ID_actividad</th> -->
                                    <th class="th-sm" scope="col">Nombre</th>
                                    <th class="th-sm" scope="col">Rubro</th>
                                    <th class="th-sm" scope="col">Descripcion Del Rubro</th>
                                    <th class="th-sm" scope="col">Titulo_Producto</th>
                                    <th class="th-sm" scope="col">Autor_Producto</th>
                                    <th class="th-sm" scope="col">Estado_Producto</th>
                                    <th class="th-sm text-center" colspan="2" scope="col" >Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($Lista_Actividades_Productos as $LAP):
                                    ?>
                                    <tr>
                                        <!-- <td><?php // echo $LAP['id_actividad'];          ?></td> -->
                                        <td><?php echo $LAP['act_nombre']; ?></td>
                                        <!--<td><?php // echo $LAP['id_rubro'];          ?></td>-->
                                        <td><?php echo $LAP['nomb_rubro']; ?> </td>
                                        <td><?php echo $LAP['desc_rubro']; ?> </td>                                       
                                        <td><?php echo $LAP['pro_titulo']; ?> </td>
                                        <td><?php echo $LAP['pro_autor']; ?> </td>
                                        <td><?php echo $LAP['pro_estado']; ?> </td>

                                        <td><a href="../CONTROLADOR/ColaboradorControlador.php?op=15&id_actividad=<?php echo $LAP['id_actividad']; ?>&id_rubro_productos=<?php echo $LAP['id_rubro_productos']; ?>&idInform=<?php echo $idInform; ?>"                                              
                                               class="btn btn-danger"> Eliminar 
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal"onclick="agregaformProducto('<?php echo $idInform; ?>', '<?php echo $LAP['id_actividad']; ?>',
                                                            '<?php echo $LAP['id_rubro_productos']; ?>', '<?php echo $LAP['act_nombre']; ?>',
                                                            '<?php echo $LAP['nomb_rubro']; ?>', '<?php echo $LAP['pro_titulo']; ?>',
                                                            '<?php echo $LAP['pro_autor']; ?>', '<?php echo $LAP['pro_estado']; ?>')">Editar</button>
                                        </td>                                       
                                    </tr>
                                    <?php
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
                <!---------------------------------MODAL PARA AGREGAR  ACTIVIDADES------------------------------------------------------>
                <div class="container">
                    <div class="modal fade" id="dialogo1">
                        <div class=" modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content col-lg-15">
                                <!-- cabecera del diálogo -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Agregar Actividades</h4>
                                    <button type="button" class="close" data-dismiss="modal">X</button>
                                </div>
                                <!-- cuerpo del diálogo                                          ../CONTROLADOR/ColaboradorControlador.php?op=3    -->
                                <div class="modal-body modal-xl ">
                                    <form name="formRedaccion" id="formInsertar" action="../CONTROLADOR/ColaboradorControlador.php?op=13&idInform=<?php echo $idInform; ?>&idTipoAct=<?php echo $Tipoinforme; ?>" method="post">
                                        <div style="padding: 30px 200px 10px 200px ; ">
                                            <div class="modal-header">
                                                <strong> <h4 style="color: green;"class="modal-title" id="exampleModalLabel">Registro de Actividades</h4></strong>
                                            </div>
                                            <h10 style="padding: 0px 0px 0px 15px; font-weight: bold">Aqui tendras que ingresar todas las actividades relacionadas a tu informe. Podras observar todas las actividades agregadas en la parte inferior </h10>
                                            <br> <br>
                                            <div class="modal-body">
                                                <div id="actividades" class="form-group" >
                                                    <label>Ingrese la Actividad </label>
                                                    <input  name="actividad" type="text" class="form-control" id="actividad" >
                                                </div>
                                                <div id="contenedor_de_checkbox_pro" class="form-group" > <!--  **************CHECKBOX  ***************************************************-->
                                                    <input type="checkbox"  value="si" id="si" name="toogle_productos"  >
                                                    <label style="color: green; font-weight: bold;">Marcar solo si la actividad pertenece al rubro productos </label>
                                                </div>
                                                <div id="bloque_productos" class="form-group" style="padding: 20px; background-color: #f5f5f5; border-bottom: green solid 0.5px; padding-bottom: 20px; border-top: green solid 0.5px; padding-top: 10px;">
                                                    <label for="recipient-name" class="col-form-label">Ingrese su titulo:</label>
                                                    <input name="titulo_producto"  type="text" class="form-control" id="titulo_producto">
                                                    <label for="recipient-name" class="col-form-label">Ingrese su autor:</label>
                                                    <input name="autor_producto"  type="text" class="form-control" id="autor_producto">
                                                    <label> Seleccione el estado del producto</label>
                                                    <select class="form-control" name="estados_producto" id="estados_producto" >
                                                        <option value=""> </option>
                                                        <option value="revisión"> revisión</option>
                                                        <option value="aceptado"> aceptado</option>
                                                        <option value="rechazado"> rechazado</option>
                                                        <option value="publicado"> publicado</option>
                                                        <option value="archivado"> archivado </option>
                                                    </select>
                                                </div>
                                                <div id="rubros" class="form-group" >
                                                    <label>Seleccione la Rubro al cual pertenece su actividad </label>
                                                    <select class="form-control" name="rubro" id="rubro">
                                                        <?php
                                                        foreach ($listaRubrosSinProductos as $fila) {
                                                            echo "<option value='" . $fila['id_rubro'] . "'>" . $fila['nomb_rubro'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!--  **************CHECKBOX  ******************************************************************-->
                                                <div id="contenedor_de_checkbox" class="form-group" > <!--  **************CHECKBOX  ***************************************-->
                                                    <input type="checkbox"  value="rubro_nuevo" id="rubro_nuevo" name="rubro_nuevo" >
                                                    <label style=" color: green; font-weight: bold;"> Marcar solo en caso no se encuentre tu rubro disponible </label>
                                                </div>
                                                <div id="bloque_rubros_personalizados" class="form-group" style="padding: 20px; background-color: #f5f5f5; border-bottom: green solid 0.5px; padding-bottom: 20px; border-top: green solid 0.5px; padding-top: 10px;">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Ingrese Nombre del nuevo Rubro</label>
                                                        <input name="nombre_rubro_nuevo"  type="text" class="form-control" id="nombre_rubro_nuevo">
                                                    </div>
                                                    <div class="form-group" >
                                                        <label>Añade una descripcion a tu nuevo rubro </label>
                                                        <textarea  style="height: 200px;" name="descripcion" class="form-control" id="descripcion"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Agregar Actividad" id="boton" class="btn btn-warning">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- pie del diálogo -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">          
                    <!-- Modal para edicion de datos de actividad con rubro productos -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modificar Actividades con Rubro producto</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="text" hidden="" id="id_informe" name="">
                                    <input type="text" hidden="" id="id_act" name="">
                                    <input type="text" hidden="" id="id_rubro" name="">
                                    <label for="Nombre">Nombre:</label>
                                    <input type="text" name="" id="nombreu" class="form-control input-sm">
                                    <label>rubro:</label>
                                    <input type="text" name="" disabled="" id="rubrou" class="form-control input-sm">
                                    <label>Titulo Producto:</label>
                                    <input type="text" name="" id="titulou" class="form-control input-sm">
                                    <label>Autor Producto:</label>
                                    <input type="text" name="" id="autoru" class="form-control input-sm">
                                    <label>Seleccione al rubro a modificar</label>
                                    <select class="form-control" name="" id="estadopro" >
                                        <option value=""> </option>
                                        <option value="revisión"> revisión</option>
                                        <option value="aceptado"> aceptado</option>
                                        <option value="rechazado"> rechazado</option>
                                        <option value="publicado"> publicado</option>
                                        <option value="archivado"> archivado </option>
                                    </select>
                                </div>
                                <div class="modal-footer">                                     
                                    <button type="button" class="btn btn-info" id="ActualizarDatos" data-dismiss="modal">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- datatables JS -->
                <script src="js/ajax.js" type="text/javascript"></script>
                <script src="js/funciones.js" type="text/javascript"></script>
                <script type="text/javascript" src="../datatables/datatables.min.js"></script>
                <script type="text/javascript" src="../jquery/main.js"></script>
            <?php } ?>

</body>
</html>