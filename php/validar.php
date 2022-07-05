<?php
 
    include '../php/Controlador/Controlador.php';
    include '../php/alertas/seguridad.php';

    session_start();

    header('Content-type: application/json');
    $resultado = array();

    if($_SERVER["REQUEST_METHOD"] == "POST")   {

        if(isset($_POST["txtusuario"]) && isset($_POST["txtpassword_usuario"])) {

            $txtUsuario = validar($_POST["txtusuario"]);
            $txtPassword_usuario = validar($_POST["txtpassword_usuario"]);
    
            $resultado = array("estado" => "true");
    
            if(Controlador::login($txtUsuario, $txtPassword_usuario)){

                $usuario = Controlador::getUsuario($txtUsuario, $txtPassword_usuario);
                $_SESSION["usuario"] = array(
                    "id_usuario"=>$usuario->getId_usuario(),
                    "usuario"=>$usuario->getUsuario(),
                    "nombre_usuario"=>$usuario->getNombre_usuario(),
                    "cedula_usuario"=>$usuario->getCedula_usuario(),
                    "direccion_usuario"=>$usuario->getDireccion_usuario(),
                    "telefono_usuario"=>$usuario->getTelefono_usuario(),
                    "correo_usuario"=>$usuario->getCorreo_usuario(),
                    "fecha_nac_usuario"=>$usuario->getFecha_nac_usuario(),
                    "cargo_usuario"=>$usuario->getCargo_usuario(),
                ); 

                return print(json_encode($resultado));

            }
    
        }    

    }

    $resultado = array("estado" => "false");
    return print(json_encode($resultado));

?>
