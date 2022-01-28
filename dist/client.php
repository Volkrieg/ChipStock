<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <!--Navegador-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost/workspace-ES/Chipstock/index.html">
                <span>Chipstock</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/workspace-ES/Chipstock/client.php">Area Cliente</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/workspace-ES/Chipstock/client.php">Area Admin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/workspace-ES/Chipstock/tienda.php">Tienda</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <?php

    error_reporting(0);

    session_start();

    //Datos del servidor

    $servername = "localhost";
    $username = "root";
    $password = "";
    $bd = "TiendaBBDD";
    $user = $_SESSION['user'];
    $conexion = new mysqli($servername, $username, $password, $bd);
    $orden = " SELECT * FROM users WHERE user = '$user';";
    $resultado = $conexion->query($orden);

    //Fetching del usuario para recoger todos sus datos

    while ($columna = $resultado->fetch_assoc()) {
        echo "</br>Usuario: " . $columna["user"] . "</br>Rol: " . $columna['rol'] . "</br> Contraseña: " . $columna['pass'] . "</br>Nombre: " . $columna['nombre'] . "</br>Apellido: " . $columna['apellido'] . "</br>Email: " . $columna['email'] . "</br>Saldo: " . $columna['saldo'] .  "<br>";
    }

    if (!empty($_POST['saldo'])) {
        $saldo = $_POST['saldo'];
        $orden = " UPDATE users SET saldo = (SELECT saldo FROM users WHERE user = '" . $_SESSION['user'] . "') + " . $saldo . " WHERE user = '" . $_SESSION['user'] . "';";
        if ($conexion->query($orden)) {

            echo "Saldo incrementado";

        } else {
            echo "Error en el incremento de saldo " . $conexion->error;
        }
    }
    ?>

    <h1>Añadir saldo</h1>
    <form method='POST'>
        <label>Saldo a añadir</label>
        <input type='number' name='saldo'>
        <input type='submit'>
    </form>


    <!-- Footer -->
    <footer>
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Chipstock
                        </h6>
                        <p>
                            Esta es una pagina ejemplo para el ejercicio de Entorno Servidor
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Nuestros Productos</h6>
                        <p>
                            <a href="#!" class="text-reset">CPU</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">GPU</a>
                        </p>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Nuestros canales de informacion</h6>
                        <p>
                            <a href="#!" class="text-reset">Twitter</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Youtube</a>
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contactos</h6>
                        <p>
                            <i class="fas fa-home me-3"></i> Calle Emilio Soto S/N, Sevilla
                            (España)
                        </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            amc0016@alu.medac.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
    </footer>
</body>

</html>