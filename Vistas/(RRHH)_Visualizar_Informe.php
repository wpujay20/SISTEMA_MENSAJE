<?php
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
    echo '<script> document.location.href="../index.php";</script>';
}
if (!isset($_SESSION['Inf_con_det']) || $_SESSION['Inf_con_det'] == null) {
    $informes = null;
} else {
    $informes = $_SESSION['Inf_con_det'];
}
//var_dump($informes);
// var_dump(informesSinProductos);
//print_r($detalleInforme);
?>

<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!--datables CSS basico-->
        <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css"/>
        <!--datables estilo bootstrap 4 CSS-->
        <link rel="stylesheet"  type="text/css" href="../datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

        <title>Menú</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="../JAVASCRIPT/Opcion_Cerrar_Sesion.js"></script>

    </head>
    <body>
        <div style="height:50px">
            <div class="card-body">
                <!-- Button trigger modal -->
                <a href="../CONTROLADOR/UsuariosControlador.php?op=3" class="btn btn btn-info" id="volver"> Volver al Menu Principal </a>
                <a href="#" class="btn btn-secondary" id="cerrar">Cerrar Sesion</a>

                <br><br><label class="text-left"> <?php echo "<strong>Bienvenido</strong> <br>" . $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></label>
            </div>


            <!-- Tabla Informes -->
            <!--Ejemplo tabla con DataTables-->
            <div style="padding-bottom:20px; height:50px;text-align: center">
<!--                <h4>Informe de <?php // echo $informesSinProductos[0]['nombre'] . "  " . $informesSinProductos[0]['apellido'] . " - " . $informesSinProductos[0]['inf_titulo_col']   ?> </h4>-->
                <h4>DETALLE DE LOS INFORMES</h4>
            </div>
            <!-- TIENES PENSADO AVANZAR LA VISUALIZACION DE LOS INFORMES , ASI COMO EL MINI MENU DE ENVIO A RR.HH Y EL SPRITN ESTARA TERMINADO -->
            <!--Ejemplo tabla con DataTables-->


            <div style="max-width: 1350px;" class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
                            <div class="form-group">
                                <label  style="font-weight: bold">Titulo General :</label>
                                <p>
                                    <?php echo $informes[0]['titulo_desc']; ?>
                                </p>
                            </div>



                            <div class="form-group">
                                <label  style="font-weight: bold">Asunto :</label>
                                <p>
                                    <?php echo $informes[0]['asunto_det']; ?>
                                </p>
                            </div>



                            <div class="form-group">
                                <label  style="font-weight: bold">Descripcion del Detalle :</label>
                                <p>
                                    <?php echo $informes[0]['desc_det']; ?>
                                </p>
                            </div>
                        
                    </div>
                    
                        <div class="form-group">
                            <label  style="font-weight: bold; color: green ">Informes Adjuntos:</label>
                            
                            <table style="font-size: small" id="" class="table table-striped table-bordered" style="width:100%"><thead>
                                <thead>
                                    <tr>
                                        <th class="th-sm" scope="col" >ID_Inf</th>
                                        <th class="th-sm" scope="col" >Nombres Colaborador</th>
                                        <th class="th-sm" scope="col" >Apellidos Colaborador</th>
                                        <th class="th-sm" scope="col">Titulo</th>
                                        <th class="th-sm" scope="col">Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($informes as $indice): ?>
                                        <tr>
                                            <td><?php echo $indice['id_informe']; ?></td>
                                            <td><?php echo $indice['nombre']; ?> </td>
                                            <td><?php echo $indice['apellido']; ?></td>
                                            <td><?php echo $indice['inf_titulo_col']; ?></td>
                                            <td><a href="../CONTROLADOR/RRHH_Controlador.php?op=3&id_informe=<?php echo $indice['id_informe'];?>&det_inf=<?php echo $indice['id_det_inf']?>" class="btn btn-info"> Ver Informe </a></td>
                                            <?php
                                        endforeach;
                                        ?>
                                </tbody>
                            </table>
                            
                        </div>
                    
                </div>
            </div>
        </div>
        <br>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <script src="../popper/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>

    <script type="text/javascript" src="../jquery/main.js"></script>

</body>
</html>