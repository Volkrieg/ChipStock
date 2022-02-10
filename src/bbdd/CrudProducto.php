<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba api</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $bd = "TiendaBBDD";

    $conexion = new mysqli($servername, $username, $password, $bd);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['categoria'])) {
            header("HTTP/1.1 200 GET");
            $categoria = $_GET['categoria'];
            $orden = "SELECT * FROM products WHERE categoria='$categoria'";
            $res = $conexion->query($orden);
            $res_string = $res->fetch_all();
            echo json_encode($res_string);
        } else if (isset($_GET['nombre'])) {
            header("HTTP/1.1 200 nombre");
            $nombre = $_GET['nombre'];
            $orden = "SELECT * FROM products WHERE nombre='$nombre'";
            $res = $conexion->query($orden);
            $res_string = $res->fetch_all();
            echo json_encode($res_string);
        
        } else {
            header("HTTP/1.1 200 todo");
            $orden = "SELECT * FROM products";
            $res = $conexion->query($orden);
            $res_string = $res->fetch_all();
            echo json_encode($res_string);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header("HTTP/1.1 200 POST");
        $categoria = $_POST['categoria'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock  = $_POST['stock'];
        $orden = "INSERT INTO products(categoria,nombre,precio,stock) VALUES('$categoria','$nombre',$precio,$stock)";
        $conexion->query($orden);
        echo json_encode($conexion->insert_id);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        header("HTTP/1.1 200 PUT");
        $idprod = $_GET['idproduct'];
        $categoria = $_GET['categoria'];
        $nombre = $_GET['nombre'];
        $precio = $_GET['precio'];
        $stock  = $_GET['stock'];
        $orden = "UPDATE products SET categoria='$categoria',nombre='$nombre',precio=$precio,stock=$stock WHERE idproduct=$idprod";
        $conexion->query($orden);
        $orden = "SELECT * FROM products WHERE idproduct='$idprod'";
        $res = $conexion->query($orden);
        echo json_encode($res->fetch_all());
    } elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        header("HTTP/1.1 200 DELETE");
        $idprod = $_GET['idproduct'];
        $orden = "DELETE FROM products WHERE idproduct=$idprod";
        $conexion->query($orden);
    } else {
        header("HTTP/1.1 400 INVALID REQUEST");
    }




    ?>
</body>

</html>