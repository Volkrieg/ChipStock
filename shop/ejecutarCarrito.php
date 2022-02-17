<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$bd = "ChipStock";
$conexion = new mysqli($servername, $username, $password, $bd);

function quitarComillas($cadena)
{
    $cadenaLimpia = "";
    for ($i = 0; $i < strlen($cadena); $i++) {
        if ($cadena[$i] != '"' && $cadena[$i] != ']')
            $cadenaLimpia .= $cadena[$i];
    }

    return $cadenaLimpia;
}

function getSaldo($usuario)
{

    $opts = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peername' => false
        ),
        'http' => array(
            'method' => 'GET',
            'header' => 'Content-type: application/x-www-form-urlencoded' . "\r\n" .
                ''
        )
    );

    $context = stream_context_create($opts);

    $result = file_get_contents('http://localhost/Workspace/ChipStock/src/bbdd/CrudUsuario.php?usuario=' . $usuario, false, $context);

    $saldoSucio =  explode(',', $result);

    return quitarComillas($saldoSucio[8]);
}

function getPrecioCarro()
{

    $opts = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peername' => false
        ),
        'http' => array(
            'method' => 'GET',
            'header' => 'Content-type: application/x-www-form-urlencoded' . "\r\n" .
                ''
        )
    );

    $context = stream_context_create($opts);
    $precioSuma = "0";

    for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
        $result = file_get_contents('http://localhost/Workspace/ChipStock/src/bbdd/CrudProducto.php?idproduct=' . $_SESSION['carrito'][$i], false, $context);
        $resultado =  explode(',', $result);
        $precio = $resultado[4];
        $precioSuma = $precioSuma + quitarComillas($precio);
    }
    return $precioSuma;
}
if (getSaldo($_SESSION['user']) >= getPrecioCarro()) {

    for ($i = 0; $i < count($_SESSION['carrito']); $i++) {

        $orden = " UPDATE users SET saldo = (SELECT saldo FROM users WHERE user = '" . $_SESSION['user'] . "') - (SELECT precio FROM products WHERE idproduct = " . $_SESSION['carrito'][$i] . ") WHERE user = '" . $_SESSION['user'] . "'";
        $conexion->query($orden);

        $orden = "UPDATE products SET stock = (SELECT stock FROM products WHERE idproduct = " . $_SESSION['carrito'][$i] . ") - 1 WHERE idproduct = " . $_SESSION['carrito'][$i] . ";";
        $conexion->query($orden);
    }
    $_SESSION['mensaje'] = "Compra realizada con exito";
} else {
    $_SESSION['mensaje'] = "Saldo insuficiente";
}
header('Location:./vaciarCarrito.php?');
