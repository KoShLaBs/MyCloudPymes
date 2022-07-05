<?php

session_start();

include "../php/Datos/conect.php";

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
    <link rel="stylesheet" href="../estilos/G/encabezado.css"/>
    <link rel="stylesheet" href="../estilos/G/formulario.css"/>    
    <link rel="stylesheet" href="../estilos/G/panel.css"/>
    <link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <title>Actualizar cliente</title>
</head>
<body >
    <section>
    <div class="circle"></div>
        <header>
            <a href="#"><img src="../assests/MCPLSF.png" class="logo"></a>
            </header>
    <div class="contenedor-blanco">
        <h3>Actualizar<br>Cliente</h3>
    </div>
        <?php

            if(isset($_GET['Id'])){
                $txtCedulaC = $_GET['Id'];

                $query = "SELECT * FROM cliente WHERE cedula_cliente=:cedula_cliente";

                $statement = $cnx->prepare($query);
                $data = [':cedula_cliente'=>$txtCedulaC];
                $statement->execute($data);

                $result = $statement->fetch(PDO::FETCH_OBJ);

            }

        ?>
        <div class="formulario-1">
        <form class="formulario-G" action="../php/registroC.php" method="POST">
                Cedula<br>
                <input type="text" placeholder="Ingresar la cedula" value="<?php echo $txtCedulaC;?>" name="txtCedulaC"><br>
                Dirección<br>
                <input type="text" placeholder="Ingresar la dirección" value="<?= $result->direccion_cliente;?>" name="txtDireccionC"><br>
                Correo Electronico<br>
                <input type="text" placeholder="Ingresar el correo electronico" value="<?= $result->correo_cliente;?>" name="txtCorreoC"><br>
            
        </div>
        <div class="formulario-G">
            
                Nombre Completo<br>
                <input type="text" placeholder="Ingresar el nombre completo" value="<?= $result->nombre_cliente;?>" name="txtNombreC"><br>
                Telefono<br>
                <input type="text" placeholder="Ingresar el telefono" value="<?= $result->telefono_cliente;?>" name="txtTelefonoC"><br>
                Fecha de nacimiento<br>
                <input type="date" value="<?= $result->fecha_nac_cliente;?>" name="txtFechaNacC"><br>
            
        </div>
        
        <div class="botones">
            
            <button type="submit" name="botonActualizarC" onclick="confirmar()">Actualizar</button>
            
        </form>

            <?php
            
            if(isset($_SESSION["usuario"])){
                if ($_SESSION["usuario"]["cargo_usuario"] == 3){ 
            ?>      <a href="../html/T/clienteT.php" name="botonCrearG"><button type="submit">Cancelar</button>
            </a> 
            <?php 
            }elseif ($_SESSION["usuario"]["cargo_usuario"] == 2){
            ?>      <a href="../html/V/clienteV.php" name="botonCrearG"><button type="submit">Cancelar</button>
            </a>
            <?php
            } 
        }?>
         
            </div>
            </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript"> 
        function confirmar() {
            var mensaje = alert("Se ha actualizado el cliente");
        }    
    </script>

</body>
</html>

