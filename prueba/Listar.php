<?php

// Se cre la coenxion
$conexion = mysqli_connect("bsghf8kimb4xcklajum5-mysql.services.clever-cloud.com","ushhs5hcrsjby7r5","UxDzDIjgt7psZRxQitD7","bsghf8kimb4xcklajum5");

$res=$conexion->query("SELECT * FROM RegistroA");
$datos= array();
foreach ($res as $row){
    array_push($datos,array(
        'idG'=>$row ['idG'],
        'Codigo'=>$row ['Codigo'],
        'Raza'=>$row ['Raza'],
        'Tipo_A'=>$row ['Tipo_A'],
        'Edad'=>$row ['Edad'],
        'Peso'=>$row ['Peso'],
        'Costo'=>$row ['Costo'],
        'Observaciones'=>$row ['Observaciones'],
    ));
}

echo utf8_decode(json_encode($datos));
if(!$conexion){
    die("Conexion Fallida:" . mysqli_connect_error());
}
?>