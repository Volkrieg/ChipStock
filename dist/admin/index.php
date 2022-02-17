<!DOCTYPE html>
<html lang="en">

<head>
  <title>Panel Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <br>
    <div class="card">
      <div class="card-header">
        Panel Admin
      </div>
      <div class="card-body">

        <form class="form-horizontal" id="clienteForm">
          <div class="form-group row">
            <label class="control-label col-sm-2" for="usuario">Usuario:</label>
            <div class="col-sm-10">
              <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Ingrese usuario">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
            <div class="col-sm-10">
              <input type="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre" name="nombre">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-2" for="rol">Rol:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="rol" placeholder="Ingrese rol" name="rol">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-2" for="saldo">Saldo:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="saldo" placeholder="Ingrese saldo" name="saldo">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-2" for="rol">Password:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="pwd" placeholder="Ingrese password" name="pwd">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" id="registro">Registrar cliente</button>
            </div>
          </div>
        </form>
        <form class="form-horizontal" id="productForm">
          <div class="form-group row">
            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
            <div class="col-sm-10">
              <input type="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre" name="nombre">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-2" for="imagen">Imagen:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="imagen" placeholder="Ingrese imagen" name="imagen">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-2" for="precio">Precio:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="precio" placeholder="Ingrese precio" name="precio">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-2" for="categoria">Categoria:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="categoria" placeholder="Ingrese categoria" name="categoria">
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-2" for="stock">Stock:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="stock" placeholder="Ingrese stock" name="stock">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" id="insertarProducto">Insertar producto</button>
            </div>
          </div>
        </form>

      </div>
    </div>


    <div id="tableData">

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel"><b>Editar cliente</b></h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="editarForm">

          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>