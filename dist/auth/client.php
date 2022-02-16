<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Chipstock</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><span>ChipStock</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="./tienda.php">Tienda</a></li>
                    <li class="nav-item"><a class="nav-link" href="ChipStock/forum/index.php">Foro</a></li>
                    <li class="nav-item"><a class="nav-link" href="./client.php">Area Cliente</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth/loginAdmin.php">Area Admin</a></li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">Area Cliente</div>
        </div>
    </header>

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

    if (!empty($_POST['saldo'])&&$_POST['saldo']>0) {
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