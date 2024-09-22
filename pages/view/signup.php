<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>Sign up</title>

    <link rel="shortcut icon" href="../imagen/logos/users-alt.png">

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="../css/style-sesion.css">

    <!-- Article main content -->
    <article class="col-xs-12 maincontent">
        <header class="page-header">
            <h1 class="page-title">Registro</h1>
        </header>

        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="thin text-center">Registra una nueva cuenta</h3>
                    <p class="text-center text-muted">Si ya cuenta con un usuario, presione aqui. <a
                            href="../pages/signin.php">Login</a>.</p>
                    <hr>

                    <form action="register.php" method="POST">
                        <div class="top-margin">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" required>
                        </div>
                        <div class="top-margin">
                            <label>Apellido</label>
                            <input type="text" name="apellido" class="form-control" required>
                        </div>
                        <div class="top-margin">
                            <label>Edad</label>
                            <input type="text" name="apellido" class="form-control" required>
                        </div>
                        <div class="top-margin">
                            <label>Correo <span class="text-danger">*</span></label>
                            <input type="email" name="correo" class="form-control" required>
                        </div>

                        <div class="row top-margin">
                            <div class="col-sm-6">
                                <label>Contraseña <span class="text-danger">*</span></label>
                                <input type="password" name="contrasena" class="form-control" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Confirmar Contraseña <span class="text-danger">*</span></label>
                                <input type="password" name="confirmar_contrasena" class="form-control" required>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-8">
                                <label class="checkbox">
                                    <input type="checkbox" required>
                                    Lei los <a href="page_terms.html">Terminos y Condiciones</a>
                                </label>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button class="btn btn-action" type="submit"><a
                                        href="/pages/view/register.php"></a>Registro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>

    <!-- /Article -->
    </div>
    </div>

    </body>

</html>