
<?php

include "../../php/Datos/conect.php";

$cnx = Conect::conectar();

$query ="SELECT * FROM proveedor";
$query = $cnx->prepare($query);
$query->execute();
$listar = $query->fetchAll(PDO::FETCH_ASSOC);

$txtNit=(isset($_POST['txtNitPG']))?$_POST['txtNitPG']:"";
$txtNombre=(isset($_POST['txtNombrePG']))?$_POST['txtNombrePG']:"";
$txtDireccion=(isset($_POST['txtDireccionPG']))?$_POST['txtDireccionPG']:"";
$txtTelefono=(isset($_POST['txtTelefonoPG']))?$_POST['txtTelefonoPG']:"";
$txtCorreo=(isset($_POST['txtCorreoPG']))?$_POST['txtCorreoPG']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){

    case "Update":
            
            $query = $cnx->prepare("SELECT * FROM proveedor WHERE nit_proveedor=:nit_proveedor");
            $query->bindValue(':nit_proveedor', $txtNit);
            $query->execute();
            $listar = $query->fetch(PDO::FETCH_LAZY);

            $txtNit = $listar['nit_proveedor'];
            $txtNombre = $listar['nombre_proveedor'];
            $txtDireccion = $listar['direccion_proveedor'];
            $txtTelefono = $listar['telefono_proveedor'];
            $txtCorreo = $listar['correo_proveedor'];

        break;
    case "Actualizar":

        
        break;

    case "Delete":
            $query ="DELETE FROM proveedor WHERE nit_proveedor=:nit_proveedor";
            $query = $cnx->prepare($query);
            $query->bindValue(':nit_proveedor', $txtNit);
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

    <title>Proveedor</title>
</head>
<body >
    <section>
    <?php include_once('../G/encabezado.php'); ?>
        <div class="contenedor-blanco">
            <h3>Proovedor</h3>
        </div>
    </div>
        <div class="formulario-1">
            <form class="formulario-G" action="../../php/registroP.php" method="POST">
                Nit<br>
                <input type="text" placeholder="Ingrese el nit del proveedor" value="<?php echo $txtNit;?>" name="txtNitPG"><br>
                Telefono<br>
                <input type="tel" placeholder="Ingrese el telefono" value="<?php echo $txtTelefono;?>" name="txtTelefonoPG"><br>
                Dirección<br>
                <input type="text" placeholder="Ingresar la dirección" value="<?php echo $txtDireccion;?>" name="txtDireccionPG"><br>
            
        </div>
        <div class="formulario-G">
            
                Nombre<br>
                <input type="text" placeholder="Ingresa el nombre" value="<?php echo $txtNombre;?>" name="txtNombrePG"><br>
                Correo Electronico<br>
                <input type="mail" placeholder="Ingresa el correo electronico" value="<?php echo $txtCorreo;?>" name="txtCorreoPG"><br>
                
            
        </div>
        <div class="botones">
            
                <input type="submit" value="Crear" name="botonCrearPG">

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
                <th>Nit</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                
        <?php foreach($listar as $datos){ ?>
            <tr>
                <td><?php echo $datos['nit_proveedor']; ?></td>
                <td><?php echo $datos['nombre_proveedor']; ?></td>
                <td><?php echo $datos['telefono_proveedor']; ?></td>
                <form method="post">
                <input type="hidden"  name="txtNitPG" id="txtNitPG" value="<?php echo $datos['nit_proveedor'];?>"><br>
                <td>
                
                <a name="accion" class="casilla" value="Update" href="UP.php?Id=<?= $datos['nit_proveedor']; ?>">
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

    
    </div>    
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