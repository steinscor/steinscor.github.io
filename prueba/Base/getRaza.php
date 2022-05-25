<?php
	require ('conexion.php');
	
	$Codigo = $_POST['Codigo'];
	
	$queryM = "SELECT  id_registroa, Raza FROM registro_animal WHERE Numero = '$Codigo' ORDER BY Raza";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0' requ>Seleccionar Raza</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['Raza']."'>".$rowM['Raza']."</option>";
	}
	
	echo $html;
?>