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

    <title>Actualizar vendedor</title>
</head>
<body >
    <section>
    <div class="circle"></div>
        <header>
            <a href="#"><img src="../../assests/MCPLSF.png" class="logo"></a>
            </header>
    <div class="contenedor-blanco">
        <h3>Actualizar<br>Vendedor</h3>
    </div>
        <?php

            if(isset($_GET['Id'])){
                $txtId = $_GET['Id'];

                $query = "SELECT * FROM usuario WHERE id_usuario=:id_usuario";

                $statement = $cnx->prepare($query);
                $data = [':id_usuario'=>$txtId];
                $statement->execute($data);

                $result = $statement->fetch(PDO::FETCH_OBJ);

            }

        ?>
        <div class="formulario-1">
            <form class="formulario-G" action="../../php/registro.php" method="POST">
                <input type="hidden" name="txtId" value="<?= $result->id_usuario; ?>"/>
                Usuario<br>
                <input type="text" placeholder="Ingresar el usuario" value="<?= $result->usuario;?>" name="txtUsuarioVG" id="txtUsuarioVG"><br>
                Cedula<br>
                <input type="text" placeholder="Ingresar la cedula" value="<?= $result->cedula_usuario;?>" name="txtCedulaVG" id="txtCedulaVG"><br>
                Dirección<br>
                <input type="text" placeholder="Ingresar la dirección" value="<?= $result->direccion_usuario;?>" name="txtDireccionVG" id="txtDireccionVG"><br>
                Correo Electronico<br>
                <input type="mail" placeholder="Ingresar el correo electronico" value="<?= $result->correo_usuario;?>" name="txtCorreoVG" id="txtCorreoVG"><br>
            
        </div>
        <div class="formulario-G">
            
                Contraseña<br>
                <input type="password" placeholder="Ingresar la constraseña" value="<?= $result->password_usuario;?>" name="txtContraseñaVG"><br>
                Nombre Completo<br>
                <input type="text" placeholder="Ingresar el nombre completo" value="<?= $result->nombre_usuario;?>" name="txtNombreVG"><br>
                Telefono<br>
                <input type="tel" placeholder="Ingresar el telefono" value="<?= $result->telefono_usuario;?>" name="txtTelefonoVG" ><br>
                Fecha de nacimiento<br>
                <input type="date"  name="txtFechaNacVG" value="<?= $result->fecha_nac_usuario;?>" ><br>
            
        </div>
        <div class="botones" >
            
                <button type="submit" name="botonActualizarVG" onclick="confirmar()">Actualizar</button>
                
            </form>

            <a href="../G/vendedorG.php" name="botonCrearG"><button type="submit">Cancelar</button>
            </a>
            </div>
            </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript"> 
        function confirmar() {
            var mensaje = alert("Se ha actualizado el usuario");
        }    
    </script>

</body>
</html>

