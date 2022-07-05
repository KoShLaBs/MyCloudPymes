
<?php
 
 include '../php/Controlador/Controlador.php';
 include '../php/alertas/seguridad.php';
 include "../../php/Datos/conect.php";

 $cnx = Conect::conectar();


 session_start();

 

 if(isset($_POST['botonActualizarC']))    {

    $txtCedulaC = validar($_POST["txtCedulaC"]); 
    $txtNombreC = validar($_POST["txtNombreC"]); 
    $txtDireccionC = validar($_POST["txtDireccionC"]); 
    $txtTelefonoC = validar($_POST["txtTelefonoC"]); 
    $txtCorreoC = validar($_POST["txtCorreoC"]); 
    $txtFechaNacC = validar($_POST["txtFechaNacC"]); 


     try{
         

         $query = "UPDATE cliente SET nombre_cliente=:nombre_cliente,
         direccion_cliente=:direccion_cliente, telefono_cliente=:telefono_cliente,
         correo_cliente=:correo_cliente, fecha_nac_cliente=:fecha_nac_cliente
         WHERE cedula_cliente=:cedula_cliente";

         $statement = $cnx->prepare($query);

         $statement->bindValue(':nombre_cliente',$txtNombreC);
         $statement->bindValue(':direccion_cliente', $txtDireccionC);
         $statement->bindValue(':telefono_cliente', $txtTelefonoC);
         $statement->bindValue(':correo_cliente', $txtCorreoC);
         $statement->bindValue(':fecha_nac_cliente', $txtFechaNacC);
         $statement->bindValue(':cedula_cliente', $txtCedulaC);
         

         $quey_execute = $statement->execute();

         if($quey_execute){
     
            if(isset($_SESSION["usuario"])){
                if ($_SESSION["usuario"]["cargo_usuario"] == 3){ 
                header("location:../html/T/clienteT.php");
            }elseif ($_SESSION["usuario"]["cargo_usuario"] == 2){
                header("location:../html/V/clienteV.php");
            } 
        }
             exit(0);
        }else{
            
            if(isset($_SESSION["usuario"])){
                if ($_SESSION["usuario"]["cargo_usuario"] == 3){ 
                header("location:../html/T/clienteT.php?error=1");
            }elseif ($_SESSION["usuario"]["cargo_usuario"] == 2){
                header("location:../html/V/clienteV.php?error=1");
            } 
        }
            exit(0);
        }

        }catch (PDOException $e){
         echo $e->getMessage();
     }

 }



 if(isset($_POST['botonCrearC']))   {

     if(isset($_POST["txtCedulaC"]) && isset($_POST["txtNombreC"])
     && isset($_POST["txtDireccionC"]) && isset($_POST["txtTelefonoC"])
     && isset($_POST["txtCorreoC"]) && isset($_POST["txtFechaNacC"])) {

        $txtCedulaC = validar($_POST["txtCedulaC"]); 
        $txtNombreC = validar($_POST["txtNombreC"]); 
        $txtDireccionC = validar($_POST["txtDireccionC"]); 
        $txtTelefonoC = validar($_POST["txtTelefonoC"]); 
        $txtCorreoC = validar($_POST["txtCorreoC"]); 
        $txtFechaNacC = validar($_POST["txtFechaNacC"]); 
 
         if (Controlador::RegistrarCliente($txtCedulaC, $txtNombreC,
         $txtDireccionC, $txtTelefonoC, $txtCorreoC, $txtFechaNacC)){
             $cliente = Controlador::getcliente($txtCedulaC);
             
             $_SESSION["cedula_cliente"] = array(
                 "cedula_cliente"=>$cliente->getCedula_cliente(),
                 "nombre_cliente"=>$cliente->getNombre_cliente(),
                 "direccion_cliente"=>$cliente->getDireccion_cliente(),
                 "telefono_cliente"=>$cliente->getTelefono_cliente(),
                 "correo_cliente"=>$cliente->getCorreo_cliente(),
                 "fecha_nac_cliente"=>$cliente->getFecha_nac_cliente(),
             ); 

             
     
     echo'<script type="text/javascript">
         alert("Se ha creado el cliente");
         
         </script>';
         if(isset($_SESSION["usuario"])){
            if ($_SESSION["usuario"]["cargo_usuario"] == 3){ 
            header("location:../html/T/clienteT.php");
        }elseif ($_SESSION["usuario"]["cargo_usuario"] == 2){
            header("location:../html/V/clienteV.php");
        } 
    }
         
     }  

     
     
 }

 
 }else{

     
     echo'<script type="text/javascript">
         alert("No se ha creado el cliente");
         
         </script>';

         if(isset($_SESSION["usuario"])){
            if ($_SESSION["usuario"]["cargo_usuario"] == 3){ 
            header("location:../html/T/clienteT.php?error=1");
        }elseif ($_SESSION["usuario"]["cargo_usuario"] == 2){
            header("location:../html/V/clienteV.php?error=1");
        } 
    }
     

 }

?>
