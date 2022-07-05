
<?php
 
 include '../php/Controlador/Controlador.php';
 include '../php/alertas/seguridad.php';

 session_start();

 if($_SERVER["REQUEST_METHOD"] == "POST")   {

     if(isset($_POST["txtIdPRG"]) && isset($_POST["txtNitPG"])
     && isset($_POST["txtNombrePRG"]) && isset($_POST["txtStockPRG"])
     && isset($_POST["txtUbicacionPRG"]) && isset($_POST["txtPrecioPRG"]) 
     && isset($_POST["txtPrecioVentaPRG"]) && isset($_POST["selectTipoPRG"])) {

        $txtIdPRG = validar($_POST["txtIdPRG"]); 
        $txtNitPG = validar($_POST["txtNitPG"]);
        $txtNombrePRG = validar($_POST["txtNombrePRG"]); 
        $txtStockPRG = validar($_POST["txtStockPRG"]); 
        $txtUbicacionPRG = validar($_POST["txtUbicacionPRG"]); 
        $txtPrecioPRG = validar($_POST["txtPrecioPRG"]); 
        $txtPrecioVentaPRG = validar($_POST["txtPrecioVentaPRG"]); 
        $selectTipoPRG = validar($_POST["selectTipoPRG"]); 
 
         if (Controlador::RegistrarPR($txtIdPRG, $txtNitPG, $txtNombrePRG,
         $txtStockPRG, $txtUbicacionPRG, $txtPrecioPRG, $txtPrecioVentaPRG, $selectTipoPRG)){
             $proveedorG = Controlador::getproveedorG($txtNitPG);
             $productoG = Controlador::getproductosG($txtIdPRG);

             $_SESSION["id_producto"] = array(
                 "id_producto"=>$productoG->getId_producto(),
                 "nit_proveedor"=>$proveedorG->getNit_proveedor(),
                 "nombre_producto"=>$productoG->getNombre_producto(),
                 "stock"=>$productoG->getStock(),
                 "ubicacion"=>$productoG->getUbicacion(),
                 "precio_producto"=>$productoG->getPrecio_producto(),
                 "precio_venta_producto"=>$productoG->getPrecio_venta_producto(),
                 "tipo_producto"=>$productoG->getTipo_producto(),
             ); 

             
     
     echo'<script type="text/javascript">
         alert("Se ha creado el producto");
         
         </script>';
         header("location:../html/G/productoG.php");
     }  

     
     
 }

 
 }else{

     
     echo'<script type="text/javascript">
         alert("No se ha creado el producto");
         
         </script>';
         header("location:../html/G/productoG.php?error=1");

 }

?>
