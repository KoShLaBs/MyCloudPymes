
<?php

include "../../php/Datos/conect.php";

$cnx = Conect::conectar();

$query ="SELECT * FROM cliente";
$query = $cnx->prepare($query);
$query->execute();
$listar = $query->fetchAll(PDO::FETCH_ASSOC);

$txtCedulaC=(isset($_POST['txtCedulaC']))?$_POST['txtCedulaC']:"";
$txtNombreC=(isset($_POST['txtNombreC']))?$_POST['txtNombreC']:"";
$txtDireccionC=(isset($_POST['txtDireccionC']))?$_POST['txtDireccionC']:"";
$txtTelefonoC=(isset($_POST['txtTelefonoC']))?$_POST['txtTelefonoC']:"";
$txtCorreoC=(isset($_POST['txtCorreoC']))?$_POST['txtCorreoC']:"";
$txtFechaNacC=(isset($_POST['txtFechaNacC']))?$_POST['txtFechaNacC']:"";


$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){

    case "Update":
            
            $query = $cnx->prepare("SELECT * FROM cliente WHERE cedula_cliente=:cedula_cliente");
            $query->bindValue(':cedula_cliente', $txtCedulaC);
            $query->execute();
            $listar = $query->fetch(PDO::FETCH_LAZY);

            $txtCedulaC = $listar['cedula_cliente'];
            $txtNombreC = $listar['nombre_cliente'];
            $txtDireccionC = $listar['direccion_cliente'];
            $txtTelefonoC = $listar['telefono_cliente'];
            $txtCorreoC = $listar['correo_cliente'];
            $txtFechaNacC = $listar['fecha_nac_cliente'];

        break;
    case "Actualizar":

        
        break;

    case "Delete":
            $query ="DELETE FROM cliente WHERE cedula_cliente=:cedula_cliente";
            $query = $cnx->prepare($query);
            $query->bindValue(':cedula_cliente', $txtCedulaC);
            $query->execute();
        break;
            
    case "Buscar":
        echo "Presionando para actualizar";
        break;


}


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
    <title>Cliente</title>
</head>
<body >
    <section>
    <?php include_once('../T/encabezado.php');?>
        <div class="contenedor-blanco">
        <h3>Cliente</h3>
    </div>
        <div class="formulario-1">
        <form class="formulario-G" action="../../php/registroC.php" method="POST">
                Cedula<br>
                <input type="text" placeholder="Ingresar la cedula" value="<?php echo $txtCedulaC;?>" name="txtCedulaC"><br>
                Dirección<br>
                <input type="text" placeholder="Ingresar la dirección" value="<?php echo $txtDireccionC;?>" name="txtDireccionC"><br>
                Correo Electronico<br>
                <input type="text" placeholder="Ingresar el correo electronico"value="<?php echo $txtCorreoC;?>" name="txtCorreoC"><br>
            
        </div>
        <div class="formulario-G">
            
                Nombre Completo<br>
                <input type="text" placeholder="Ingresar el nombre completo" value="<?php echo $txtNombreC;?>" name="txtNombreC"><br>
                Telefono<br>
                <input type="text" placeholder="Ingresar el telefono" value="<?php echo $txtTelefonoC;?>" name="txtTelefonoC"><br>
                Fecha de nacimiento<br>
                <input type="date" value="<?php echo $txtFechaNacC;?>" name="txtFechaNacC"><br>
            
        </div>

        <div class="botones">
            
            <input type="submit" value="Crear" name="botonCrearC">
            
        </form>
    </div>
    
<input type="checkbox" class="checkbox" id="check" >
<label class="menu" for="check" id="si" onclick="no()">◀</label>
<div class="right-panel" id="no" onclick="si()">
<h1>Buscar</h1>
<form>
    <input type="text" name="buscar" placeholder="Por Nit"><br></form>
    <form><button type="submit" name="accion" ><img src="../../assests/search.png"></button>
</form>

<table class="tabla" >
    <thead class="lineas">
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        
<?php foreach($listar as $datos){ ?>
    <tr>
        <td><?php echo $datos['cedula_cliente']; ?></td>
        <td><?php echo $datos['nombre_cliente']; ?></td>
        <td><?php echo $datos['correo_cliente']; ?></td>
        <form method="post">
        <input type="hidden"  name="txtCedulaC" id="txtCedulaC" value="<?php echo $datos['cedula_cliente'];?>"><br>
        <td>
        
        <a name="accion" class="casilla" value="Update" href="../UC.php?Id=<?= $datos['cedula_cliente']; ?>">
                    <img src="../../assests/editar.png"></a>
        </td>
        <td>
            <button type=submit name="accion" class="casilla" value="Delete">
            <img src="../../assests/delete.png"></button>
        </td>
        </form>
    </tr>
<?php }?>       

        </tbody>
        </table>



</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
    
    function si(){
document.getElementById('no').style.display = 'flex';
document.getElementById('si').style.display = 'block';
    }
    
    function no(){
document.getElementById('no').style.display = 'flex';
document.getElementById('si').style.display = 'block';
    }
    
</script>   
</body>
</html>