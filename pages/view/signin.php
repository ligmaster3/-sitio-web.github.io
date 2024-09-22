<?php	
// seguridad
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

    <title>Sign in - Progressus Bootstrap template</title>

    <link rel="shortcut icon" href="../imagen/logos/users-alt.png">

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="../css/style-sesion.css">

</head>

<body>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Iniciar Sesión</h1>
            </header>

            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 container">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Inicia sesión con tu cuenta</h3>
                        <p class="text-center text-muted">Si no cuenta con un usuario, <a
                                href="../pages/view/signup.php">Registrate</a> aqui</p>

                        <form action="validar.php" method="post">
                            <div class="top-margin">
                                <label>Usuario/Correo<span class="text-danger">*</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="top-margin">
                                <label>Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-action" type="submit" value="Ingresar">Iniciar
                                        Sesión</button>
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

    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <!-- <script src="../js/conexion.js"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>