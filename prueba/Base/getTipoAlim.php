<?php
	require ('conexion.php');
	
	$NombreA = $_POST['NombreA'];
	
	$queryA = "SELECT  idRegistroA, TipoA  FROM  registroalim WHERE NombreA = '$NombreA' ORDER BY TipoA";
	$resultadoA = $mysqli->query($queryA);
	
	$html= "<option value='0' requ>Seleccionar Tipo</option>";
	
	while($rowA = $resultadoA->fetch_assoc())
	{
		$html.= "<option value='".$rowA['TipoA']."'>".$rowA['TipoA']."</option>";
	}
	
	echo $html;
?>