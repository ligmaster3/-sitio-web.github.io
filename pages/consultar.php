<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/style.css">

    <title>Consulta</title>
    <style>
        .titulo-text {
            text-align: center;
            margin: 20px 0;
        }
        .title-head {
            font-size: 2em;
            color: #333;
        }
        .s-head {
            margin-bottom: 20px;
        }
        .nav-link {
            color: #333;
        }
        .nav-link:hover {
            color: #007bff;
        }
    </style>
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <p class="logo">
                <i class="fa-solid fa-book" style="color: white;"></i>
                <a style="color: wheat;" href="#">Libreria Nautidog</a>
            </p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-house"></i>Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-list"></i>Categorias</a>
                        <ul class="dropdown-menu active">
                            <li><a class="dropdown-item text-light" href="#Aventura"><i class="fa-solid fa-person-hiking"></i>Aventura</a></li>
                            <li><a class="dropdown-item text-light" href="#Fantasia"><i class="fa-solid fa-wand-magic-sparkles"></i>Fantasia</a></li>
                            <li><a class="dropdown-item text-light" href="#Suspenso"><i class="fa-solid fa-warning"></i>Suspenso</a></li>
                            <li><a class="dropdown-item text-light" href="#Teorias"><i class="fa-solid fa-lightbulb"></i>Teorias</a></li>
                            <li><a class="dropdown-item text-light" href="#Mezclas"><i class="fa-solid fa-flask"></i>Mezclas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="sucursales.html"><i class="fa-solid fa-map-location-dot"></i>Sucursales</a></li>
                    <li class="nav-item"><a class="nav-link active" href="compras.html"><i class="fa-solid fa-cart-shopping"></i>Compras</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#Contacto"><i class="fa-solid fa-user-plus"></i>Contacto</a></li>

                    <!-- Mostrar si el usuario ha iniciado sesión -->
                    <?php
                    session_start(); // Inicia la sesión
                    if (isset($_SESSION['usuario'])) { // Verifica si hay una sesión activa
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link active' href='mi_perfil.php'><i class='fa-solid fa-user'></i>Mi perfil</a>
                        </li>";
                    } else {
                        echo "
                        <li class='nav-item'>
                            <a class='nav-link active' href='signin.php'><i class='fa-solid fa-user'></i>Iniciar sesión</a>
                        </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-sm mt-4">
        <div class="consult-div">
            <!-- Formulario de consulta -->
            <form action="consultar.php" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Consultar</button>
            </form>

            <?php
            include 'conexion.php'; // Contiene la conexión a la base de datos

            // Valida si se envió el nombre por el método POST
            if (isset($_POST['nombre'])) {
                $nombre = $_POST['nombre'];

                $sql = "SELECT id, nombre, apellido FROM gestion_de_usuario WHERE nombre = ?"; // Busca en la base de datos
                $stmt = $conn->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("s", $nombre);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        // Muestra el título y la cabecera una sola vez
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

                        // Recorre los resultados y muestra la información del usuario
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <div class='s-head'>
                                <ul class='d-flex p-4 text-center' style='justify-content: space-between;'>
                                    <li class='nav-item'><a class='nav-link'>" . htmlspecialchars($row["id"]) . "</a></li>
                                    <li class='nav-item'><a class='nav-link'>" . htmlspecialchars($row["nombre"]) . " " . htmlspecialchars($row["apellido"]) . "</a></li>
                                </ul>
                            </div>";
                        }
                    } else {
                        echo "<p>No se encontraron registros.</p>";
                    }

                    $stmt->close();
                } else {
                    echo "<p>Error en la preparación de la consulta: " . htmlspecialchars($conn->error) . "</p>";
                }

                $conn->close();
            } else {
                echo "<p>No se ha enviado un nombre para consultar.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>
