<?php
// incluimos la conexión
include "dbcon.php";

// Variables para editar la tabla por id
$id = $_POST['editar_id'];
$usuario = $_POST['usuario'];
$rol = $_POST['rol'];
$saldo = $_POST['saldo'];
$email = $_POST['email'];
$pais = $_POST['pais'];
$password = md5($_POST['password']);


// SQL para actualizar un registro 
$query = "UPDATE users SET user='{$usuario}',rol='{$rol}',saldo='{$saldo}',email='{$email}',nombre='{$nombre}', password='{$password}' WHERE iduser='{$id}'";
if ($con->query($query)) {
echo 1;
}else{
echo 0;
}
