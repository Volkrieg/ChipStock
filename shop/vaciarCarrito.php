<?php
session_start();
$_SESSION['carrito'] = array();
header('Location: ./tienda.php?');
?>