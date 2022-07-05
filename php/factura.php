<?php

class Factura{
    private $id_detalle_venta;
    private $id_usuario;
    private $cedula_cliente;
    private $correo_cliente;
    private $telefono_cliente;
    private $id_producto;
    private $nombre_producto;
    private $total_compra;
    private $cantidad_producto;
    private $fecha_compra;

    public function getId_detalle_venta() {
        return $this->id_detalle_venta;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getCedula_cliente() {
        return $this->cedula_cliente;
    }

    public function getCorreo_cliente() {
        return $this->correo_cliente;
    }

    public function getTelefono_cliente() {
        return $this->telefono_cliente;
    }

    public function getId_producto() {
        return $this->id_producto;
    }

    public function getNombre_producto() {
        return $this->nombre_producto;
    }

    public function getTotal_compra() {
        return $this->total_compra;
    }

    public function getCantidad_producto() {
        return $this->cantidad_producto;
    }

    public function getFecha_compra() {
        return $this->fecha_compra;
    }

    public function setId_detalle_venta($id_detalle_venta): void {
        $this->id_detalle_venta = $id_detalle_venta;
    }

    public function setId_usuario($id_usuario): void {
        $this->id_usuario = $id_usuario;
    }

    public function setCedula_cliente($cedula_cliente): void {
        $this->cedula_cliente = $cedula_cliente;
    }

    public function setCorreo_cliente($correo_cliente): void {
        $this->correo_cliente = $correo_cliente;
    }

    public function setTelefono_cliente($telefono_cliente): void {
        $this->telefono_cliente = $telefono_cliente;
    }

    public function setId_producto($id_producto): void {
        $this->id_producto = $id_producto;
    }

    public function setNombre_producto($nombre_producto): void {
        $this->nombre_producto = $nombre_producto;
    }

    public function setTotal_compra($total_compra): void {
        $this->total_compra = $total_compra;
    }

    public function setCantidad_producto($cantidad_producto): void {
        $this->cantidad_producto = $cantidad_producto;
    }

    public function setFecha_compra($fecha_compra): void {
        $this->fecha_compra = $fecha_compra;
    }



}

?>