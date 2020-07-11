<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    echo '<script> document.location.href="../index.php";</script>';
}else{
	$id_informe=$_REQUEST['id_informe'];
	$titulo=$_REQUEST['titulo'];
	$area=$_REQUEST['area'];
	$fecha=$_REQUEST['fecha'];
	$periofoIni=$_REQUEST['periofoIni'];
	$periodoFin=$_REQUEST['periodoFin'];
	$periodoHoras=$_REQUEST['periodoHoras'];
	$estado=$_REQUEST['estado'];
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

        <script src="../js/jquery.validate.min.js"></script>
</head>
<body>
	<center>
		<h1>Modificación de Informe</h1>
		 <form name="formRedaccion" id="formInsertar" action="../CONTROLADOR/ColaboradorControlador.php?op=2&tipo_Actividad=<?php echo $id_tipo_actividad;?>" method="post">

            <div style="padding: 30px 200px 100px 200px ; ">

                <div class="modal-header">

                    <strong> <h4 style="color: green;"class="modal-title" id="exampleModalLabel">Menu de Redaccion de informes de actividades <?php echo $nombre;?></h4></strong>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Titulo del Informe:</label>
                        <input  name="titulo" type="text" class="form-control" id="titulo">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Periodo de la actividad(Fecha/Inicio)</label>
                        <input name="fecha_ini"  type="date" class="form-control" id="fecha_ini">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Periodo de la actividad(Fecha/Final)</label>
                        <input name="fecha_fin"  type="date" class="form-control" id="fecha_fin">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Horas Dedicadas</label>
                        <input  name="horas" type="text" class="form-control" id="horas">
                    </div>

                    <div class="form-group" >
                        <label>Aqui puede redactar su informe </label>
                        <textarea  style="height: 200px;" name="descripcion_informe" class="form-control" id="descripcion_informe"></textarea>
                    </div>

                </div>

                <div class="modal-footer">

                    <a href="EmpleadoPrincipal.php" class="btn btn-secondary" >Volver</a>
                    <input type="submit" value="Siguiente" id="boton" class="btn btn-info">

                </div>
            </div>

        </form>


	</center>
<?php }?>
    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>

    <script type="text/javascript" src="../jquery/main.js"></script>


</body>
</html>