<?php

include "../../php/Datos/conect.php";

$cnx = Conect::conectar();

$query ="SELECT * FROM detalle_venta";
$query = $cnx->prepare($query);
$query->execute();
$listar = $query->fetchAll(PDO::FETCH_ASSOC);

$query ="SELECT * FROM cliente";
$query = $cnx->prepare($query);
$query->execute();
$cli = $query->fetchAll(PDO::FETCH_ASSOC);

$query ="SELECT * FROM producto";
$query = $cnx->prepare($query);
$query->execute();
$pro = $query->fetchAll(PDO::FETCH_ASSOC);

$txtIdFV = (isset($_POST['txtIdFV']))?$_POST['txtIdFV']:"";
$txtCedulaVG = (isset($_POST['txtCedulaVG']))?$_POST['txtCedulaVG']:"";
$txtCedulaCV = (isset($_POST['txtCedulaCV']))?$_POST['txtCedulaCV']:"";
$txtCorreoCV = (isset($_POST['txtCorreoCV']))?$_POST['txtCorreoCV']:"";
$txtTelefonoCV = (isset($_POST['txtTelefonoCV']))?$_POST['txtTelefonoCV']:"";
$txtIdPRG = (isset($_POST['txtIdPRG']))?$_POST['txtIdPRG']:""; 
$txtNombrePRG = (isset($_POST['txtNombrePRG']))?$_POST['txtNombrePRG']:"";  
$txtCostoFV = (isset($_POST['txtCostoFV']))?$_POST['txtCostoFV']:""; 
$txtCantidadFV = (isset($_POST['txtCantidadFV']))?$_POST['txtCantidadFV']:"";
$txtFechaFV = (isset($_POST['txtFechaFV']))?$_POST['txtFechaFV']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){

    case "Update":
            
            $query = $cnx->prepare("SELECT * FROM detalle_venta WHERE id_detalle_venta=:id_detalle_venta");
            $query->bindValue(':id_detalle_venta', $txtIdFV);
            $query->execute();
            $listar = $query->fetch(PDO::FETCH_LAZY);

            $txtIdFV = $listar['id_detalle_venta'];
            $txtCedulaVG = $listar['id_usuario'];
            $txtCedulaCV = $listar['cedula_cliente'];
            $txtCorreoCV = $listar['correo_cliente'];
            $txtTelefonoCV = $listar['telefono_cliente'];
            $txtIdPRG = $listar['id_producto']; 
            $txtNombrePRG = $listar['nombre_producto'];  
            $txtCostoFV = $listar['total_compra'];  
            $txtCantidadFV = $listar['cantidad_producto'];  
            $txtFechaFV = $listar['fecha_compra'];  
 
        break;
    case "Actualizar":

        
        break;

    case "Delete":
            $query ="DELETE FROM detalle_venta WHERE id_detalle_venta=:id_detalle_venta";
            $query = $cnx->prepare($query);
            $query->bindValue(':id_detalle_venta', $txtIdFV);
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
    
    <title>Devoluciones</title>
</head>

<body >
<section>
    <?php include_once('../V/encabezado.php'); ?>
        <div class="contenedor-blanco">
            <h3>Devoluciones</h3>
            <p>Elimina las facturas que no quedaron bien o</p><br>
            <p>Que el cliente devolvio dentro del tiempo establecido</p>
    </div>

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
            <th>Id</th>
            <th>Total</th>
            <th>Fecha y hora</th>
            <th>Eliminar</th>
            <th>Revisar</th>
        </thead>
        <tbody>
            
    <?php foreach($listar as $datos){ ?>
        <tr>
            <td><?php echo $datos['id_detalle_venta']; ?></td>
            <td><?php echo $datos['total_compra']; ?></td>
            <td><?php echo $datos['fecha_compra']; ?></td>
            <form method="post">
            <input type="hidden"  name="txtIdFV" id="txtIdFV" value="<?php echo $datos['id_detalle_venta'];?>"><br>
            <td>
                <button type=submit name="accion" class="casilla" value="Delete">
                <img src="../../assests/delete.png"></button>
            </td>
            <td>
                <button type=submit name="accion" class="casilla" value="Imprimir">
                <img src="../../assests/delete.png"></button></a>
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