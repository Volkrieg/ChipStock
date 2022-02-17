

<?php
// incluimos la conexión a MySQL

include_once('dbcon.php');

// variables para insertar datos a mysqli
$nombre = ($_POST["nombre"]);
$nombre = str_replace(array("\r", "\n"), array(" ", " "), $nombre);
$imagen = $_POST["imagen"];
$precio = $_POST["precio"];
$categoria = $_POST["categoria"];
$stock = $_POST['stock'];

$query = "INSERT INTO products (nombre, imagen, precio, categoria, stock) 
	VALUES('$nombre', '$imagen', $precio, '$categoria', $stock)";
echo $query;
if ($con->query($query)) {
    return true;
} else {
    return false;
}
?>