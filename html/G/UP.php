<?php

session_start();

include "../../php/Datos/conect.php";

$cnx = Conect::conectar();

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

    <title>Actualizar proveedor</title>
</head>
<body >
    <section>
    <div class="circle"></div>
        <header>
            <a href="#"><img src="../../assests/MCPLSF.png" class="logo"></a>
            </header>
    <div class="contenedor-blanco">
        <h3>Actualizar<br>Proveedor</h3>
    </div>
        <?php

            if(isset($_GET['Id'])){
                $txtNit = $_GET['Id'];

                $query = "SELECT * FROM proveedor WHERE nit_proveedor=:nit_proveedor";

                $statement = $cnx->prepare($query);
                $data = [':nit_proveedor'=>$txtNit];
                $statement->execute($data);

                $result = $statement->fetch(PDO::FETCH_OBJ);

            }

        ?>
        <div class="formulario-1">
        <form class="formulario-G" action="../../php/registroP.php" method="POST">
                Nit<br>
                <input type="text" placeholder="Ingrese el nit del proveedor"  value="<?= $result->nit_proveedor;?>"  name="txtNitPG"><br>
                Telefono<br>
                <input type="tel" placeholder="Ingrese el telefono"  value="<?= $result->telefono_proveedor;?>"  name="txtTelefonoPG"><br>
                Dirección<br>
                <input type="text" placeholder="Ingresar la dirección"  value="<?= $result->direccion_proveedor;?>" name="txtDireccionPG"><br>
            
        </div>
        <div class="formulario-G">
            
                Nombre<br>
                <input type="text" placeholder="Ingresa el nombre"  value="<?= $result->nombre_proveedor;?>" name="txtNombrePG"><br>
                Correo Electronico<br>
                <input type="mail" placeholder="Ingresa el correo electronico" value="<?= $result->correo_proveedor;?>" name="txtCorreoPG"><br>
            
        </div>
        <div class="botones" >
            
                <button type="submit" name="botonActualizarPG" onclick="confirmar()">Actualizar</button>
                
            </form>

            <a href="../G/vendedorG.php" name="botonCrearG"><button type="submit">Cancelar</button>
            </a>
            </div>
            </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript"> 
        function confirmar() {
            var mensaje = alert("Se ha actualizado el proveedor");
        }    
    </script>

</body>
</html>

