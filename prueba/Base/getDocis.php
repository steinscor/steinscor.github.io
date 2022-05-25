<?php
	require ('conexion.php');
	
	$NombreV = $_POST['Nombrev'];
	
	$queryM = "SELECT  idVacunaAg, Cantidad FROM vacuna WHERE Nombre = '$NombreV' ORDER BY Cantidad ";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0' requ>Selecciona la docis</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idVacunaAg']."'>".$rowM['Cantidad']."</option>";
	}
	
	echo $html;
?>