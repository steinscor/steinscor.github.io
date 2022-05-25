
<?php
require("Base/conexion.php");
$query = "SELECT id_registroa, Numero  FROM registro_animal  ORDER BY Numero ";
$resultado = $mysqli->query($query);

$Conexion	=  mysqli_connect('localhost','root','','ganaderia') or die ('ERROR AL CONECTAR AL SERVIDOR');
	
if(!$Conexion)
{
    die("No hay conexion ".mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VENTA DE GANADO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <link rel="icon" href="img/SISREGAMIX.png">
    <link rel="stylesheet" href="css/prueba.css">
		

</head>
    
    

<body>
    <form action="Guardar datos/RegistroG.php" method="POST">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <center><h1>VENTA DE GANADO</h1></center>
                    <hr>
                

                    <div class="row mb-6">
                            

                                    <div class="col-md-3 "> Seleciona Codigo: <br>
                                    <select id="Codigo" name="Codigo">
                                    <option value="0"> Seleccionar Codigo</option>
                                    <?php while($row = $resultado->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['Numero']; ?>"> 
                                    <?php echo $row['Numero']; ?></option>
                                    <?php } ?>  
                                    </select>

                    </div>

                </div>

                <BR></BR>
                    <div class="col-md 5"> 
                        <button type="submit"  class="btn btn-primary mb-1">Vender</button>
                    </div>
                        
            </div>

                        
    </form>  
    
    <form action="/pagina/Entrada.php" method="POST">  
						<input type="submit" value="Inicio" class="btn btn-primary mb-1">
			</form>

                <section>   
                        <h2>Informacion de Ganado Registrado</h2>   

                    <div>

                         <table > 
                            <thead>
                                 <tr>
                                    <td>Numero de Animal</td> <br>
                                    <td>Precio Inicial</td>
                                    <td>Precio de Vacunas</td>
                                    <td>Precio de Alimento</td>
                                    <td>Precio Costo Adicional</td>
                                    <td>Peso Inicial</td>
                                   <!--  <td>Fecha de Venta</td> -->
                                    <td>Precio Recomendado</td>
                                    <!-- <td>Descripcion</td> -->
                                </tr>
                            </thead>
                                <?php 
                                    $sql="SELECT * FROM  venta";

                                    $result=mysqli_query($Conexion,$sql);
                                    
                                    while($mostrar=mysqli_fetch_array($result)){
                                  ?>
                                            <tr>
                                            <td><?php echo $mostrar ["NumeroGanado"]?></td>
                                            <td>$<?php echo $mostrar ["PrecioCompra"]?></td>
                                            <td>$<?php echo $mostrar["PrecioVacuna"]?></td>
                                            <td>$<?php echo $mostrar ["PrecioAlimento"]?></td>
                                            <td>$<?php echo $mostrar ["PrecioCostoA"]?></td>
                                            <td><?php echo $mostrar ["PesoInicial"]?>Kg</td> 
                                           
                                            <td>$<?php echo $mostrar ["PrecioRecomeda"]?></td>
                                         
                                          
                                            
                                            </tr>
                                <?php
                                 }
                                ?>

                        </table>
                    </div>
                </section>    
</body>
</html>