<?php
// incluimos la conexión
include "dbcon.php";

// Variables para editar la tabla por id
$id = $_POST['editar_id'];
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$rol = $_POST['rol'];
$saldo = $_POST['saldo'];
$password = md5($_POST['password']);
// SQL para actualizar un registro	
$query = "UPDATE users SET user='{$usuario}',nombre='{$nombre}',email='{$email}',rol='{$rol}', saldo = '{$saldo}', pass='{$password}' WHERE iduser='{$id}'";
if ($con->query($query)) {
	echo 1;
} else {
	echo 0;
}
