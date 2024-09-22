<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <title>Registro de Usuario</title>

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="../css/style-sesion.css">
</head>

<body>
    <div class="container-sm">
        <div class="consult-div">

            <?php
        include 'conexion.php'; // Asegúrate de tener la conexión a la base de datos en este archivo

        // Verificar si se ha enviado el formulario
        if (isset($_POST['signUP'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $edad = $_POST['edad'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $confirmContrasena = $_POST['confirmcontrasena'];

            // Verificar que las contraseñas coinciden
            if ($contrasena != $confirmContrasena) {
                echo "<div class='alert alert-danger'>Las contraseñas no coinciden.</div>";
            } else {
                // Encriptar la contraseña antes de guardarla
                $contrasenaEncriptada = password_hash($contrasena, PASSWORD_BCRYPT);

                // Consulta SQL para insertar el usuario en la tabla `usuario`
                $sql = "INSERT INTO usuario (nombre, apellido, edad, email, password) 
                        VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $nombre, $apellido, $edad, $correo, $contrasenaEncriptada);

                if ($stmt->execute()) {
                    // Modal de confirmación
                    echo '
                    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalChoice">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content rounded-3 shadow">
                                <div class="modal-body p-4 text-center">
                                    <h5 class="mb-0">Registro exitoso</h5>
                                    <p class="mb-0">El registro ha sido ingresado correctamente.</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-8 h-8" style="height: 300px; color:green;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="modal-footer flex-nowrap p-0" style="justify-content: center; list-style: none;">
                                    <a class="btn-accept" href="/index.html">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>';
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
                }

                $stmt->close();
            }

            $conn->close();
        }
        ?>

            <div class="container-sm">
                <div class="consult-div">
                    <!-- Formulario de registro -->
                    <form action="" method="POST">
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
                                    Lei los <a href="page_terms.html">Términos y Condiciones</a>
                                </label>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button type="submit" class="btn btn-action">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>