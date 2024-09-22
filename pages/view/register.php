<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/sesion-styles.css">
    <title>Register  /  Usuario</title>
</head>

<body>
    <div class="container-sm">
        <div class="consult-div">

            <?php
            include 'conexion.php'; // Asegúrate de tener la conexión a la base de datos en este archivo

            // Recuperar datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $confirmar_contrasena = $_POST['confirmar_contrasena'];

            // Validar contraseñas
            if ($contrasena !== $confirmar_contrasena) {
                echo "<div class='alert alert-danger'>Las contraseñas no coinciden.</div>";
                exit;
            }

            // Encriptar la contraseña
            $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

            // Preparar y ejecutar la consulta
            $sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $nombre, $apellido, $correo, $contrasena_hash);

            if ($stmt->execute()) {
                // Registro exitoso
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
                    <a class="btn-accept" href="../index.html">Volver</a>
                </div>
            </div>
        </div>
    </div>';
            } else {
                // Mostrar mensaje de error
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }

            // Cerrar la conexión
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>



</body>

</html>