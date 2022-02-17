<?php
	// incluimos el fichero de conexión

	require_once('dbcon.php');
	
	// extraemos la informacion de la tabla clientes..
	$sql = "SELECT * FROM products";
	$query = $con->query($sql);
	if ($query->num_rows  > 0) {
		$output = "";
		$output .= "<table class='table table-hover table-striped'>
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Imagen</th>
						<th>Precio</th>
						<th>Categoria</th>
						<th>Stock</th>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
				</thead>";
		while ($row = $query->fetch_assoc()) {
		$output .= "<tbody>
					<tr>
						<td>{$row['idproduct']}</td>
						<td>{$row['nombre']}</td>
						<td>{$row['imagen']}</td>
						<td>{$row['precio']}</td>
						<td>{$row['categoria']}</td>
						<td>{$row['stock']}</td>
						<td><button class='btn btn-success btn-sm editar-btn' data-id='{$row['idproduct']}' data-toggle='modal' data-target='#exampleModal'>Editar</button></td>
						<td><button class='btn btn-danger btn-sm borrar-btn' data-id='{$row['idproduct']}'>Borrar</button></td>
					</tr>
			</tbody>";
		}
	$output .="</table>";
	echo $output;
	}else{
		echo "<h5>Ningún registro fue encontrado</h5>";
	}
