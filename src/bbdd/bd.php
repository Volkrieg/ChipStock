<?php
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$bbdd = "TiendaBBDD";

$rootPass = "root";
$passHash = password_hash("root", PASSWORD_BCRYPT);

$conexion = new mysqli($servername, $username, $password);

if ($conexion->connect_error) {
    echo "Conexion no establecida \n" . $conexion->connect_error;
} else {
    echo "Conexion realizada \n";
}

$createBBDD = "CREATE DATABASE TiendaBBDD";

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
    precio      INT(255),
    categoria   VARCHAR(50),
    stock       INT(100),
    PRIMARY KEY (idproduct)
    );";

$newAdmin = "INSERT INTO administrador(user,pass,email,nombre,apellido, rol) VALUES ('root','$passHash','root@root.com','root','root', 'admin')";

$newProductTest = "INSERT INTO products(nombre,precio,categoria,stock) VALUES 
('Nvidia GTX 3070',1200,'GPU',50),
('Nvidia GTX 3060',900,'GPU',45),
('AMD Raiden 6700XT',865,'GPU',45),
('AMD Raiden 6600XT',795,'GPU',45),
('Intel i7 7700K',350,'CPU',25),
('Intel i5 11000K',375,'CPU',34),
('AMD Ryzen 7 4500X',320,'CPU',35),
('Intel Xeon 4,5 GHz',420,'CPU',28)
";

$conexion->query($createTableUsers);

$conexion->query($createTableAdmin);

$conexion->query($createTableProducts);

$conexion->query($newAdmin);

$conexion->query($newProductTest);
