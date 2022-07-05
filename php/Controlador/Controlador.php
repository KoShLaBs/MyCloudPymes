<?php

include '../php/Datos/Dao.php';
include_once ('../php/usuario.php');
include_once ('../php/proveedorG.php');
include_once ('../php/productoG.php');
include_once ('../php/cliente.php');
include_once ('../php/factura.php');

    class Controlador{

        public static function login($usuario, $password_usuario){

            $obj_usuario = new Usuario();
            $obj_usuario->setUsuario($usuario);
            $obj_usuario->setPassword_usuario($password_usuario);

            return DAO::login($obj_usuario);

        }

        public static function getusuario($usuario, $password_usuario){

            $obj_usuario = new Usuario();
            $obj_usuario->setUsuario($usuario);
            $obj_usuario->setPassword_usuario($password_usuario);

            return DAO::getUsuario($obj_usuario);

        }

        public static function registroV($usuario, $password_usuario, 
        $cedula_usuario, $nombre_usuario, $direccion_usuario, $telefono_usuario, 
        $correo_usuario,$fecha_nac_usuario,$cargo_usuario ){

            $obj_usuario = new Usuario();
            
            $obj_usuario->setUsuario($usuario);
            $obj_usuario->setPassword_usuario($password_usuario);
            $obj_usuario->setCedula_usuario($cedula_usuario);
            $obj_usuario->setNombre_usuario($nombre_usuario);
            $obj_usuario->setDireccion_usuario($direccion_usuario);
            $obj_usuario->setTelefono_usuario($telefono_usuario);
            $obj_usuario->setCorreo_Usuario($correo_usuario);
            $obj_usuario->setFecha_nac_Usuario($fecha_nac_usuario);
            $obj_usuario->setCargo_usuario($cargo_usuario);

            return DAO::registroV($obj_usuario);

        }

        
        public static function actualizarV($password_usuario, 
        $cedula_usuario, $nombre_usuario, $direccion_usuario, $telefono_usuario, 
        $correo_usuario,$fecha_nac_usuario,$id_usuario ){

            $obj_usuario = new Usuario();
        
            $obj_usuario->setPassword_usuario($password_usuario);
            $obj_usuario->setCedula_usuario($cedula_usuario);
            $obj_usuario->setNombre_usuario($nombre_usuario);
            $obj_usuario->setDireccion_usuario($direccion_usuario);
            $obj_usuario->setTelefono_usuario($telefono_usuario);
            $obj_usuario->setCorreo_Usuario($correo_usuario);
            $obj_usuario->setFecha_nac_Usuario($fecha_nac_usuario);
            $obj_usuario->setId_usuario($id_usuario);

            return DAO::actualizarV($obj_usuario);

        }

        #--------------------MODULO PROVEEDORES--------------------------------------------#


        
        public static function getproveedorG($nit_proveedor){

            $obj_proveedorG = new ProveedorG();
            $obj_proveedorG->setNit_proveedor($nit_proveedor);

            return DAO::getProveedorG($obj_proveedorG);

        }

        public static function registroP($nit_proveedor, $nombre_proveedor, 
        $direccion_proveedor, $telefono_proveedor, $correo_proveedor){

            $obj_proveedorG = new ProveedorG();
            
            $obj_proveedorG->setNit_proveedor($nit_proveedor);
            $obj_proveedorG->setNombre_proveedor($nombre_proveedor);
            $obj_proveedorG->setDireccion_proveedor($direccion_proveedor);
            $obj_proveedorG->setTelefono_proveedor($telefono_proveedor);
            $obj_proveedorG->setCorreo_proveedor($correo_proveedor);

            return DAO::registroP($obj_proveedorG);

        }


        
        
        #--------------------MODULO PRODUCTOS--------------------------------------------#


        
        public static function getproductosG($nit_proveedor){

            $obj_productoG = new ProductoG();
            $obj_productoG->setNit_proveedor($nit_proveedor);

            return DAO::getProductosG($obj_productoG);

        }

        public static function RegistrarPR($id_producto, $nit_proveedor, $nombre_producto,
        $stock, $ubicacion, $precio_producto, $precio_venta_producto, 
        $tipo_producto){

            $obj_productoG = new ProductoG();
            
            $obj_productoG->setId_producto($id_producto);
            $obj_productoG->setNit_proveedor($nit_proveedor);
            $obj_productoG->setNombre_producto($nombre_producto);
            $obj_productoG->setStock($stock);
            $obj_productoG->setUbicacion($ubicacion);
            $obj_productoG->setPrecio_producto($precio_producto);
            $obj_productoG->setPrecio_venta_producto($precio_venta_producto);
            $obj_productoG->setTipo_producto($tipo_producto);

            return DAO::RegistrarPR($obj_productoG);

        }

        #--------------------MODULO CLIENTES--------------------------------------------#


        
        public static function getcliente($cedula_cliente){

            $obj_cliente = new Cliente();
            $obj_cliente->setCedula_cliente($cedula_cliente);

            return DAO::getcliente($obj_cliente);

        }

        public static function RegistrarCliente($cedula_cliente, $nombre_cliente, $direccion_cliente,
        $telefono_cliente, $correo_cliente, $fecha_nac_cliente){

            $obj_cliente = new Cliente();
            
            $obj_cliente->setCedula_cliente($cedula_cliente);
            $obj_cliente->setNombre_cliente($nombre_cliente);
            $obj_cliente->setDireccion_cliente($direccion_cliente);
            $obj_cliente->setTelefono_cliente($telefono_cliente);
            $obj_cliente->setCorreo_cliente($correo_cliente);
            $obj_cliente->setFecha_nac_cliente($fecha_nac_cliente);

            return DAO::RegistrarCliente($obj_cliente);

        }


        #--------------------MODULO FACTURA--------------------------------------------#


        
        public static function getfactura($id_detalle_venta){

            $obj_factura = new Factura();
            $obj_factura->setId_detalle_venta($id_detalle_venta);

            return DAO::getfactura($obj_factura);

        }

        public static function RegistrarFactura($id_detalle_venta, $id_usuario, 
        $cedula_cliente, $correo_cliente, $telefono_cliente, $id_producto, 
        $nombre_producto, $total_compra, $cantidad_producto, $fecha_compra){

            $obj_factura = new Factura();
            
            $obj_factura->setId_detalle_venta($id_detalle_venta);
            $obj_factura->setId_usuario($id_usuario);
            $obj_factura->setCedula_cliente($cedula_cliente);
            $obj_factura->setTelefono_cliente($telefono_cliente);
            $obj_factura->setCorreo_cliente($correo_cliente);
            $obj_factura->setId_producto($id_producto);
            $obj_factura->setNombre_producto($nombre_producto);
            $obj_factura->setTotal_compra($total_compra);
            $obj_factura->setCantidad_producto($cantidad_producto);
            $obj_factura->setFecha_compra($fecha_compra);

            return DAO::RegistrarFactura($obj_factura);

        }


        
        #--------------------MODULO ORDENES: COMPRA--------------------------------------------#


        
        public static function getOrdenC($id_orden_compra){

            $obj_ordenCompra = new OrdenCompra();
            $obj_ordenCompra->setId_orden_compra($id_orden_compra);

            return DAO::getOrdenC($obj_ordenCompra);

        }

        public static function RegistrarOC($id_orden_compra, $nit_proveedor, $id_producto,
        $cantidad_producto, $valor_producto, $gasto_total, $fecha_orden){

            $obj_ordenCompra = new OrdenCompra();
            
            $obj_ordenCompra->setId_orden_compra($id_orden_compra);
            $obj_ordenCompra->setNit_proveedor($nit_proveedor);
            $obj_ordenCompra->setId_producto($id_producto);
            $obj_ordenCompra->setCantidad_producto($cantidad_producto);
            $obj_ordenCompra->setvalor_producto($valor_producto);
            $obj_ordenCompra->setGasto_total($gasto_total);
            $obj_ordenCompra->setFecha_orden($fecha_orden);

            return DAO::RegistrarOC($obj_ordenCompra);

        }





    }

?>
