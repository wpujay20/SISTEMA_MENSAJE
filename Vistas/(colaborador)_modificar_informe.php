<?php
session_start();
if (!isset($_SESSION["nombre"])) {
    echo '<script> document.location.href="../index.php";</script>';
}else{
   $ListaXid=$_SESSION['ListaXid'];


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
		<h1>Modificación de Informe</h1>

		 <form name="formRedaccion" id="formInsertar" action="../CONTROLADOR/ColaboradorControlador.php?op=2&tipo_Actividad=<?php // echo $id_tipo_actividad;?>" method="post">
		</center>
		 	<?php foreach ($ListaXid as $info  ) { ?>
		 		<input type="hidden" name="id" value="<?php echo $info['id_informe']?>">

            <div style="/*padding: 30px 200px 100px 200px*/ ;  " class="container">

                <div class="modal-header">
                    <strong> <h4 style="color: green;"class="modal-title" id="exampleModalLabel">Modificación de Informe <?php echo $info['inf_titulo_col']?></h4></strong>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Titulo del Informe</label>
                        <input  name="titulo" type="text" class="form-control" value="<?php  echo $info['inf_titulo_col']?>" id="titulo">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Periodo de la actividad(Fecha/Inicio)</label>
                        <input name="fecha_ini"  type="date" class="form-control"value="<?php echo $info['periodo_ini']?>"  id="fecha_ini">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Periodo de la actividad(Fecha/Final)</label>
                        <input name="fecha_fin"  type="date" class="form-control"value="<?php echo $info['periodo_fin']?>" id="fecha_fin">
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Horas Dedicadas</label>
                        <input  name="horas" type="text" class="form-control" value="<?php echo $info['periodo_horas']?>" id="horas">
                    </div>

                    <div class="form-group" >
                        <label>Aqui puede redactar su informe </label>

                        <textarea  style="height: 200px;" name="descripcion_informe" class="form-control" id="descripcion_informe" >
<?php echo $info['inf_descripcion']?>
                        </textarea>
                    </div>

                </div>

                <div class="modal-footer">

                    <a href="EmpleadoPrincipal.php" class="btn btn-secondary" >Volver</a>
                    <input type="submit" value="Siguiente" id="boton" class="btn btn-info">

                </div>

            	 <?php	}?>

        </form>
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>



    </div>



<?php }?>
    <!-- datatables JS -->
    <script type="text/javascript" src="../datatables/datatables.min.js"></script>

    <script type="text/javascript" src="../jquery/main.js"></script>


</body>
</html>