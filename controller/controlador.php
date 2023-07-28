<?php
// Indicamos que trabajaremos en directorio que estamos situados (__DIR__)
//Incluimos el fichero de configuración 
require_once('../config/config.php');
//Incluimos la clase conexion a la base de datos
require_once('../libs/Database.php');
// Incluimos la clase usuario
require_once('../model/User.php');
// Incluimos la clase libro



//Creamos la instancia de la clase conexion a la base de datos
$database   = new Database();
//Llamamos el metodo conexion que es quien nos retorna la conexion a la base de datos
$connection = $database->getConnection();
//Creamos la instancia del modelo usuario y pasamos la conexion a la base de datos
$userModel = new User($connection);
//Creamos la instancia del modelo libro y le pasamos la conexion a la base de datos






if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $venta1 =$_POST['venta1'];
    $venta2 = $_POST['venta2'];
    $venta3= $_POST['venta3'];


    $userModel -> setNombre($nombre);
    $userModel -> setVenta1($venta1);
    $userModel-> setVenta2($venta2);
    $userModel-> setVenta3($venta3);

    
    
}

// $users = $userModel->getAll();

$userModel->guardar();

$users = $userModel->getAll();

header('Location:../vista/index.php');

//-----------------------------------------------
?>