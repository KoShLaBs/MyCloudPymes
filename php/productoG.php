<?php

class ProductoG{

    private $id_producto;
    private $nit_proveedor;
    private $nombre_producto;
    private $stock;
    private $ubicacion;
    private $precio_producto;
    private $precio_venta_producto;
    private $tipo_producto;

    public function getId_producto() {
        return $this->id_producto;
    }

    public function getNit_proveedor() {
        return $this->nit_proveedor;
    }

    public function getNombre_producto() {
        return $this->nombre_producto;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getUbicacion() {
        return $this->ubicacion;
    }

    public function getPrecio_producto() {
        return $this->precio_producto;
    }

    public function getPrecio_venta_producto() {
        return $this->precio_venta_producto;
    }

    public function getTipo_producto() {
        return $this->tipo_producto;
    }

    public function setId_producto($id_producto): void {
        $this->id_producto = $id_producto;
    }

    public function setNit_proveedor($nit_proveedor): void {
        $this->nit_proveedor = $nit_proveedor;
    }

    public function setNombre_producto($nombre_producto): void {
        $this->nombre_producto = $nombre_producto;
    }

    public function setStock($stock): void {
        $this->stock = $stock;
    }

    public function setUbicacion($ubicacion): void {
        $this->ubicacion = $ubicacion;
    }

    public function setPrecio_producto($precio_producto): void {
        $this->precio_producto = $precio_producto;
    }

    public function setPrecio_venta_producto($precio_venta_producto): void {
        $this->precio_venta_producto = $precio_venta_producto;
    }

    public function setTipo_producto($tipo_producto): void {
        $this->tipo_producto = $tipo_producto;
    }


    
}

?>