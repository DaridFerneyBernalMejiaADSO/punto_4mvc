<?php
require_once __DIR__ . '/../model/User.php';
$pdo = new PDO('mysql:host=localhost;dbname=punto_4','root','');
//cargamos dependecias
$usuario = new User($pdo);
$users=$usuario->getAll();



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h1 class="h4">ejercicio 4</h1>
                        </div>
                        <div class="card-body">
                            <form action="../controller/controlador.php" method="post" id="formulario">
                                <div>
                                    <label class="form-label">El sueldo base del vendedor es de $500</label>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nombre" class="form-label">NOMBRE </label>
                                    <input type="text" class="form-control" name="nombre" id="nombre">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="venta1" class="form-label">venta 1 'para ganar comision el vendedor las ventas deben ser mayores a $1000'</label>
                                    <input type="text" class="form-control" name="venta1" id="venta1">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="venta2" class="form-label">venta 2 'para ganar comision el vendedor las ventas deben ser mayores a $1000'</label>
                                    <input type="text" class="form-control" name="venta2" id="venta2">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="venta3" class="form-label">venta 3 'para ganar comision el vendedor las ventas deben ser mayores a $1000' </label>
                                    <input type="text" class="form-control" name="venta3" id="venta3">
                                </div>
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary" id="btn-enviar" name="enviar" value="calcular">AGREGAR</button>
                                </div>
                                <!-- <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary " id="btn-eliminar" name="enviar" value="eliminar">ELIMINAR DOBLE CLIK</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            
<div class="row justify-content-center">
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>RESGISTRADOS:</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                      
                                        <th>nombre</th>
                                        <th>venta1</th>
                                        <th>venta2</th>
                                        <th>venta3</th>
                                        <th>ganancia delvendedor</th>
                                        <th>ganancia de la empresa</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key){?>
                                        <tr>
                                        <!-- aca traemos las columnas de la base de datos -->
                                            <td><?= $key['Nombre']?></td> 
                                            <td><?= $key['venta1']?></td>
                                            <td><?= $key['venta2']?></td>
                                            <td><?= $key['venta3']?></td>
                                            <td><?= $key['ganvend']?></td>
                                            <td><?= $key['ganemp']?></td>
           
                              
                            </td>     
                                        </tr>
                                        <?php } ?>


                                </tbody>
                                </div>
                       
                            </table>
                         
                    </div>
                    
                </div>
             
            </div>
<!-- 
            <div class="row justify-content-center">
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Personas ingresadas:</h3>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>venta1 </th>
                                        <th>venta2 </th>
                                        <th>venta3 </th>
                                        <th>ganacias vendedor de la semana</th>
                                        <th>ganacias empresa de la semana</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    // include "../model/operaciones.php";
                                    // include "../controller/controladores.php";
                                    // envio();

                                    ?>
                                    <?php


                                    ?>
                                    <?php
                                    // resultados();


                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>
    </main>
    <!-- Validaciones -->
    <script src="validar.js"></script>

</body>

</html>