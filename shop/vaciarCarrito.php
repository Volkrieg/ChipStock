<?php
session_start();
$_SESSION['carrito'] = array();
$_SESSION['carroNombres'] = array();
header('Location: ./tienda.php?');
?>