
<?php

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

$txtId=(isset($_POST['txtIdPRG']))?$_POST['txtIdPRG']:"";
$txtNit=(isset($_POST['txtNitPG']))?$_POST['txtNitPG']:"";
$txtNombre=(isset($_POST['txtNombrePRG']))?$_POST['txtNombrePRG']:"";
$txtStock=(isset($_POST['txtStockPRG']))?$_POST['txtStockPRG']:"";
$txtUbicacion=(isset($_POST['txtUbicacionPRG']))?$_POST['txtUbicacionPRG']:"";
$txtPrecio=(isset($_POST['txtPrecioPRG']))?$_POST['txtPrecioPRG']:"";
$txtPrecioVenta=(isset($_POST['txtPrecioVentaPRG']))?$_POST['txtPrecioVentaPRG']:"";
$selectTipo=(isset($_POST['selectTipoPRG']))?$_POST['selectTipoPRG']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){

    case "Update":
            
            $query = $cnx->prepare("SELECT * FROM producto WHERE id_producto=:id_producto");
            $query->bindValue(':id_producto', $txtId);
            $query->execute();
            $listar = $query->fetch(PDO::FETCH_LAZY);

            $txtId = $listar['id_producto'];
            $txtNit = $listar['nit_proveedor'];
            $txtNombre = $listar['nombre_producto'];
            $txtStock = $listar['stock'];
            $txtUbicacion = $listar['ubicacion'];
            $txtPrecio = $listar['precio_producto'];
            $txtPrecioVenta = $listar['precio_venta_producto'];
            $selectTipo = $listar['tipo_producto'];
        break;

    case "Delete":
            $query ="DELETE FROM producto WHERE id_producto=:id_producto";
            $query = $cnx->prepare($query);
            $query->bindValue(':id_producto', $txtId);
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

    <title>Producto</title>
</head>
<body >
    <section>
    <?php include_once('../G/encabezado.php'); ?>
        <div class="contenedor-blanco">
            <h3>Producto</h3>
        </div>
    </div>
        <div class="formulario-1">
            <form class="formulario-G" action="../../php/registroPR.php" method="POST">
                Id<br>
                <input type="text" placeholder="Ingrese el id" value="<?php echo $txtId;?>" name="txtIdPRG"> <br>
                Nombre<br>
                <input type="text" placeholder="Ingresar el nombre del producto" value="<?php echo $txtNombre;?>" name="txtNombrePRG"><br>
                Ubicacion<br>
                <input type="text" placeholder="Ingrese el precio del producto" value="<?php echo $txtUbicacion;?>" name="txtUbicacionPRG"><br>
                Elige el tipo de producto<br>
                <select name="selectTipoPRG" >
                    
                    <?php  foreach ($cat as $c): 
                        if ($accion == "Update"){
                        if ($selectTipo == $c['tipo_producto']){
                        ?>
                      <option value="<?php echo (int)$c['tipo_producto']; ?>">
                        <?php echo $c['nombre'] ?>  
                      </option>
                    <?php }}
                else{?>
                    <option value="<?php echo (int)$c['tipo_producto']; ?>">
                    <?php echo $c['nombre']; 
                }
                endforeach; ?>
                </select><br>
            
        </div>
        <div class="formulario-G">
            
                Nit Proveedor<br>
                <input type="text" placeholder="Ingrese el nit del proveedor" value="<?php echo $txtNit;?>"name="txtNitPG"><br>
                Stock<br>
                <input type="number" placeholder="Ingresar el nombre del producto" value="<?php echo $txtStock;?>" name="txtStockPRG"><br>
                Precio producto<br>
                <input type="number" placeholder="Ingrese el precio del producto" value="<?php echo $txtPrecio;?>" name="txtPrecioPRG"><br>
                Precio de venta<br>
                <input type="number" placeholder="Ingresa el precio de venta del producto" value="<?php echo $txtPrecioVenta;?>" name="txtPrecioVentaPRG"><br>
            
        </div>
        <div class="botones">
            <form>

                <input type="submit" value="Crear" name="botonCrearPRG">
                
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
            <th>Nombre</th>
            <th>Stock</th>
            <th>Tipo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            
    <?php foreach($listar as $datos){ ?>
        <tr>
            <td><?php echo $datos['nombre_producto']; ?></td>
            <td><?php echo $datos['stock']; ?></td>
            <?php foreach($cat as $c){ ?>
            <?php  if ($datos['tipo_producto'] == $c['tipo_producto']){?>
                <td><?php echo $c['nombre']; ?></td>
            <form method="post">
            <input type="hidden"  name="txtIdPRG" id="txtIdPRG" value="<?php echo $datos['id_producto'];?>"><br>
            <td>
            
            <a name="accion" class="casilla" value="Update" href="UPR.php?Id=<?= $datos['id_producto']; ?>">
                <img src="../../assests/editar.png"></a>
            </td>
            <td>
                <button type=submit name="accion" class="casilla" value="Delete">
                <img src="../../assests/delete.png"></button>
            </td>
            </form>
        </tr>
<?php }}}?>       

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