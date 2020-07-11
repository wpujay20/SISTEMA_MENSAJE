
$(document).ready(function () {
                //obtenemos el valor de los input

                $('#adicionar').click(function () {
                    var nr = document.getElementById("nr").value;
                    var a = 8;
                    var i = a; //contador para asignar id al boton que borrara la fila
                    var fila = '<tr id="row' + i + '"><td>' + nr + '</td><td><button type="button" class="btn btn-danger btn-small" name="submit" id="submit">Modificar</button></td></tr>';
                    //esto seria lo que contendria la fila
                    a + 1;
                    $('#mytable tr:first').after(fila);
                    $("#adicionados").text(""); //esta instruccion limpia el div adicionados para que no se vayan acumulando
                    var nFilas = $("#mytable tr").length;
                    $("#adicionados").append(nFilas - 1);
                    //le resto 1 para no contar la fila del header
                    document.getElementById("nr").value = "";
                    document.getElementById("nr").focus();
                });
            });

            $(document).ready(function () {
                //obtenemos el valor de los input

                $('#adicionari').click(function () {
                    var ni = document.getElementById("ni").value;
                    var estado = document.getElementById("estado").value;
                    var i = 6; //contador para asignar id al boton que borrara la fila
                    var fila = '<tr id="row' + i + '"><th scope="row">' + i + '</th><td>' + ni + '</td><td>' + estado + '</td></tr>';
                    //<tr id="row' + i + '"><th scope="row">' + i + '</th><td>' + ni + '</td><td>' + estado + '</td></tr>esto seria lo que contendria la fila<tr id="row' + i + '"><th scope="row">' + i + '</th><td>' + ni + '</td><td>' + estado + '</td></tr>
                    i++;
                    $('#example tr:first').after(fila);
                    $("#adicionados").text(""); //esta instruccion limpia el div adicionados para que no se vayan acumulando
                    var nFilas = $("#example tr").length;
                    $("#adicionados").append(nFilas - 1);
                    //le resto 1 para no contar la fila del header
                    document.getElementById("i").value = "";
                    document.getElementById("ni").value = "";
                    document.getElementById("estado").value = "";
                    document.getElementById("ni").focus();
                });
            });

            $(document).ready(function () {
                //obtenemos el valor de los input

                $('#adicionari3').click(function () {
                    var n = document.getElementById("n").value;
                    var ap = document.getElementById("ap").value;
                    var ar = document.getElementById("ar").value;
                    var e = document.getElementById("e").value;
                    var f = document.getElementById("f").value;
                    var p = document.getElementById("p").value;
                    var ea = document.getElementById("ea").value;
                    var r = document.getElementById("r").value;
                    var hd = document.getElementById("hd").value;
                    var i = 6; //contador para asignar id al boton que borrara la fila
                    var fila = '<tr id="row' + i + '"><td>' + n + '</td><td>' + ap + '</td><td>' + ar + '</td><td>' + e + '</td><td>' + f + '</td><td>' + p + '</td><td>' + ea + '</td><td>' + r + '</td><td>' + hd + '</td></tr>';
                    //esto seria lo que contendria la fila
                    i++;
                    $('#tabla tr:first').after(fila);
                    $("#adicionados").text(""); //esta instruccion limpia el div adicionados para que no se vayan acumulando
                    var nFilas = $("#tabla tr").length;
                    $("#adicionados").append(nFilas - 1);
                    //le resto 1 para no contar la fila del header
                    document.getElementById("n").value = "";
                    document.getElementById("ap").value = "";
                    document.getElementById("ar").value = "";
                    document.getElementById("e").value = "";
                    document.getElementById("f").value = "";
                    document.getElementById("p").value = "";
                    document.getElementById("ea").value = "";
                    document.getElementById("r").value = "";
                    document.getElementById("hd").value = "";
                });
            });