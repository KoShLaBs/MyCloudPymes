
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

if(isset($_GET['opcion'])){

    $query = $cnx->prepare("SELECT * FROM cliente WHERE cedula_cliente=:cedula_cliente");
            $query->bindValue(':cedula_cliente', $_GET['opcion']);
            $query->execute();
            $lista = $query->fetchAll();

}


if(isset($_GET['id'])){

    $query = $cnx->prepare("SELECT * FROM producto WHERE id_producto=:id_producto");
            $query->bindValue(':id_producto', $_GET['id']);
            $query->execute();
            $producto = $query->fetchAll();

}

//--------------------------------------------------//

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
    
    <title>Factura</title>
</head>
<script type="text/javascript"> 
function buscar(){
var opcion = document.getElementById('names').value;
window.location.href = 'facturaV.php?id='+opcion;
}
</script>
<body >
<section>
    <?php include_once('../V/encabezado.php'); ?>
        <div class="contenedor-blanco">
            <h3>Factura</h3>
    </div>
        <div class="formulario-1">
            <form class="formulario-G" action="../../php/registroF.php" method="POST">
                
                <input type="hidden" placeholder="Ingresar id de la facutura" value="<?php echo $txtIdFV;?>" name="txtIdFV"><br>
                Cedula cliente<br>
            
                
                <select id="names" name="txtCedulaCV" onchange="return buscar();">
                
                <option value="">Selecciona</option>
                    

                    <?php  foreach ($cli as $c): 
                        if ($accion == "Update"){
                            if ($txtCedulaCV == $c['cedula_cliente']){
                        ?>
                        <option value="<?php echo (int)$c['cedula_cliente']; ?>">
                      <?php $c['cedula_cliente'] ?>  
                      </option>
                      <?php }}
                else{?>
                    <option value="<?php echo (int)$c['cedula_cliente']; ?>">
                      <?php echo $c['cedula_cliente'];
                }
                endforeach; ?>
                </select><br>

                Telefono<br>
                <input type="text" value="<?php ?>" name="txtTelefonoCV"><br>
                
                Nombre Producto<br>
                
                <input type="text" value="<?php ?>" name="txtNombrePRG"><br>

                Cantidad producto<br>
                <input type="number" placeholder="Ingrese cantidad del producto" value="" id="txtCantidadFV" name="txtCantidadFV" onchange="return buscar();"><br>
                
                
            
        </div>
        <div class="formulario-G">
            
                <input type="hidden" name="txtFechaFV"  value="<?php echo date("Y-m-d");?>"><br>
                Id vendedor<br>
                <input type="text" placeholder="Ingresar id del vendedor" value="<?php echo $txtCedulaVG;?>" name="txtCedulaVG"><br>
                Correo Electronico<br>
                
                <input type="text" placeholder="Ingresar el correo del cliente" value="<?php ?>" name="txtCorreoCV" id="txtCorreoCV"><br>
                
                Id producto<br>
                
                <input type="text" placeholder="Ingrese id del producto" value="<?php ?>" name="txtIdPRG"><br>
                
                Costo total<br>
                <table name="txtCostoFV"> 
                
                <?php foreach($pro as $p){ 
                    if($p){
                        $valor = $p['precio_venta_producto'];?> 
                <td width="20%">$
                <input type="text" placeholder="Ingrese costo total" value="<?php echo number_format($valor * $txtCantidadFV);?>" name="txtCostoFV"> 
                </td>
                <?php
                    }else{
                ?>
                <td></td>
                <?php } }?>
                </table>
                <!--<input type="text" placeholder="Ingrese costo total" value="<?php echo $txtCostoFV;?>" name="txtCostoFV"><br>-->
            
        </div>
        <div class="botones">
            
                <input type="submit" value="Crear" name="botonCrearFV">
            
                </form>
            <form method="post">
                <!--<input type="submit" value="Actualizar" name="accion">-->
            </form>
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