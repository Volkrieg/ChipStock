<?php
// incluimos la conexión
include "dbcon.php";

// Variables para editar la tabla por id
$id = $_POST['editar_id'];
$nombre = ($_POST["nombre"]);
$nombre = str_replace(array("\r", "\n"), array(" ", " "), $nombre);
$imagen = $_POST["imagen"];
$precio = $_POST["precio"];
$categoria = $_POST["categoria"];
$stock = $_POST['stock'];
// SQL para actualizar un registro	
$query = "UPDATE products SET nombre='{$nombre}',imagen='{$imagen}',precio='{$precio}',categoria='{$categoria}', stock = '{$stock}' WHERE idproduct='{$id}'";
if ($con->query($query)) {
	echo 1;
} else {
	echo 0;
}
