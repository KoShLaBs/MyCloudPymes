
<?php
 
 include '../php/Controlador/Controlador.php';
 include '../php/alertas/seguridad.php';

 session_start();

 if($_SERVER["REQUEST_METHOD"] == "POST")   {

    if(isset($_POST["txtId"]) && isset($_POST["txtCedulaVG"])
    && isset($_POST["txtDireccionVG"]) && isset($_POST["txtCorreoVG"])
    && isset($_POST["txtContraseñaVG"]) && isset($_POST["txtNombreVG"])
    && isset($_POST["txtTelefonoVG"]) && isset($_POST["txtFechaNacVG"])) {

        $txtId = validar($_POST["txtId"]);
        $txtCedulaVG = validar($_POST["txtCedulaVG"]);
        $txtDireccionVG = validar($_POST["txtDireccionVG"]);
        $txtCorreoVG = validar($_POST["txtCorreoVG"]);
        $txtContrasenaVG = validar($_POST["txtContraseñaVG"]);
        $txtNombreVG = validar($_POST["txtNombreVG"]);
        $txtTelefonoVG = validar($_POST["txtTelefonoVG"]);
        $txtFechaNacVG = validar($_POST["txtFechaNacVG"]);
        

        if (Controlador::actualizarV($txtId, $txtContrasenaVG,
        $txtCedulaVG, $txtNombreVG, $txtDireccionVG, $txtTelefonoVG, $txtCorreoVG, 
        $txtFechaNacVG)){
            $usuario = Controlador::getUsuario($txtUsuarioVG, $txtContrasenaVG);

            $_SESSION["id_usuario"] = array(
                "id_usuario"=>$usuario->getId_usuario(),
                "password_usuario"=>$usuario->getPassword_usuario(),
                "cedula_usuario"=>$usuario->getCedula_usuario(),
                "nombre_usuario"=>$usuario->getNombre_usuario(),
                "direccion_usuario"=>$usuario->getDireccion_usuario(),
                "telefono_usuario"=>$usuario->getTelefono_usuario(),
                "correo_usuario"=>$usuario->getCorreo_usuario(),
                "fecha_nac_usuario"=>$usuario->getFecha_nac_usuario(),
            ); 

            
    
    echo'<script type="text/javascript">
        alert("Se ha actualizado el usuario");
        window.location.href="UV.php";
        </script>';
        header("location:../html/G/vendedorG.php");
    }  

    
    
}


}else{

    
    echo'<script type="text/javascript">
        alert("No se ha actualizado el usuario");
        window.location.href="UV.php";
        </script>';
        header("location:../html/G/UV.php?error=1");

}

?>
