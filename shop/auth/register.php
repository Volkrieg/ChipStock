<?php ob_start(); ?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styleLogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="..\js\validate.js">

    <style>
        .input__text {
            
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .p-account {
            margin-left: 65px;
        }

        input:invalid {
            color: red;
        }
    </style>

</head>

<body>

    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form id="form_register" style="width: 23rem;" method="POST">

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registrarse</h3>

                            <input type="text" id="name" placeholder="Nombre" name="name" class="input__text">
                            <input type="text" id="apellidos" placeholder="Apellidos" name="apellidos" class="input__text">
                            <input type="email" id="email" placeholder="Correo electronico" name="email" class="input__text">
                            <input type="text" id="usuario" placeholder="Usuario" class="input__text" name="usuario">
                            <input type="password" id="pass" placeholder="Contraseña" class="input__text" name="pass" >
                            <br>
                            <input type="submit" id="guardar" name="enviar" class="btn btn-secondary" value="Enviar">

                            <br><b>¿Ya estás registrado?<a href="./login.html" class="link-info">Log in</a></b>

                        </form>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
                        <script src="..\js\validate.js"></script>

                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="./img1.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->

    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Tienda AMC0016
                    </h6>
                    <p>
                        Esta es una pagina ejemplo para el ejercicio de Entorno Servidor
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Nuestros Productos</h6>
                    <p>
                        <a href="#!" class="text-reset">CPU</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">GPU</a>
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contactos</h6>
                    <p>
                        <i class="fas fa-home me-3"></i> Calle Emilio Soto S/N, Sevilla
                        (España) MEDAC
                    </p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        amc0016@alu.medac.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Copyright -->
                <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                    © 2022 Copyright:
                    <a class="text-reset fw-bold" href="#">amc0016</a>
                </div>
                <!-- Copyright -->
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>

    <?php

    error_reporting(0);

    //Datos de la BBDD

    $servername = "localhost";
    $username = "root";
    $password = "";
    $bbdd = "ChipStock";
    $conexion = new mysqli($servername, $username, $password, $bbdd);

    //Hasheo de la contraseña con la conexion y guardar los datos en la BBDD

    $pass = $_POST['pass'];
    $user = $_POST['user'];
    $passHash = password_hash($pass, PASSWORD_BCRYPT);

    //Introducir nuevo usuario con sus datos

    $newUser = "INSERT INTO users(user,pass,email,nombre,apellido,rol,saldo) VALUES ('$user','$passHash','$_POST[email]','$_POST[name]','$_POST[subname]', 'usuario', 500)";

    if ($conexion->query($newUser)) {

        $_SESSION['user'] = $_POST['user'];

        if (isset($_SESSION['user'])) {
            header("location:login.html");
            ob_end_flush();
        }
    }
    ?>

</body>

</html>