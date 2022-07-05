<?php

class Usuario{

    private $id_usuario;
    private $usuario;
    private $password_usuario;
    private $cedula_usuario;
    private $nombre_usuario;
    private $direccion_usuario;
    private $telefono_usuario;
    private $correo_usuario;
    private $fecha_nac_usuario;
    private $cargo_usuario;

    
    public function getId_usuario() {
        return $this->id_usuario;
    }
    
    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

        public function getPassword_usuario() {
        return $this->password_usuario;
    }

    public function getCedula_usuario() {
        return $this->cedula_usuario;
    }

    public function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    public function getDireccion_usuario() {
        return $this->direccion_usuario;
    }

    public function getTelefono_usuario() {
        return $this->telefono_usuario;
    }

    public function getCorreo_usuario() {
        return $this->correo_usuario;
    }

    public function getFecha_nac_usuario() {
        return $this->fecha_nac_usuario;
    }

    public function getCargo_usuario() {
        return $this->cargo_usuario;
    }

    public function setId_usuario($id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    public function setPassword_usuario($password_usuario): void {
        $this->password_usuario = $password_usuario;
    }

    public function setCedula_usuario($cedula_usuario): void {
        $this->cedula_usuario = $cedula_usuario;
    }

    public function setNombre_usuario($nombre_usuario): void {
        $this->nombre_usuario = $nombre_usuario;
    }

    public function setDireccion_usuario($direccion_usuario): void {
        $this->direccion_usuario = $direccion_usuario;
    }

    public function setTelefono_usuario($telefono_usuario): void {
        $this->telefono_usuario = $telefono_usuario;
    }

    public function setCorreo_usuario($correo_usuario): void {
        $this->correo_usuario = $correo_usuario;
    }

    public function setFecha_nac_usuario($fecha_nac_usuario): void {
        $this->fecha_nac_usuario = $fecha_nac_usuario;
    }

    public function setCargo_usuario($cargo_usuario): void {
        $this->cargo_usuario = $cargo_usuario;
    }


    

}

?>