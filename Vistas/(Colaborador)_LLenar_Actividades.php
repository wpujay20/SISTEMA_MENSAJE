
<?php
if (!isset($_SESSION)) {
    session_start();
}

$listaRubrosSinProductos = $_SESSION['listarRubrosSinProductos'];

if (isset($_SESSION['Lista_Actividades_Agregadas'])) {
    $listaActividadesAgregadas = $_SESSION['Lista_Actividades_Agregadas'];
}

if (isset($_SESSION['Lista_Actividades_Productos'])) {
    $Lista_Actividades_Productos = $_SESSION['Lista_Actividades_Productos'];
}
?>
<html lang="es">

    <head>
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
        <style>
            .Ocultar_div{
                display: none;
            }
        </style>

        <title>Menú</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../JAVASCRIPT/Validacion_de_Campos_VISIBLES_INVISIBLES.js"></script>
        <script src="../jquery/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="../JAVASCRIPT/(Colaborador)_Redaccion_Completa.js" type="text/javascript"></script>


    </head>
    <body>

        <form name="formRedaccion" id="formInsertar" action="../CONTROLADOR/ColaboradorControlador.php?op=3" method="post">

            <div style="padding: 30px 200px 10px 200px ; ">

                <div class="modal-header">
                    <strong> <h4 style="color: green;"class="modal-title" id="exampleModalLabel">Registro de Actividades</h4></strong>
                </div>
                <h10 style="padding: 0px 0px 0px 15px; font-weight: bold">Aqui tendras que ingresar todas las actividades relacionadas a tu informe. Podras observar todas las actividades agregadas en la parte inferior </h10>

                <br> <br>
                <div class="modal-body">

                    <div id="actividades" class="form-group" >
                        <label>Ingrese la Actividad </label>
                        <input  name="actividad" type="text" class="form-control" id="actividad">
                    </div>


                    <div id="contenedor_de_checkbox_pro" class="form-group" > <!--  **************CHECKBOX  ***************************************************-->
                        <input type="checkbox"  value="si" id="si" name="toogle_productos" >
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


        <form name="formActividades" id="formActividades" action="../CONTROLADOR/ColaboradorControlador.php?op=2" method="post">
            <div style="padding: 0px 200px 10px 200px ; ">
                <h5> Actividades Registradas hasta el momento</h5>

                                <?php
                                if (!isset($listaActividadesAgregadas) || $listaActividadesAgregadas == null) {
                                    echo "<center>Aun no tienes actividades asignadas a este informe. Agrega unas arriba</center>";
                                } else {
                                    ?>

                    <div style="max-width: 1350px;" class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%"><thead>
                                            <tr>
                                                <th class="th-sm" scope="col">ID_actividad</th>
                                                <th class="th-sm" scope="col">Nombre</th>
                                                <th class="th-sm" scope="col">Rubro</th>
                                                <th class="th-sm" scope="col">Descripcion Del Rubro</th>
                                                <th class="th-sm" scope="col" >Accion</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php
                                foreach ($listaActividadesAgregadas as $indice):
                                    ?>
                                                <tr>
                                                    <td><?php echo $indice['id_actividad'] ?></td>
                                                    <td><?php echo $indice['act_nombre'] ?></td>
                                                    <td><?php echo $indice['nomb_rubro'] ?> </td>
                                                    <td><?php echo $indice['desc_rubro'] ?></td>

                                                    <td><a href="../CONTROLADOR/ColaboradorControlador.php?op=6&id_actividad=<?php echo $indice['id_actividad'];?>&id_rubro=<?php echo $indice['id_rubro'];?>"
                                                           class="btn btn-danger"> Eliminar </a></td>
                                                </tr>

                                            <?php
                                        endforeach;
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                                                    <?php } ?>

            </div>
        </form>





        <form name="formProductos" id="formActividades" action="../CONTROLADOR/ColaboradorControlador.php?op=2" method="post">
            <div style="padding: 0px 200px 100px 200px ; ">
                <h5> Actividades Registradas del Rubro Producto hasta el momento</h5>

<?php
if (!isset($Lista_Actividades_Productos) || $Lista_Actividades_Productos == null) {
    echo "<center>Aun no tienes actividades del Rubro Productos asignadas a este informe. Agrega unas arriba</center>";
} else {
    ?>

                    <div style="max-width: 1350px;" class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table style="font-size: small" id="example" class="table table-striped table-bordered" style="width:100%"><thead>
                                            <tr>
                                                <th class="th-sm" scope="col">ID_actividad</th>
                                                <th class="th-sm" scope="col">Nombre</th>
                                                <th class="th-sm" scope="col">Rubro</th>
                                                <th class="th-sm" scope="col">Descripcion Del Rubro</th>
                                                <th class="th-sm" scope="col">Titulo_Producto</th>
                                                <th class="th-sm" scope="col">Autor_Producto</th>
                                                <th class="th-sm" scope="col">Estado_Producto</th>
                                                <th class="th-sm" scope="col" >Accion</th>



                                            </tr>
                                        </thead>
                                        <tbody>
    <?php
    foreach ($Lista_Actividades_Productos as $indice):
        ?>
                                                <tr>
                                                    <td><?php echo $indice['id_actividad'] ?></td>
                                                    <td><?php echo $indice['act_nombre'] ?></td>
                                                    <td><?php echo $indice['nomb_rubro'] ?> </td>
                                                    <td><?php echo $indice['desc_rubro'] ?></td>
                                                    <td><?php echo $indice['pro_titulo'] ?></td>
                                                    <td><?php echo $indice['pro_autor'] ?></td>
                                                    <td><?php echo $indice['pro_estado'] ?> </td>

                                                   <td><a href="../CONTROLADOR/ColaboradorControlador.php?op=7&id_actividad=<?php echo $indice['id_actividad'];?>&id_rubro_productos=<?php echo $indice['id_rubro_productos'];?>"
                                                           class="btn btn-danger"> Eliminar </a></td>


                                                </tr>

        <?php
    endforeach;
    ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

<?php } ?>

        <div class="modal-footer">
            <a href="../CONTROLADOR/ColaboradorControlador.php?op=4" class="btn btn-secondary"> Cancelar Informe </a>
            <a href="#" id="generar" class="btn btn-success btn-lg"> Generar Informe </a>
        </div>
            </div>
            <a href=""></a>
        </form>
</body>
</html>