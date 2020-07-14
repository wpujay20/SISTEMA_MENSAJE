<?php
session_start();
if (empty($_SESSION["nombre"])) {
    echo '<script> document.location.href="../index.php";</script>';
} else {
    $ListaXid = $_SESSION['ListaXid'];
    // var_dump($ListaXid);
    if (isset($_SESSION['Lista_Activi_Productos'])) {
        $Lista_Actividades_Productos = $_SESSION['Lista_Activi_Productos'];
        //var_dump($Lista_Actividades_Productos);
    }
    if (isset($_SESSION['Lista_Actividades'])) {
        $Lista_Actividades = $_SESSION['Lista_Actividades'];
        //var_dump($Lista_Actividades);
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
            <title>Menú</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

            <script src="../js/jquery.validate.min.js"></script>
        </head>
        <body>
        <center>

            <?php foreach ($ListaXid as $info) { ?>
                <div class=" ">
                    <strong> <h3 style="color: green;"class="modal-title" id="exampleModalLabel">Modificación de Informe <?php echo $info['inf_titulo_col'] ?></h4></strong>
                </div>
            </center>

            <div class="d-flex">
                <div class="col-sm-4">
                    <form name="formRedaccion" id="formInsertar" action="../CONTROLADOR/ColaboradorControlador.php?op=2&tipo_Actividad=<?php // echo $id_tipo_actividad;                            ?>" method="post">


                        <input type="hidden" name="id" value="<?php echo $info['id_informe'] ?>">

                        <div style="/*padding: 30px 200px 100px 200px*/ ;  " class=" ">

                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Titulo del Informe</label>
                                    <input  name="titulo" type="text" class="form-control" value="<?php echo $info['inf_titulo_col'] ?>" id="titulo">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Periodo de la actividad(Fecha/Inicio)</label>
                                    <input name="fecha_ini"  type="date" class="form-control"value="<?php echo $info['periodo_ini'] ?>"  id="fecha_ini">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Periodo de la actividad(Fecha/Final)</label>
                                    <input name="fecha_fin"  type="date" class="form-control"value="<?php echo $info['periodo_fin'] ?>" id="fecha_fin">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Horas Dedicadas</label>
                                    <input  name="horas" type="text" class="form-control" value="<?php echo $info['periodo_horas'] ?>" id="horas">
                                </div>

                                <div class="form-group" >
                                    <label>Aqui puede redactar su informe </label>

                                    <textarea  style="height: 200px;" name="descripcion_informe" class="form-control " id="descripcion_informe" >
                                        <?php echo $info['inf_descripcion'] ?>
                                    </textarea>
                                </div>

                            </div>

                            <div class="modal-footer">

                                <a href="EmpleadoPrincipal.php" class="btn btn-secondary" >Volver</a>
                                <input type="submit" value="Siguiente" id="boton" class="btn btn-info">

                            </div>

                        <?php } ?>

                </form>
            </div>
        </div>
        <!--------------------------TABLAS DE ACTIVIDADES-------------------------->

        <div class="d-flex">

            <div class="col-sm-12 ">
                <!--------------------------TABLAS DE ACTIVIDADES SIN PRODUCTO-------------------------->
                <BR>  <BR>  <BR>  
                <h5> Actividades Registradas </h5>
                <?php ?>
                <form>
                    <table border="1"style="font-size: small"   class="table table-striped table-bordered" style="width:100%">
                        <?php
                        if (!isset($Lista_Actividades) || $Lista_Actividades == null) {
                            echo 'Su informe no tiene actividades  ';
                        } else {

                            
                                ?>
                                <thead>
                                    <tr>
                                        <th class="th-sm" scope="col">ID_actividad</th>
                                        <th class="th-sm" scope="col">Nombre</th>
                                        <th class="th-sm" scope="col">Rubro</th>
                                        <th class="th-sm" scope="col">Descripcion Del Rubro</th>
                                        <th  >Accion 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Lista_Actividades as $LA):       ?>

                                    <tr>
                                        <td><?php echo$LA['id_actividad'] ?></td>
                                        <td><?php echo$LA['act_nombre'] ?></td>
                                        <td><?php echo$LA['nomb_rubro'] ?></td>
                                        <td><?php echo$LA['desc_rubro'] ?></td>

                                        <td><a href="#"class="btn btn-danger"> Eliminar </a></td>
                                        <td><a href="#"class="btn btn-warning"> Editar </a></td> 

                                    </tr>
                                    <?php
                                endforeach;
                            }
                            ?>
                        </tbody>
                    </table>

                </form>
                <?php ?>


                <?php ?>

                <form>
                    <br><br><br>
                    <!--------------------------TABLAS DE ACTIVIDADES CON PRODUCTO-------------------------->
                    <h5> Actividades Registradas con rubro Producto</h5>
                    <table border="1"style="font-size: small"   class="table table-striped table-bordered" style="width:100%">
                        <?php
                        if (!isset($Lista_Actividades_Productos) || $Lista_Actividades == null) {
                            echo 'Su informe no tiene actividades del tipo producto';
                        } else {
                            foreach ($Lista_Actividades_Productos as $LAP):
                                ?>
                                <thead>
                                    <tr>
                                        <th class="th-sm" scope="col">ID_actividad</th>
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

                                    <tr>
                                        <td><?php echo $LAP['id_actividad']; ?></td>
                                        <td><?php echo $LAP['act_nombre']; ?></td>
                                        <td><?php echo $LAP['id_rubro']; ?></td>
                                        <td><?php echo $LAP['nomb_rubro']; ?></td>
                                        <td><?php echo $LAP['desc_rubro']; ?></td>
                                        <td><?php echo $LAP['id_rubro_productos']; ?></td>
                                        <td><?php echo $LAP['pro_titulo']; ?></td>
                                               <!--   <td><a href="../CONTROLADOR/ColaboradorControlador.php?op=7&id_actividad=<?php echo $indice['id_actividad']; ?>&id_rubro_productos=<?php //echo $indice['id_rubro_productos'];                        ?>"class="btn btn-danger"> Eliminar </a></td> -->
                                        <td><a href="#"class="btn btn-danger"> Eliminar </a></td>
                                        <td><a href="#"class="btn btn-warning"> Editar </a></td> 
                                    </tr>
                                    <?php
                                endforeach;
                            }
                            ?>

                        </tbody>
                    </table>
                    <!--------------------------TABLAS DE ACTIVIDADES CON PRODUCTO-------------------------->


                </form>
                <?php ?>
                <!--------------------------TABLAS DE ACTIVIDADES-------------------------->
            </div>
        </div>
    <?php } ?>


    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>

    <script type="text/javascript" src="../jquery/main.js"></script>


</body>
</html>