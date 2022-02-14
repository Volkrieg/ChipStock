<?php
	// incluimos la conexión
	include "dbcon.php";

	// Variables para editar la tabla por id
	$id = $_POST['editar_id'];
	$usuario = $_POST['usuario'];
	$email = $_POST['email'];
	$pais = $_POST['pais'];
	$password = md5($_POST['password']);
	
	
	// SQL para actualizar un registro	
	$query = "UPDATE users SET user='{$usuario}',email='{$email}',pais='{$pais}', password='{$password}' WHERE iduser='{$id}'";
	if ($con->query($query)) {
		echo 1;
	}else{
		echo 0;
	}
?>