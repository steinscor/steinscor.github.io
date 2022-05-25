<?php
	require ('conexion.php');
	
	$NombreV = $_POST['Nombrev'];
	
	$queryM = "SELECT  idVacunaAg, Tipo FROM vacuna WHERE Nombre = '$NombreV' ORDER BY Tipo";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0' requ>Seleccionar Tipo</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['Tipo']."'>".$rowM['Tipo']."</option>";
	}
	
	echo $html;
?>