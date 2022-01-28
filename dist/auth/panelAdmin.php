<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

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