
<?php
 
 include '../php/Controlador/Controlador.php';
 include '../php/alertas/seguridad.php';
 include "../../php/Datos/conect.php";

 $cnx = Conect::conectar();


 session_start();

 if(isset($_POST['botonActualizarTG']))    {

     $txtId = validar($_POST["txtId"]);
     $txtCedulaVG = validar($_POST["txtCedulaVG"]);
     $txtDireccionVG = validar($_POST["txtDireccionVG"]);
     $txtCorreoVG = validar($_POST["txtCorreoVG"]);
     $txtContrasenaVG = validar($_POST["txtContraseñaVG"]);
     $txtNombreVG = validar($_POST["txtNombreVG"]);
     $txtTelefonoVG = validar($_POST["txtTelefonoVG"]);
     $txtFechaNacVG = validar($_POST["txtFechaNacVG"]);
     

     try{
         

         $query = "UPDATE usuario SET password_usuario=:password_usuario,
         cedula_usuario=:cedula_usuario, nombre_usuario=:nombre_usuario,
         direccion_usuario=:direccion_usuario, telefono_usuario=:telefono_usuario, 
         correo_usuario=:correo_usuario, fecha_nac_usuario=:fecha_nac_usuario 
         WHERE id_usuario=:id_usuario";

         $statement = $cnx->prepare($query);

         $statement->bindValue(':password_usuario',$txtContrasenaVG);
         $statement->bindValue(':cedula_usuario', $txtCedulaVG);
         $statement->bindValue(':nombre_usuario', $txtNombreVG);
         $statement->bindValue(':direccion_usuario', $txtDireccionVG);
         $statement->bindValue(':telefono_usuario', $txtTelefonoVG);
         $statement->bindValue(':correo_usuario', $txtCorreoVG);
         $statement->bindValue(':fecha_nac_usuario', $txtFechaVG);
         $statement->bindValue(':id_usuario', $txtId);
         
          

         $quey_execute = $statement->execute();

         if($quey_execute){
             
             header("location:../html/G/tecnicoG.php");
             exit(0);
         }else{
             
             header("location:../html/G/tecnicoG.php?error=1");
             exit(0);
         }

     }catch (PDOException $e){
         echo $e->getMessage();
     }

 }


 if(isset($_POST['botonCrearTG']))   {

        if(isset($_POST["txtUsuarioTG"]) && isset($_POST["txtCedulaTG"])
        && isset($_POST["txtDireccionTG"]) && isset($_POST["txtCorreoTG"])
        && isset($_POST["txtContraseñaTG"]) && isset($_POST["txtNombreTG"])
        && isset($_POST["txtTelefonoTG"]) && isset($_POST["txtFechaNacTG"])) {

            $txtUsuarioTG = validar($_POST["txtUsuarioTG"]);
            $txtCedulaTG = validar($_POST["txtCedulaTG"]);
            $txtDireccionTG = validar($_POST["txtDireccionTG"]);
            $txtCorreoTG = validar($_POST["txtCorreoTG"]);
            $txtContrasenaTG = validar($_POST["txtContraseñaTG"]);
            $txtNombreTG = validar($_POST["txtNombreTG"]);
            $txtTelefonoTG = validar($_POST["txtTelefonoTG"]);
            $txtFechaNacTG = validar($_POST["txtFechaNacTG"]);
            $txtCargo_usuario = 3;
    
            if (Controlador::registroV($txtUsuarioTG, $txtContrasenaTG,
            $txtCedulaTG, $txtNombreTG, $txtDireccionTG, $txtTelefonoTG, $txtCorreoTG, 
            $txtFechaNacTG, $txtCargo_usuario)){
                $usuario = Controlador::getUsuario($txtUsuarioTG, $txtContrasenaTG);

                $_SESSION["usuario"] = array(
                    "usuario"=>$usuario->getUsuario(),
                    "password_usuario"=>$usuario->getPassword_usuario(),
                    "cedula_usuario"=>$usuario->getCedula_usuario(),
                    "nombre_usuario"=>$usuario->getNombre_usuario(),
                    "direccion_usuario"=>$usuario->getDireccion_usuario(),
                    "telefono_usuario"=>$usuario->getTelefono_usuario(),
                    "correo_usuario"=>$usuario->getCorreo_usuario(),
                    "fecha_nac_usuario"=>$usuario->getFecha_nac_usuario(),
                    "cargo_usuario"=>$usuario->getCargo_usuario(),
                ); 

                
        
        echo'<script type="text/javascript">
            alert("Se ha creado el usuario");
            window.location.href="index.php";
            </script>';
            header("location:../html/G/tecnicoG.php");
        }  

        
        
    }

    
    }else{

        
        echo'<script type="text/javascript">
            alert("No se ha creado el usuario");
            window.location.href="index.php";
            </script>';
            header("location:../html/G/tecnicoG.php?error=1");

    }

?>
