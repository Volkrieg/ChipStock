<?php
	// incluimos el fichero de conexión

	require_once('dbcon.php');
	
	// extraemos la informacion de la tabla clientes..
	$sql = "SELECT * FROM users";
	$query = $con->query($sql);
	if ($query->num_rows  > 0) {
		$output = "";
		$output .= "<table class='table table-hover table-striped'>
				<thead>
					<tr>
						<th>Id</th>
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Rol</th>
						<th>Saldo</th>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
				</thead>";
		while ($row = $query->fetch_assoc()) {
		$output .= "<tbody>
					<tr>
						<td>{$row['iduser']}</td>
						<td>{$row['user']}</td>
						<td>{$row['nombre']}</td>
						<td>{$row['email']}</td>
						<td>{$row['rol']}</td>
						<td>{$row['saldo']}</td>
						<td><button class='btn btn-success btn-sm editar-btn' data-id='{$row['iduser']}' data-toggle='modal' data-target='#exampleModal'>Editar</button></td>
						<td><button class='btn btn-danger btn-sm borrar-btn' data-id='{$row['iduser']}'>Borrar</button></td>
					</tr>
			</tbody>";
		}
	$output .="</table>";
	echo $output;
	}else{
		echo "<h5>Ningún registro fue encontrado</h5>";
	}
