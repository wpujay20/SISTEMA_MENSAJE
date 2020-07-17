x
<?php
if (!isset($_SESSION)) {
    session_start();
}

$listaAreaas = $_SESSION['Lista_Areas'];

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

        <title>Menú</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../jquery/Jefe.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/ValidarFormularios.js"></script>



    </head>
    <body>

        <form name="formInsertar" id="formInsertar" action="../CONTROLADOR/Registro_Login_Controlador.php?op=5" method="post">


            <div style="padding: 30px 200px 100px 200px ; ">

                <div class="modal-header">
                    <strong> <h4 class="modal-title" id="exampleModalLabel">Registrate como Colaborador</h4></strong>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input  name="nombre" type="text" class="form-control" id="nombre">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Apellido:</label>
                        <input name="apellido"  type="text" class="form-control" id="apellido">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">DNI:</label>
                        <input name="dni"  type="text" class="form-control" id="dni">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre de usuario:</label>
                        <input  name="usuario" type="text" class="form-control" id="usuario">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña</label>
                        <input  name="pass1" type="password" class="form-control" id="pass1">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Repetir Contraseña</label>
                        <input  name="pass2" type="password" class="form-control" id="pass2">
                    </div>


                    <div class="form-group" >
                        <label>Seleccione Area al que pertenece</label>
                        <select class="form-control" name="area" >
                            <?php
foreach ($listaAreaas as $fila) {

    echo "<option value='" . $fila['id_area'] . "'>" . $fila['area_nombre'] . "</option>";
}
?>
                        </select>
                    </div>


                </div>
                <div class="modal-footer">

                    <a href="../index.php" class="btn btn-secondary" >Volver</a>


                    <input type="submit" value="enviar" id="boton" class="btn btn-info">
                </div>
            </div>

        </form>

    </body>

    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>

    <script type="text/javascript" src="../jquery/main.js"></script>

</body>
</html>