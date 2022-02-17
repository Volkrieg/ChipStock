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
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-xl navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="../index.html"><span>ChipStock</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="./tienda.php">Tienda</a></li>
                    <li class="nav-item"><a class="nav-link" href="ChipStock/forum/index.php">Foro</a></li>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle dropdown-dark" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>
                            Perfil
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="auth/loginAdmin.php"><i class="fas fa-user-secret"></i>Area
                                    Admin</a></li>
                            <li><a class="dropdown-item" href="auth/client.php"><i class="fas fa-id-card"></i>Area
                                    Cliente</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="auth/login.html"><i class="fas fa-power-off"></i>Log
                                    In</a></li>
                            <li><a class="dropdown-item" href="auth/register.php"><i class="fas fa-edit"></i>Registrate</a></li>
                        </ul>
                    </div>
                </ul>

            </div>

    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">Tienda</div>
        </div>
    </header>

    <?php
    include ('mostrarCarrito.php');
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bd = "ChipStock";
    $conexion = new mysqli($servername, $username, $password, $bd);
    $orden = " SELECT DISTINCT categoria FROM products;";
    $resultado = $conexion->query($orden);

    if (!empty('categoria')) {
        echo "

    <form method = 'POST'>
    <select class='form-select' name='categoria'>";

        while ($columna = $resultado->fetch_assoc()) {
            $categoria = $columna['categoria'];
            echo "
    <option value='$categoria'>" . $categoria . "</option> 
        ";
        }

        echo "
    </select class='form-select'>
    <button type = 'submit'> Seleccionar </button> 
    </form>
   
    <section class='py-5'>
            <div class='container px-4 px-lg-5 mt-5'>
                <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center'>
                    ";

        if (!empty($_POST['categoria'])) {
            $orden = " SELECT * FROM products WHERE categoria = '" . $_POST['categoria'] . "';";
            $resultado = $conexion->query($orden);

            while ($columna = $resultado->fetch_assoc()) {
                $idproduct = $columna['idproduct'];

                echo "
                        <div class='col mb-5'>
                            <div class='card h-100'>
                                <!-- Product image-->
                                <img class='card-img-top' src='" . $columna['imagen'] . "' alt='...' />
                                <!-- Product details-->
                                <div class='card-body p-4'>
                                    <div class='text-center'>
                                        <!-- Product name-->
                                        <h5 class='fw-bolder'>" . $columna['nombre'] . "</h5>
                                        <!-- Product price-->
                                        " . $columna['precio'] . " €
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>

                                <br><form METHOD = 'POST'>

                                <input type = 'hidden' name = 'compra' value = '$idproduct'>
                                                <button type = 'submit'> Añadir al carro </button> 
                                                  </form><br>
                                </div>     
                        </div>
                    </div>";
            }
        }

        echo "                      
        </div>
    </div>
</section>";

        if (!empty($_POST['compra'])) {

            $idproduct = $_POST['compra'];
            if (isset($_SESSION['carrito'])) {
                array_push($_SESSION['carrito'], $idproduct);
            } else {
                $_SESSION['carrito'] = array();
            }
        }
    }

    ?>

    <form action="./ejecutarCarrito.php">
        <input type="submit" value="Finalizar compra">
    </form>
    <form action="./vaciarCarrito.php">
        <input type="submit" value="Vaciar carrito">
    </form>

    <?php
    if (!empty($_SESSION['mensaje'])) {
        echo $_SESSION['mensaje'];
    }

    carro();

    foreach ($_SESSION["carroNombres"] as $key => $value) {
        echo $key . " => " . $value;
    }
    ?>

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Nuestras redes sociales:</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
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

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Nuestros Productos</h6>
                    <p>
                        <a href="#!" class="text-reset">CPU</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">GPU</a>
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
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
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>