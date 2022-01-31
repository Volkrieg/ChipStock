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
$servername="localhost";
$username="root";
$password="";
$bd="TiendaStock";

$conexion= new mysqli($servername,$username,$password,$bd);

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(isset($_GET['categoria'])){
        header("HTTP/1.1 200 categoria");
        $categoria=$_GET['categoria'];
        $orden="SELECT * FROM producto WHERE categoria='$categoria'";
        $res= $conexion->query($orden);
        $res_string = $res->fetch_all();
        echo json_encode($res_string);
    }else if(isset($_GET['nombre'])){
        header("HTTP/1.1 200 nombre");
        $nombre=$_GET['nombre'];
        $orden="SELECT * FROM producto WHERE nombre='$nombre'";
        $res= $conexion->query($orden);
        $res_string = $res->fetch_all();
        echo json_encode($res_string);

    }elseif(isset($_GET['categoria']) && isset($_GET['nombre'])){
        header("HTTP/1.1 200 nombrecategoria");
        $categoria=$_GET['categoria'];
        $nombre=$_GET['nombre'];
        $orden="SELECT * FROM producto WHERE categoria='$categoria' and nombre='$nombre'";
        $res= $conexion->query($orden);
        $res_string = $res->fetch_all();
        echo json_encode($res_string);
    }else{
        header("HTTP/1.1 200 todo");
        $orden="SELECT * FROM producto";
        $res= $conexion->query($orden);
        $res_string = $res->fetch_all();
        echo json_encode($res_string);
    }
    
    
}elseif($_SERVER['REQUEST_METHOD']=='POST'){
    header("HTTP/1.1 200 quepasa");
    $categoria=$_POST['categoria'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $orden="INSERT INTO elpollazo(categoria,nombre,precio) VALUES('$categoria','$nombre',$precio)";
    $conexion->query($orden);
    echo json_encode($conexion->insert_id);
}elseif($_SERVER['REQUEST_METHOD']=='PUT'){
    header("HTTP/1.1 200 quepasa");
    $categoria=$_GET['categoria'];
    $nombre=$_GET['nombre'];
    $precio=$_GET['precio'];
    $idprod=$_GET['idProducto'];
    $orden="UPDATE elpollazo SET categoria='$categoria',nombre='$nombre',precio=$precio WHERE idProducto=$idprod";
    $conexion->query($orden);
    $orden="SELECT * FROM elpollazo WHERE idProducto='$idprod'";
    $res=$conexion->query($orden);
    echo json_encode($res->fetch_all());
}elseif($_SERVER['REQUEST_METHOD']=='DELETE'){
        header("HTTP/1.1 200 quepasa");
        $idprod=$_GET['idProducto'];
        $orden="DELETE FROM elpollazo WHERE idProducto=$idprod";
        $conexion->query($orden);
}else{
    header("HTTP/1.1 400 INVALID REQUEST");
}




?>
</body>
</html>