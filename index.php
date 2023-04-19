<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <title>Document</title>
</head>
<body>
    

<?php


$con= new SQLite3('tuvsaUnidades.db');
$cs = $con -> query ("SELECT * FROM registro");

while($result=$cs -> fetchArray()){
   

?>
<div class="card mx-auto bg-light" style="width: 20rem; text-align: center; ">
    <div class="card-body">
        <img src="img/LOGO_TUVSA.svg" style="text-align: left;"/> 
        <br/>
        <br/>


        <img src="barcode.php?text=<?php echo $result['noUnidad'];?>&size=50&codetype=Code39&print=true&sizefactor=2" style="text-align: left;"/><br>

    </div>
</div>

<?php
}
?>


<!-- $con= new SQLite3('tuvsaUnidades.db');

$cs = $con -> query ("SELECT id FROM registro");

while($row = $cs ->fetch_assoc()){ -->



    </body>
</html>