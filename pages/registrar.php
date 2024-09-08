<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Consulta</title>
</head>

<body>
    <div class="container-sm">
        <div class="consult-div">

            <?php
            include 'conexion.php';

            // Verificar si se ha enviado el formulario e asigna los datos a la tabla
            if (isset($_POST['signUP'])) {
                $cedula = $_POST['cedula'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $centrovotacion = $_POST['centrovotacion'];
                $numeromesa = $_POST['numeromesa'];

                $sql = "INSERT INTO personas (cedula, nombre, apellido, cetro_deVotacion, mesa) 
            VALUES (?, ?, ?, ?, ?)"; //inserta los a la tabla de datos
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $cedula, $nombre, $apellido, $centrovotacion, $numeromesa); //vincula los parametros de consulta y los envia al mysql

                if ($stmt->execute()) {
                    echo ' ';
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            }
            ?>
            <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalChoice">
                <div class="modal-dialog" role="document"> // crea un modal de confirmacion
                    <div class="modal-content rounded-3 shadow">
                        <div class="modal-body p-4 text-center">
                            <h5 class="mb-0">Registro exitoso</h5>
                            <p class="mb-0">El registro ha sido ingresado correctamente.</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="w-8 h-8" style="height: 300px; color:green;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="modal-footer flex-nowrap p-0" style="justify-content: center; list-style: none;">
                            <a class="btn-accept" href="index.php">vovler</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
