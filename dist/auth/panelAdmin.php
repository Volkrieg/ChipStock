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
            <div class="masthead-heading text-uppercase">Area Admin</div>
        </div>
    </header>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/workspace-ES/TiendaAMC/index.html">
                    <span>Tienda AMC0016</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="client.php">Area Cliente</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="panelAdmin.php">Area Admin</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="tienda.php">Tienda</a>
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

        <h1>Añadir nuevo producto</h1>
        <form method='POST'>
            <label>Categoría: </label>
            <input type="text" name="categoria">
            <label>Nombre: </label>
            <input type="text" name="nombre">
            <label>Precio: </label>
            <input type="text" name="precio">
            <label>Stock: </label>
            <input type="text" name="stock">
            <input type="submit" value="Insertar">
        </form>

        <h2>Aumentar stock</h2>

        <?php

        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $bd = "TiendaBBDD";
        $conexion = new mysqli($servername, $username, $password, $bd);
        $orden = " SELECT DISTINCT categoria FROM products;";
        $resultado = $conexion->query($orden);

        echo "
    <form method='POST'>
    <select name='categoria'>";

        while ($columna = $resultado->fetch_assoc()) {
            $categoria = $columna['categoria'];
            echo "
    <option value='$categoria'>" . $categoria . "</option> 
        ";
        }

        echo "
    </select>
    <button type='submit'> Seleccionar </button> 
    </form><br>";


        $orden = " SELECT * FROM products WHERE categoria = '" . $_POST['categoria'] . "';";
        $resultado = $conexion->query($orden);


        while ($columna = $resultado->fetch_assoc()) {
            $idproducto = $columna['idproducto'];
            echo "Nombre: " . $columna["nombre"] . " || Precio: " . $columna['precio'] . " || Categoría: " . $columna['categoria']  . " || Stock: " . $columna['stock'] . "<br>";
            echo "<br><form METHOD = 'POST'>
                <input type='hidden' name='aumentar' value='$idproducto'>
                <input type='number' name='aumento'>
                <input type='submit' value='Aumentar stock'>
                  </form><br>";
        }

        if (!empty($_POST['aumentar'])) {
            $idproducto = $_POST['aumentar'];
            $aumento = $_POST['aumento'];
            $orden = "UPDATE PRODUCTS SET STOCK = (SELECT STOCK FROM PRODUCTS WHERE IDPRODUCT = " . $idproducto . ") + " . $aumento . " WHERE IDPRODUCT = " . $idproducto . ";";
            if ($conexion->query($orden)) {
                echo "Stock aumentado <br>";
            } else {
                echo "Error en la compra, el stock no ha sido aumentado <br>" . $conexion->error;
            }
        }


        if (!empty($_POST['categoria']) && !empty($_POST['nombre']) && !empty($_POST['precio']) && !empty($_POST['stock'])) {

            $categoria = $_POST['categoria'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];

            $orden = " INSERT INTO products (nombre,precio,categoria,stock) VALUES('$nombre','$precio','$categoria','$stock');
";
            if ($conexion->query($orden)) {
                echo "Producto insertado con éxito";
            } else {
                echo "Error en la inserción del producto " . $conexion->error;
            }
        }

        ?>

    </body>

</html>