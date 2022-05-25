<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>  Inputs Dinamicos </title>
  </head>
  <body>
<form class="" action="inputs_dinamicos.html" method="post">
 
<center><h2> Inputs Dinamicos</h2> </center>
 
<!-- SE CREA EL ENCABEZADO DE LA TABLA -->
 
<center>
<table border =1>
  <tr>
    <td> ID</td>
    <td> NOMBRE</td>
    <td> APELLIDO</td>
</tr>
<tr>
  <input type="text">
 
 
<?php
//SE HACE LA CONEXION A LA BASE DE DATOS
$server = "localhost";
$user ="root";
$psw="";
$db="ganaderia";
$conexion=@new mysqli ($server,$user,$psw,$db);
 
// SE VALIDA QUE LA CONEXION SE EFECTUE
if($conexion-> connect_error){
  die('Ups ! Sorry I cant Connect to the Database , Trouble -> ' . $conexion->connect_error);
}
 
// SE CREA UNA VARIABLE QUE TENDRA LA CONSULTA A LA TABLA
$SqlGetData="select idventa, NumeroGanado, Raza from venta";
//SE EJECUTA LA CONSULTA
$ResultQuery=$conexion->query($SqlGetData);
 
// SE REVIA SI LA COLSUTA DEVUELVE AL MENOS UN REGISTRO
if ($ResultQuery->num_rows > 0) {
  // SI TRAE REGISTROS HACE UN ARREGLO Y LO VA RECORRIENDO CON EL WHILE
  while ($row = $ResultQuery->fetch_array(MYSQLI_ASSOC)) {
    // SE CREAN VARIABLES PARA IR ALMACENANDO LA INFORMACION QUE CONTENGA CADA REGISTRO
        $id=$row['idventa'];
        $nombre=$row['NumeroGanado'];
        $apellido=$row['Raza'];
 
// SE CREA EL RESTO DEL CUERPO DE LA TABLA Y SE LE CONCATENAN LOS VALORES
 echo "
<Input type='text' name= $id value=$id>
<Input type='text' name= $nombre value=$nombre>
<Input type='text' name= $apellido value=$apellido>
</tr>
 ";
 
/* NOTA:
         POR CADA VUELTA QUE DE EL CICLO IRA AGREGANDO UNA FILA

*/
  }
     // UNA VEZ QUE TERMINA EL CICLO SE CIERRA LA TABLA
  echo "
  </table>
  </center>
  ";
 
 
}
 
   else {
     // SI NO EMCUENTRA REGISTROS SOLAMENTE IMPRIME UN MENSAJE
     echo "<center> <h2> No Se Encontraron Registros </h2> </center>";
   }
 
 
 
 
$conexion->close();
 ?>
 
</form>
  </body>
</html>