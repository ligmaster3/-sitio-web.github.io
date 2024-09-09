<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Consulta</title>
</head>
// Se incluye un archivo PHP para la conexión a la base de datos y se prepara una consulta SQL que busca en la tabla personas 
// utilizando la cédula ingresada por el usuario.
<body>
    <div class="container-sm">
        <div class="consult-div">
            <?php
            include 'conexion.php'; //contiene la conexion a la base de datos
//valida si se enviaron al metodo post la existencia de esa cedula
            if (isset($_POST['cedula'])) { 
                $cedula = $_POST['cedula'];

                $sql = "SELECT id, nombre, apellido, cedula, cetro_deVotacion, mesa FROM personas WHERE cedula = ?"; // busca en la base de datos la cedula dentro de la tabla personas
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("s", $cedula);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    //obtiene los resultados de la consulta
                    if ($result->num_rows > 0) {
                        // Display the title and header section once
                        echo "
                        <section>
                            <div class='titulo-text'>
                                <h1 class='title-head'>Usuario</h1>
                            </div>
                            <hr>
                            <div class='s-head'>
                                <ul class='nav' style='justify-content: space-between;'>
                                    <li class='nav-item'><a class='nav-link'>ID</a></li>
                                    <li class='nav-item'><a class='nav-link'>Nombre</a></li>
                                  
                                </ul>
                            </div>
                        </section>";

                        // Loop through results and display user information
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <div class='s-head'>
                                <ul class='d-flex p-4 text-center' style='justify-content: space-between;'>
                                    <li class='nav-item'><a class='nav-link'>" . $row["id"] . "</a></li>
                                    <li class='nav-item'><a class='nav-link'>" . $row["nombre"] . " " . $row["apellido"] . "</a></li>
                                  
                                </ul>
                            </div>";
                        }
                    } else {
                        echo "<p>No se encontraron registros.</p>";
                    }

                    $stmt->close();
                } else {
                    echo "<p>Error en la preparación de la consulta: " . $conn->error . "</p>";
                }

                $conn->close();
            } else {
                echo "<p>No se ha enviado una cédula para consultar.</p>";
            }
            ?>
        </div>
    </div>
</body>
//Este código permite consultar la información de los usuarios almacenados en una base de datos, mostrando los resultados en de inicio de secion de una página web con 
//diseño responsivo gracias a Bootstrap. La consulta se realiza de manera segura usando PHP y declaraciones preparadas
//para evitar vulnerabilidades comunes.
</html>
