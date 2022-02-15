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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="./index.html"><span>ChipStock</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="./tienda.php">Tienda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Foro</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Equipo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="./client.php">Area Cliente</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth/loginAdmin.php">Area Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading text-uppercase">Tienda</div>
        </div>
    </header>

    <?php
    session_start();
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
    </form>";

        if (!empty($_POST['categoria'])) {
            $orden = " SELECT * FROM products WHERE categoria = '" . $_POST['categoria'] . "';";
            $resultado = $conexion->query($orden);

            while ($columna = $resultado->fetch_assoc()) {
                $idproduct = $columna['idproduct'];
                echo "Nombre: " . $columna["nombre"] . " || Precio: " . $columna['precio'] . " || Categoría: " . $columna['categoria']  . " || Stock: " . $columna['stock'] . "<img src = '" . $columna['imagen'] . "' width = '20%'>" . "<br>";
                $columna['stock'] . "<br>";
                echo "<br><form METHOD = 'POST'>
                <img src='./img/imgProduct.png'>
                <input type = 'hidden' name = 'compra' value = '$idproduct'>
                <button type = 'submit'> Añadir al carro </button> 
                  </form><br>";
            }
        }

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