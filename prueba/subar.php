<?php

require("conexion.php");



$precio = "SELECT  precio FROM `precio`";

$resultado1 = $mysqli->query($precio);

$Cantidad ="SELECT Cantidad FROM `cantidad`";

$resultado2 = $mysqli->query($Cantidad);

$total = $resultado1 * $resultado2;


/* echo $total; */

echo $resultado1;


?>

