<?php

require("conexion.php");
$query = "SELECT id_registroa, Numero  FROM registro_animal  ORDER BY Numero ";


$resultado = $mysqli->query($query);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Llenar select a partir de otro con php y mysql</title>
    <script  src="js/jquery-3.1.1.min.js"></script>

    <script language="javascript">
			$(document).ready(function(){
				$("#Codigo").change(function () {

					$("#Codigo option:selected").each(function () {
						Codigo = $(this).val();
						$.post("getRaza.php", { Codigo: Codigo }, function(data){
							$("#Raza").html(data);
						});            
					});
				})
			});
	</script>	
	
</head>
<body>

<form id="combo" name="combo" action="Guardar.php" method="POST">

<div>Seleciona Codigo: <select id="Codigo" name="Codigo">
    <option value="0"> Seleccionar Codigo</option>
    <?php while($row = $resultado->fetch_assoc()) { ?>
    <option value="<?php echo $row['Numero']; ?>"> 
    <?php echo $row['Numero']; ?></option>
    <?php } ?>

</select>

 </div>


 <div>Selecciona Raza <select id="Raza" name="Raza">

 </select> </div>

</form>




	<!-- <h2>Llenar un select a partir de otro select con jquery y php</h2>

	<div class="row mb-6">
                        <div class="col-md-3 ">
							<label for="Codigo" class="form-label">Codigo de Animal</label>
                            <select name="Codigo" id="Codigo" >
                                <option value="0">Seleccione</option>
                                <?php
                                    $RegistroA ="SELECT * FROM  registro_animal";
                                    $ReRegistroA = mysqli_query($Conexion,$RegistroA);
                                    while($Valores = mysqli_fetch_array($ReRegistroA)){
                                        echo '<option value="'.$Valores[""].'">'.$Valores["Numero"].'</option>';
                                    }

                                ?>
                            </select>
                        </div>


                        <div id="select2lista">

                        </div>


                        <label for="Raza class="form-label">Raza</label>
                            <select name="Raza" id="Raza" >
                                <option value="-"></option>
                            </select>


                 <script type="text/javascript">
                     //1 definir las variables corepondientes
                     var Codig = new array("_","Doom","Forza" )

                        
                 </script>   -->         
</body>
</html>

