<?php

$conexion = mysqli_connect("localhost", "root", "", "ganaderia");
if($conexion)
{
    echo 'Conectado exitosamente a la base datos';
} else {
    echo 'No se ha podido conectar a la Base de Datos';
}

<br>
$id = $_POST["codigo"];

$fill = mysqli_query($conexion, "SELECT * FROM venta where NumeroGanado = '$id'");



while ($row1 = mysqli_fetch_array($fill)) {
        echo '

        
        <label>Raza</label>
        <input type="text" value="' . $row1["Raza"] . '">
        <br>
        <label>PrecioCompra</label>
        <input type="text" value="' . $row1["PrecioCompra"] . '" >
        <br>
        <label>PrecioVacuna</label>
        <input type="text" value="' . $row1["PrecioVacuna"] . '" >
        <br>
        <label>PrecioAlimento</label>
        <input type="text" value="' . $row1["PrecioAlimento"] . '" >
        <br>
        <label>PrecioCostoA</label>
        <input type="text" value="' . $row1["PrecioCostoA"] . '" >
        <br>
        <label>PrecioRecomeda</label>
        <input type="text" value="' . $row1["PrecioRecomeda"] . '" >
        <br>
        <label>PesoInicial</label>
        <input type="text" value="' . $row1["PesoInicial"] . '" >';
        
        
}

?>