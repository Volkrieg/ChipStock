<!DOCTYPE html>
<html lang="en">

<head>
  <title>Panel Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="../css/styles.css" rel="stylesheet" />
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="../js/scripts.js"></script>
</head>

<style>
  label.error {
    color: red;
  }
</style>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-xl navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="../../index.html"><span>ChipStock</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ms-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
          <li class="nav-item"><a class="nav-link" href="../tienda.php">Tienda</a></li>
          <li class="nav-item"><a class="nav-link" href="../../forum/index.php">Foro</a></li>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle dropdown-dark" type="button" id="dropdownMenu1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>
              Perfil
            </button>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="..\..\shop\auth\loginAdmin.php"><i class="fas fa-user-secret"></i> Area
                  Admin</a></li>
              <li><a class="dropdown-item" href="..\..\shop\auth\client.php"><i class="fas fa-id-card"></i>
                  Area
                  Cliente</a></li>
              <div class="dropdown-divider"></div>
              <li><a class="dropdown-item" href="..\..\shop\auth\login.html"><i class="fas fa-power-off"></i>
                  Log
                  In</a></li>
              <li><a class="dropdown-item" href="..\..\shop\auth\register.php"><i class="fas fa-edit"></i>
                  Registrate</a></li>
            </ul>
          </div>
        </ul>

      </div>

  </nav>
  <!-- Masthead-->
  <header class="masthead">
    <div class="container">
      <div class="masthead-heading text-uppercase">Panel Admin</div>
    </div>
  </header>
  <div class="container">
    <br>
    <div class="card">
      <div class="card-header">
        Control de usuarios
      </div>
      <div class="card-body">

        <form class="form-horizontal" id="form_panelAdmin">
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
              <button type="submit" class="btn btn-primary" id="guardar_panelAdmin">Registrar cliente</button>
            </div>
          </div>
        </form>
        <form class="form-horizontal" id="form_panelAdmin2">
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
              <button type="submit" class="btn btn-primary" id="guardar_panelAdmin2">Insertar producto</button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="../js/validate.js"></script>
</body>

</html>