
<?php
 
 include '../php/Controlador/Controlador.php';
 include '../php/alertas/seguridad.php';
 include "../../php/Datos/conect.php";

 $cnx = Conect::conectar();


 session_start();

 if(isset($_POST['botonActualizarPG']))    {

    $txtNit=validar($_POST['txtNitPG']);
    $txtNombre=validar($_POST['txtNombrePG']);
    $txtDireccion=validar($_POST['txtDireccionPG']);
    $txtTelefono=validar($_POST['txtTelefonoPG']);
    $txtCorreo=validar($_POST['txtCorreoPG']);

     try{
         

         $query = "UPDATE proveedor SET nombre_proveedor=:nombre_proveedor,
         direccion_proveedor=:direccion_proveedor, telefono_proveedor=:telefono_proveedor,
         correo_proveedor=:correo_proveedor
         WHERE nit_proveedor=:nit_proveedor";

         $statement = $cnx->prepare($query);

         $statement->bindValue(':nombre_proveedor',$txtNombre);
         $statement->bindValue(':direccion_proveedor', $txtDireccion);
         $statement->bindValue(':telefono_proveedor', $txtTelefono);
         $statement->bindValue(':correo_proveedor', $txtCorreo);
         $statement->bindValue(':nit_proveedor', $txtNit);
         

         $quey_execute = $statement->execute();

         if($quey_execute){
             
             header("location:../html/G/proveedorG.php");
             exit(0);
         }else{
             
             header("location:../html/G/proveedorG.php?error=1");
             exit(0);
         }

     }catch (PDOException $e){
         echo $e->getMessage();
     }

 }


 if(isset($_POST['botonCrearPG']))   {
     if(isset($_POST["txtNitPG"]) && isset($_POST["txtNombrePG"])
     && isset($_POST["txtDireccionPG"]) && isset($_POST["txtTelefonoPG"])
     && isset($_POST["txtCorreoPG"])) {

         $txtNitPG = validar($_POST["txtNitPG"]);
         $txtNombrePG = validar($_POST["txtNombrePG"]);
         $txtDireccionPG = validar($_POST["txtDireccionPG"]);
         $txtTelefonoPG = validar($_POST["txtTelefonoPG"]);
         $txtCorreoPG = validar($_POST["txtCorreoPG"]);
         
 
         if (Controlador::registroP($txtNitPG, $txtNombrePG,
         $txtDireccionPG, $txtTelefonoPG, $txtCorreoPG)){
             $proveedorG = Controlador::getproveedorG($txtNitPG);

             $_SESSION["nit_proveedor"] = array(
                 "nit_proveedor"=>$proveedorG->getNit_proveedor(),
                 "nombre_proveedor"=>$proveedorG->getNombre_proveedor(),
                 "direccion_proveedor"=>$proveedorG->getDireccion_proveedor(),
                 "telefono_proveedor"=>$proveedorG->getTelefono_proveedor(),
                 "correo_proveedor"=>$proveedorG->getCorreo_proveedor(),
             ); 

             
     
     echo'<script type="text/javascript">
         alert("Se ha creado el proveedor");
         
         </script>';
         header("location:../html/G/proveedorG.php");
     }  

     
     
 }

 
 }else{

     
     echo'<script type="text/javascript">
         alert("No se ha creado el proveedor");
         
         </script>';
         header("location:../html/G/proveedorG.php?error=1");

 }

?>
