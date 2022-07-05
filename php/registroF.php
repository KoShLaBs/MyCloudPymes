
<?php
 
 include '../php/Controlador/Controlador.php';
 include '../php/alertas/seguridad.php';

 session_start();

 if($_SERVER["REQUEST_METHOD"] == "POST")   {

     if(isset($_POST["txtIdFV"]) && isset($_POST["txtCedulaCV"])
     && isset($_POST["txtTelefonoCV"]) && isset($_POST["txtNombrePRG"])
     && isset($_POST["txtCedulaVG"]) && isset($_POST["txtCorreoCV"]) 
     && isset($_POST["txtIdPRG"]) && isset($_POST["txtCantidadFV"])
     && isset($_POST["txtCostoFV"]) && isset($_POST["txtFechaFV"]) ) {

        $txtIdFV = validar($_POST["txtIdFV"]);
        $txtCedulaVG = validar($_POST["txtCedulaVG"]);
        $txtCedulaCV = validar($_POST["txtCedulaCV"]);
        $txtCorreoCV = validar($_POST["txtCorreoCV"]);
        $txtTelefonoCV = validar($_POST["txtTelefonoCV"]);
        $txtIdPRG = validar($_POST["txtIdPRG"]); 
        $txtNombrePRG = validar($_POST["txtNombrePRG"]);  
        $txtCostoFV = validar($_POST["txtCostoFV"]);  
        $txtCantidadFV = validar($_POST["txtCantidadFV"]);  
        $txtFechaFV = validar($_POST["txtFechaFV"]);  
 
         if (Controlador::RegistrarFactura($txtIdFV, $txtCedulaVG, 
         $txtCedulaCV, $txtCorreoCV, $txtTelefonoCV, $txtIdPRG, 
         $txtNombrePRG, $txtCostoFV, $txtCantidadFV, $txtFechaFV)){
            $producto = Controlador::getproductosG($txtIdPRG); 
            $FacturaV = Controlador::getfactura($txtIdFV);

             $_SESSION["id_detalle_venta"] = array(
                 "id_detalle_venta"=>$FacturaV->getId_detalle_venta(),
                 "id_usuario"=>$FacturaV->getId_usuario(),
                 "cedula_cliente"=>$FacturaV->getCedula_cliente(),
                 "correo_cliente"=>$FacturaV->getCorreo_cliente(),
                 "telefono_cliente"=>$FacturaV->getTelefono_cliente(),
                 "id_producto"=>$FacturaV->getId_producto(),
                 "nombre_producto"=>$FacturaV->getNombre_producto(),
                 "total_compra"=>$FacturaV->getTotal_compra(),
                 "cantidad_producto"=>$FacturaV->getCantidad_producto(),
                 "fecha_compra"=>$FacturaV->getFecha_compra(),
             ); 

             
     
     echo'<script type="text/javascript">
         alert("Se ha creado el producto");
         
         </script>';
         header("location:../html/V/facturaV.php");
     }  

     
     
 }

 
 }else{

     
     echo'<script type="text/javascript">
         alert("No se ha creado el producto");
         
         </script>';
         header("location:../html/V/facturaV.php?error=1");

 }

?>
