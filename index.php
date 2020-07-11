<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="Kodinger">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Login General</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/my-login.css">
    </head>

    <body class="my-login-page">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div>
                            <br><br><br><br><br>
                        </div>
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">Login</h4>

                                <form method="GET" class="my-login-validation" novalidate="" action="CONTROLADOR/Registro_Login_Controlador.php">
                                    <input type="hidden" name="op" value="1">
                                    <div class="form-group">
                                        <label for="usuario">Nombre de usuario</label>
                                        <input type="usuario" class="form-control" name="usuario" value="" required autofocus>
                                        <div class="invalid-feedback">
                                            El nombre de usuario es requerido
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Contraseña

                                        </label>
                                        <input id="password" type="password" class="form-control" name="password" required data-eye>
                                        <div class="invalid-feedback">
                                            La Contraseña es requerida holis
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                        </div>
                                    </div>

                                    <div class="form-group m-0">
                                        <input type="submit" value="Login" name="login"  class="btn btn-primary btn-block">
                                        <a href="CONTROLADOR/Registro_Login_Controlador.php?op=4" class="btn btn-success btn-block"> Registrate</a>

                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="footer">
                            Copyright &copy; 2020 &mdash; Universidad Autonoma del Peru
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="js/my-login.js"></script>
    </body>
</html>
