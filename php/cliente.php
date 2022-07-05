<?php

class Cliente{

    private $cedula_cliente;
    private $nombre_cliente;
    private $direccion_cliente;
    private $telefono_cliente;
    private $correo_cliente;
    private $fecha_nac_cliente;
    
    public function getCedula_cliente() {
        return $this->cedula_cliente;
    }

    public function getNombre_cliente() {
        return $this->nombre_cliente;
    }

    public function getDireccion_cliente() {
        return $this->direccion_cliente;
    }

    public function getTelefono_cliente() {
        return $this->telefono_cliente;
    }

    public function getCorreo_cliente() {
        return $this->correo_cliente;
    }

    public function getFecha_nac_cliente() {
        return $this->fecha_nac_cliente;
    }

    public function setCedula_cliente($cedula_cliente): void {
        $this->cedula_cliente = $cedula_cliente;
    }

    public function setNombre_cliente($nombre_cliente): void {
        $this->nombre_cliente = $nombre_cliente;
    }

    public function setDireccion_cliente($direccion_cliente): void {
        $this->direccion_cliente = $direccion_cliente;
    }

    public function setTelefono_cliente($telefono_cliente): void {
        $this->telefono_cliente = $telefono_cliente;
    }

    public function setCorreo_cliente($correo_cliente): void {
        $this->correo_cliente = $correo_cliente;
    }

    public function setFecha_nac_cliente($fecha_nac_cliente): void {
        $this->fecha_nac_cliente = $fecha_nac_cliente;
    }



}

?>