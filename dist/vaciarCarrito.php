<?php
session_start();
$_SESSION['carrito'] = array();
header('Location: http://localhost/Workspace/ChipStock/dist/tienda.php?');
?>