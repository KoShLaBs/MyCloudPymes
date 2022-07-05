<?php

class ProveedorG{

    private $nit_proveedor;
    private $nombre_proveedor;
    private $direccion_proveedor;
    private $telefono_proveedor;
    private $correo_proveedor;
    
    public function getNit_proveedor() {
        return $this->nit_proveedor;
    }

    public function getNombre_proveedor() {
        return $this->nombre_proveedor;
    }

    public function getDireccion_proveedor() {
        return $this->direccion_proveedor;
    }

    public function getTelefono_proveedor() {
        return $this->telefono_proveedor;
    }

    public function getCorreo_proveedor() {
        return $this->correo_proveedor;
    }

    public function setNit_proveedor($nit_proveedor): void {
        $this->nit_proveedor = $nit_proveedor;
    }

    public function setNombre_proveedor($nombre_proveedor): void {
        $this->nombre_proveedor = $nombre_proveedor;
    }

    public function setDireccion_proveedor($direccion_proveedor): void {
        $this->direccion_proveedor = $direccion_proveedor;
    }

    public function setTelefono_proveedor($telefono_proveedor): void {
        $this->telefono_proveedor = $telefono_proveedor;
    }

    public function setCorreo_proveedor($correo_proveedor): void {
        $this->correo_proveedor = $correo_proveedor;
    }



}

?>