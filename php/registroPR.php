
<?php
 
 include '../php/Controlador/Controlador.php';
 include '../php/alertas/seguridad.php';
 include "../../php/Datos/conect.php";

 $cnx = Conect::conectar();


 session_start();

 if(isset($_POST['botonActualizarPRG']))    {

    $txtId=validar($_POST['txtIdPRG']);
    $txtNit=validar($_POST['txtNitPG']);
    $txtNombre=validar($_POST['txtNombrePRG']);
    $txtStock=validar($_POST['txtStockPRG']);
    $txtUbicacion=validar($_POST['txtUbicacionPRG']);
    $txtPrecio=validar($_POST['txtPrecioPRG']);
    $txtPrecioVenta=validar($_POST['txtPrecioVentaPRG']);
    $selectTipo=validar($_POST['selectTipoPRG']);

     try{
         

         $query = "UPDATE producto SET nit_proveedor=:nit_proveedor,
         nombre_producto=:nombre_producto, stock=:stock, ubicacion=:ubicacion,
         precio_producto=:precio_producto, precio_venta_producto=:precio_venta_producto,
         tipo_producto=:tipo_producto
         WHERE id_producto=:id_producto";

         $statement = $cnx->prepare($query);

         $statement->bindValue(':nit_proveedor', $txtNit);
         $statement->bindValue(':nombre_producto',$txtNombre);
         $statement->bindValue(':stock', $txtStock);
         $statement->bindValue(':ubicacion', $txtUbicacion);
         $statement->bindValue(':precio_producto', $txtPrecio);
         $statement->bindValue(':precio_venta_producto', $txtPrecioVenta);
         $statement->bindValue(':tipo_producto', $selectTipo);
         $statement->bindValue(':id_producto', $txtId);         

         $quey_execute = $statement->execute();

         if($quey_execute){
             
             header("location:../html/G/productoG.php");
             exit(0);
         }else{
             
             header("location:../html/G/productoG.php?error=1");
             exit(0);
         }

     }catch (PDOException $e){
         echo $e->getMessage();
     }

 }


 if(isset($_POST['botonCrearPRG']))   {

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
