<?php
session_start();

function quitarComillas($cadena)
{

    $cadenaLimpia = "";
    for ($i = 0; $i < strlen($cadena); $i++) {
        if ($cadena[$i] != '"' && $cadena[$i] != ']')
            $cadenaLimpia .= $cadena[$i];
    }

    return $cadenaLimpia;
}

function getNombre($id)
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

    $result = file_get_contents('http://localhost/Workspace/ChipStock/src/bbdd/CrudProducto.php?idproduct=' . $id, false, $context);

    $datosSucios =  explode(',', $result);

    return quitarComillas($datosSucios[2]);
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

$contenidoCarro = "";
$precioCarro = "";

if (!isset($_SESSION['carroNombres'])) {
    $_SESSION['carroNombres'] = array();
} else {
    if (count($_SESSION['carroNombres']) == 0) {

        for ($i = 0; $i < count($_SESSION['carrito']); $i++) {

            if (isset($_SESSION['carroNombres'][getNombre($_SESSION['carrito'][$i])])) {
                $_SESSION['carroNombres'][getNombre($_SESSION['carrito'][$i])]++;
            } else {
                $_SESSION['carroNombres'] += array(getNombre($_SESSION['carrito'][$i]) => 1);
            }
        }
    }

    foreach ($_SESSION['carroNombres'] as $clave => $valor) {
        $contenidoCarro .= $clave . " x" . $valor . "<br>";
    }

    $precioCarro .= getPrecioCarro() . "€";



}
