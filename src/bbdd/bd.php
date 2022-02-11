<?php
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$bbdd = "ChipStock";

$rootPass = "root";
$passHash = password_hash("root", PASSWORD_BCRYPT);

$conexion = new mysqli($servername, $username, $password);

if ($conexion->connect_error) {
    echo "Conexion no establecida \n" . $conexion->connect_error;
} else {
    echo "Conexion realizada \n";
}

$createBBDD = "CREATE DATABASE ChipStock";

$conexion->query($createBBDD);

$conexion = new mysqli($servername, $username, $password, $bbdd);

$createTableUsers = "CREATE TABLE users(
    iduser INT(100) NOT NULL AUTO_INCREMENT,
    user   VARCHAR(30),
    pass  VARCHAR(120),
    email VARCHAR(60),
    nombre VARCHAR(40),
    apellido VARCHAR(40),
    rol VARCHAR(60),
    saldo INT (255),
    PRIMARY KEY (iduser)
    );";

$createTableAdmin = "CREATE TABLE administrador(
    idadmin INT(100) NOT NULL AUTO_INCREMENT,
    user   VARCHAR(30),
    pass  VARCHAR(120),
    email VARCHAR(60),
    nombre VARCHAR(40),
    apellido VARCHAR(40),
    rol VARCHAR(60),
    PRIMARY KEY (idadmin)
    );";

$createTableProducts = "CREATE TABLE products(
    idproduct INT(100) NOT NULL AUTO_INCREMENT,
    nombre      VARCHAR(30),
    imagen VARCHAR(300),
    precio      INT(255),
    categoria   VARCHAR(50),
    stock       INT(100),
    PRIMARY KEY (idproduct)
    );";

$newAdmin = "INSERT INTO administrador(user,pass,email,nombre,apellido, rol) VALUES ('root','$passHash','root@root.com','root','root', 'admin')";

$newProductTest = "INSERT INTO products(nombre,precio,categoria,stock,imagen) VALUES 
('Nvidia GTX 3070',1200,'GPU',50,'../src/assets/img/product/3070.jpg'),
('Nvidia GTX 3060',900,'GPU',45,'../src/assets/img/product/3060.jpg'),
('AMD Raiden 6700XT',865,'GPU',45,'../src/assets/img/product/6700XT.jpg'),
('AMD Raiden 6600XT',795,'GPU',45,'../src/assets/img/product/6600XT.jpg'),
('Intel i7 7700K',350,'CPU',25,'../src/assets/img/product/7700K.jpg'),
('Intel i5 11000K',375,'CPU',34,'../src/assets/img/product/11000K.jpg'),
('AMD Ryzen 7 4500X',320,'CPU',35,'../src/assets/img/product/4500X.jpg'),
('Intel Xeon 4,5 GHz',420,'CPU',28,'../src/assets/img/product/Xeon.jpg')
";


if($conexion->query($createTableUsers)){
    echo "Tabla usuario creada con éxito<br>";
}

if($conexion->query($createTableAdmin)){
    echo "Tabla admin creada con éxito<br>";
}

if($conexion->query($createTableProducts)){
    echo "Tabla producto creada con éxito<br>";
}

if($conexion->query($newAdmin)){
    echo "Admin insertado con exito<br>";
}

if($conexion->query($newProductTest)){
    echo "Productos insertados con exito<br>";
}
