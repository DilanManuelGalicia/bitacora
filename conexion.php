<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <title>Document</title>

</head>
<body>

    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/sweetalert2@11.js"></script>
    
</body>
</html>


<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header ("content-Type: text/html; cherset=UTF-8");

$noUnidad = isset($_POST ['noUnidad']) ? $_POST ['noUnidad']: '';
$placas = isset($_POST ['placas']) ? $_POST ['placas']: '';
$modelo = isset($_POST ['modelo']) ? $_POST ['modelo']: '';
$marca = isset($_POST ['marca']) ? $_POST ['marca']: '';
//$correo2 = '';


$con= new SQLite3('tuvsaUnidades.db');




 /* $cs = $con -> query ("SELECT * FROM login WHERE correo='$correo'");

while ($result=$cs -> fetchArray()){
    $correo2=$result['correo'];
}

if ($correo2 == $correo) {
    
    echo '
    <script>
        Swal.fire({
            icon: "error",
        title: "Correo Existente",
      }).then((result) => {
   window.location="registrar.html"

      })</script>';

    #echo '<script>alert("correo existente")</script>';
    #echo '<script> window.location=("registrar.html")</script>';

}else{ */


    $cs2 = $con -> query ("INSERT INTO registro (noUnidad, placas, modelo, marca) VALUES ('$noUnidad','$placas','$modelo', '$marca')");
   #echo '<script>alert("correo registrado")</script>';


    #echo '<script> window.location=("login.html")</script>';

    echo '
    <script>
        Swal.fire({
            icon: "success",
        title: "Unidad registrada",
      }).then((result) => {
        window.location="registro.html"
     
           })</script>';



?>