<?php


$conexion = mysqli_connect("localhost", "root", "", "ganaderia");
if($conexion)
{
    echo 'Conectado exitosamente a la base datos';
} else {
    echo 'No se ha podido conectar a la Base de Datos';
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
    <script src="js/jspdf.min.js"></script>
    <link rel="icon" href="img/SISREGAMIX.png">
    <link rel="stylesheet" href="css/prueba.css">
    <script src="js/app.js"></script>
   

</head>
    
    
<!-- id="form"  -->
<body>

<form action="pruebamostrarinput.php" method="POST" id="form">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <center><h1>VENTA DE GANADO</h1></center>
                    <hr>
                
            <form method="POST" action="pruebamostrarinput.php" >
            
            <div class="col-md-3 "> Seleciona Codigo: <br>               
                    <select class="form-select" name="codigo" id="select" aria-label="Floating label select example" required>
                    <option></option>
                    <?php
                    $con = mysqli_query($conexion, "SELECT * FROM venta");
                    while ($row = mysqli_fetch_array($con)) {
                        echo '<option value="' . $row['NumeroGanado'] . '">' . $row['NumeroGanado'] . '</option>';
                    }
                    ?>
                    </select>
            </div>
                            
                    <input type="submit" value="generar" name="generar">                       
            </form>  
            <div>  
            
                            <?php

                            $id = $_POST["codigo"];

                            $fill = mysqli_query($conexion, "SELECT * FROM venta where NumeroGanado = '$id' ");



                            while ($row1 = mysqli_fetch_array($fill)) {
                                    echo '

                                    
                            <div class="row mb-6">
                                    <div class="col-md-2">
                                    <label>Raza</label>
                                    <input type="text" value="' . $row1["Raza"] . '">
                                    </div>
                                    <br>
                                    <div class="col-md-2">
                                    <label>PrecioCompra</label>
                                    <input type="text" value="' . $row1["PrecioCompra"] . '" >
                                    <br>
                                    </div>
                                    <div class="col-md-2">
                                    <label>PrecioVacuna</label>
                                    <input type="text" value="' . $row1["PrecioVacuna"] . '" >
                                    <br>
                                    </div>
                                    <div class="col-md-2">
                                    <label>PrecioAlimento</label>
                                    <input type="text" value="' . $row1["PrecioAlimento"] . '" >
                                    <br>
                                    </div>
                                    <div class="col-md-2">
                                    <label>PrecioCostoA</label>
                                    <input type="text" value="' . $row1["PrecioCostoA"] . '" >
                                    <br>
                                    </div>
                                    <div class="col-md-2">
                                    <label>PrecioRecomeda</label>
                                    <input type="text" value="' . $row1["PrecioRecomeda"] . '" >
                                    <br>
                                    </div>
                                    <div class="col-md-2">
                                    <label>PesoInicial</label>
                                    <input type="text" value="' . $row1["PesoInicial"] . '" >
                                    </div>
                            </div>';
                                    
                                    
                            }

                            ?>
                            </div> 
                        </form>  
                   
                        <section>   
                        <h2>Datos de Venta de Ganado</h2>   

                    <div  class="row mb-6">

                         <table > 
                            <thead>
                                 <tr>
                                    <td>Numero de Animal</td> <br>
                                    <td>Precio Inicial</td>
                                    <td>Precio de Vacunas</td>
                                    <td>Precio de Alimento</td>
                                    <td>Precio Costo Adicional</td>
                                    <td>Peso Inicial</td>
                                    <td>Total del gasto</td>
                                </tr>
                            </thead>
                                <?php 
                                    $sql="SELECT * FROM  venta";

                                    $result=mysqli_query($conexion,$sql);
                                    
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
                     <br>
                </section>
   
</body>

</html>