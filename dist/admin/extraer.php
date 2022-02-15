<?php
// incluimos fichero de conexión
require_once('dbcon.php');

if (isset($_POST['editarId'])) {
	$editarId = $_POST['editarId'];
}
// extraer tabla clientes..

$sql = "SELECT * FROM users WHERE iduser = {$editarId}";
$query = $con->query($sql);
if ($query->num_rows > 0) {
	$output = "";
	while ($row = $query->fetch_assoc()) {
		$output .= "<form>
                      <div class='modal-body'>
                      	<input type='hidden' class='form-control' id='editarId' value='{$row['iduser']}'>
                        <div class='form-group'>
						<label class='control-label' for='usuario'>Usuario:</label>
                            <input type='text' class='form-control' id='editarUsuario' value='{$row['user']}'>
                        </div>
                        <div class='form-group'>
						<label class='control-label' for='nombre'>Nombre:</label>
                            <input type='text' class='form-control' id='editarNombre' value='{$row['nombre']}'>
                        </div>
                        <div class='form-group'>
						<label class='control-label' for='email'>Email:</label>
                            <input type='text' class='form-control' id='editarEmail' value='{$row['email']}'>
                        </div>
						<div class='form-group'>
						<label class='control-label' for='rol'>Rol:</label>
                            <input type='text' class='form-control' id='editarRol' value='{$row['rol']}'>
                        </div>
						<div class='form-group'>
						<label class='control-label' for='saldo'>Saldo:</label>
                            <input type='text' class='form-control' id='editarSaldo' value='{$row['saldo']}'>
                        </div>
                        <div class='form-group'>
						<label class='control-label' for='pwd'>Password:</label>
                            <input type='text' class='form-control' id='editarPassword' value='{$row['pass']}'>
                        </div>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                        <button type='button' class='btn btn-info' id='editarSubmit'>Guardar cambios</button>
                      </div>
                  </form>";
	}
	$output .= "</table>";
}
echo $output;
