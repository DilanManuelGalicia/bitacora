<?php


$con= new SQLite3('tuvsaUnidades.db');
$cs = $con -> query ("SELECT * FROM registro");

while($result=$cs -> fetchArray()){
   

?>

<img src="barcode.php?text=<?php echo $result['noUnidad'];?>&size=50&codetype=Code39&print=true&sizefactor=2" />.<br>


<?php
}
?>


<!-- $con= new SQLite3('tuvsaUnidades.db');

$cs = $con -> query ("SELECT id FROM registro");

while($row = $cs ->fetch_assoc()){ -->



