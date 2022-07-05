<?php

session_start();

include "../../php/Datos/conect.php";

$cnx = Conect::conectar();


$query ="SELECT * FROM producto";
$query = $cnx->prepare($query);
$query->execute();
$listar = $query->fetchAll(PDO::FETCH_ASSOC);

$query ="SELECT * FROM tipo_producto";
$query = $cnx->prepare($query);
$query->execute();
$cat = $query->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="../../estilos/G/encabezado.css"/>
    <link rel="stylesheet" href="../../estilos/G/formulario.css"/>    
    <link rel="stylesheet" href="../../estilos/G/panel.css"/>
    <link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title>Actualizar producto</title>
</head>
<body >
    <section>
    <div class="circle"></div>
        <header>
            <a href="#"><img src="../../assests/MCPLSF.png" class="logo"></a>
            </header>
    <div class="contenedor-blanco">
        <h3>Actualizar<br>Producto</h3>
    </div>
        <?php

            if(isset($_GET['Id'])){
                $txtId = $_GET['Id'];

                $query = "SELECT * FROM producto WHERE id_producto=:id_producto";

                $statement = $cnx->prepare($query);
                $data = [':id_producto'=>$txtId];
                $statement->execute($data);

                $result = $statement->fetch(PDO::FETCH_OBJ);

            }

        ?>
        <div class="formulario-1">
        <form class="formulario-G" action="../../php/registroPR.php" method="POST">
                Id<br>
                <input type="text" placeholder="Ingrese el id" value="<?= $result->id_producto;?>"  name="txtIdPRG"> <br>
                Nombre<br>
                <input type="text" placeholder="Ingresar el nombre del producto" value="<?= $result->nombre_producto;?>"  name="txtNombrePRG"><br>
                Ubicacion<br>
                <input type="text" placeholder="Ingrese el precio del producto" value="<?= $result->ubicacion;?>"  name="txtUbicacionPRG"><br>
                Elige el tipo de producto<br>
                <select name="selectTipoPRG" >
                    
                    <?php  foreach ($cat as $c): 
                             foreach ($listar as $l): 
                        
                        if ($l['tipo_producto'] == $c['tipo_producto']){
                        ?>
                      <option value="<?php echo (int)$c['tipo_producto']; ?>">
                        <?php echo $c['nombre'] ?>  
                      </option>
                    <?php }
                   
                endforeach; 
                endforeach; ?>
                </select><br>
            
        </div>
        <div class="formulario-G">
            
                Nit Proveedor<br>
                <input type="text" placeholder="Ingrese el nit del proveedor" value="<?= $result->nit_proveedor;?>" name="txtNitPG"><br>
                Stock<br>
                <input type="number" placeholder="Ingresar el nombre del producto" value="<?= $result->stock;?>"  name="txtStockPRG"><br>
                Precio producto<br>
                <input type="number" placeholder="Ingrese el precio del producto" value="<?= $result->precio_producto;?>"  name="txtPrecioPRG"><br>
                Precio de venta<br>
                <input type="number" placeholder="Ingresa el precio de venta del producto" value="<?= $result->precio_venta_producto;?>"  name="txtPrecioVentaPRG"><br>
            
        </div>
        <div class="botones" >
            
                <button type="submit" name="botonActualizarPRG" onclick="confirmar()">Actualizar</button>
                
            </form>

            <a href="../G/vendedorG.php" name="botonCrearG"><button type="submit">Cancelar</button>
            </a>
            </div>
            </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript"> 
        function confirmar() {
            var mensaje = alert("Se ha actualizado el producto");
        }    
    </script>

</body>
</html>

