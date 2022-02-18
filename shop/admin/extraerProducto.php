<?php
// incluimos fichero de conexión
require_once('dbcon.php');

if (isset($_POST['editarId'])) {
    $editarId = $_POST['editarId'];
}
// extraer tabla clientes..

$sql = "SELECT * FROM products WHERE idproduct = {$editarId}";
$query = $con->query($sql);
if ($query->num_rows > 0) {
    $output = "";
    while ($row = $query->fetch_assoc()) {
        $output .= "<form>
                      <div class='modal-body'>
                      	<input type='hidden' class='form-control' id='editarId' value='{$row['idproduct']}'>
                        <div class='form-group'>
						<label class='control-label' for='usuario'>Nombre:</label>
                            <input type='text' class='form-control' id='editarProducto' value='{$row['nombre']}'>
                        </div>
                        <div class='form-group'>
						<label class='control-label' for='nombre'>Imagen:</label>
                            <input type='text' class='form-control' id='editarimagen' value='{$row['imagen']}'>
                        </div>
                        <div class='form-group'>
						<label class='control-label' for='email'>Precio:</label>
                            <input type='text' class='form-control' id='editarPrecio' value='{$row['precio']}'>
                        </div>
						<div class='form-group'>
						<label class='control-label' for='rol'>Categoria:</label>
                            <input type='text' class='form-control' id='editarCategoria' value='{$row['categoria']}'>
                        </div>
						<div class='form-group'>
						<label class='control-label' for='saldo'>Stock:</label>
                            <input type='text' class='form-control' id='editarStock' value='{$row['stock']}'>
                        </div>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Cerrar</button>
                        <button type='button' class='btn btn-primary' id='editarSubmit'>Guardar cambios</button>
                      </div>
                  </form>";
    }
    $output .= "</table>";
}
echo $output;
