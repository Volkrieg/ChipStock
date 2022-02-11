<?php
// declarar la conexión
require_once('dbcon.php');

if (isset($_POST['borrarId'])) {
$borrarId = $_POST['borrarId'];
}

// revisar si existe el registro en la tabla
$sql = "SELECT * FROM users WHERE iduser = {$borrarId}";
$result = $con->query($sql);

if ($result->num_rows > 0) {
// borramos el registro de la tabla
$query = "DELETE FROM users WHERE iduser = {$borrarId}";

if ($con->query($query)) {
echo 1;
exit;
}else{
echo 0;
exit;
}
}
