<?php

class OrdenCompra{

    private $id_orden_compra;
    private $nit_proveedor;
    private $id_producto;
    private $cantidad_producto;
    private $valor_producto;
    private $gasto_total;
    private $fecha_orden;

    public function getId_orden_compra() {
        return $this->id_orden_compra;
    }

    public function getNit_proveedor() {
        return $this->nit_proveedor;
    }

    public function getId_producto() {
        return $this->id_producto;
    }

    public function getCantidad_producto() {
        return $this->cantidad_producto;
    }

    public function getValor_producto() {
        return $this->valor_producto;
    }

    public function getGasto_total() {
        return $this->gasto_total;
    }

    public function getFecha_orden() {
        return $this->fecha_orden;
    }

    public function setId_orden_compra($id_orden_compra): void {
        $this->id_orden_compra = $id_orden_compra;
    }

    public function setNit_proveedor($nit_proveedor): void {
        $this->nit_proveedor = $nit_proveedor;
    }

    public function setId_producto($id_producto): void {
        $this->id_producto = $id_producto;
    }

    public function setCantidad_producto($cantidad_producto): void {
        $this->cantidad_producto = $cantidad_producto;
    }

    public function setValor_producto($valor_producto): void {
        $this->valor_producto = $valor_producto;
    }

    public function setGasto_total($gasto_total): void {
        $this->gasto_total = $gasto_total;
    }

    public function setFecha_orden($fecha_orden): void {
        $this->fecha_orden = $fecha_orden;
    }



}

?>

