   <?php
// include './(colaborador)_modificar_informe.php';
session_start();
     $listaRubrosSinProductos = $_SESSION['listarRubrosSinProductos'];
?>

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
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="../JAVASCRIPT/Validacion_de_Campos_VISIBLES_INVISIBLES.js"></script>
<script src="../jquery/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="../JAVASCRIPT/(Colaborador)_Redaccion_Completa.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="../js/jquery.validate.min.js"></script>

                <!--------------------------TABLAS DE ACTIVIDADES CON PRODUCTO-------------------------->
                <!-- Button trigger modal -->
                <div class="container ">
                    <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal"  >
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content col-lg-12  ">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body modal-xl ">

                                    <form name="formRedaccion" id="formInsertar" action="" method="post">

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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


