<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$bd = "TiendaBBDD";
$conexion = new mysqli($servername, $username, $password, $bd);

for ($i=0;$i<count($_SESSION['carrito']);$i++){

$orden = " UPDATE users SET saldo = (SELECT saldo FROM users WHERE user = '" . $_SESSION['user'] . "') - (SELECT precio FROM products WHERE idproduct = " . $_SESSION['carrito'][$i] . ") WHERE user = '" . $_SESSION['user'] . "'";
if ($conexion->query($orden)) {
    echo "Compra realizada <br>";
}

$orden = "UPDATE products SET stock = (SELECT stock FROM products WHERE idproduct = " . $_SESSION['carrito'][$i] . ") - 1 WHERE idproduct = " . $_SESSION['carrito'][$i] . ";";
if ($conexion->query($orden)) {
    echo "Compra realizada stock disminuido <br>";
}
}

$_SESSION['carrito'] = array();
header('Location: http://localhost/Workspace/ChipStock/dist/tienda.php?');