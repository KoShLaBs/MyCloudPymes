<?php

include 'conect.php';
include_once('../php/usuario.php');
include_once('../php/proveedorG.php');
include_once('../php/productoG.php');
include_once('../php/ordenCompra.php');
include_once('../php/cliente.php');
include_once('../php/factura.php');

class Dao extends Conect{
    
    protected static $cnx;

    public static function getConect(){
        self::$cnx = Conect::conectar();
    }

    private static function desconectar(){
        self::$cnx = null;
    }

    

        /**
         * Metodo que sirve para validar login 
         * 
         * @param object $usuario
         * 
         * @return boolean
         * 
         * 
         */
        
    public static function login($usuario){

        $query ="SELECT * FROM usuario WHERE usuario = :usuario AND password_usuario = :password_usuario";

        self::getConect();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password_usuario", $usuario->getPassword_usuario());

        $resultado->execute();

        if($resultado->rowCount() > 0 ){
            $filas = $resultado->fetch();

            if($filas["usuario"] == $usuario->getUsuario()
            && $filas["password_usuario"] == $usuario->getPassword_usuario()){
                return true;
            }
        }

        return "false";

    }

         /**
         * Metodo que sirve para un usuario 
         * 
         * @param object $usuario
         * 
         * @return 
         * 
         */
        
        public static function getusuario($usuario){

            $query ="SELECT id_usuario, usuario, cedula_usuario, nombre_usuario, direccion_usuario,
            telefono_usuario, correo_usuario, fecha_nac_usuario, cargo_usuario
            FROM usuario WHERE usuario = :usuario AND password_usuario = :password_usuario";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->bindValue(":usuario", $usuario->getUsuario());
            $resultado->bindValue(":password_usuario", $usuario->getPassword_usuario());
    
            $resultado->execute();
    
            $filas = $resultado->fetch();
    
            $usuario = new Usuario();
            $usuario->setId_usuario($filas["id_usuario"]);
            $usuario->setCedula_usuario($filas["cedula_usuario"]);
            $usuario->setUsuario($filas["usuario"]);
            $usuario->setNombre_usuario($filas["nombre_usuario"]);
            $usuario->setDireccion_usuario($filas["direccion_usuario"]);
            $usuario->setTelefono_usuario($filas["telefono_usuario"]);
            $usuario->setCorreo_usuario($filas["correo_usuario"]);
            $usuario->setFecha_nac_usuario($filas["fecha_nac_usuario"]);
            $usuario->setCargo_usuario($filas["cargo_usuario"]);
            
            return $usuario;

        }


       /**
         * Metodo que sirve para Registrar un usuario 
         * 
         * @param object 
         * 
         * @return 
         * 
         */
        
        public static function registroV($usuario){

            $query ="INSERT INTO usuario(
                usuario, password_usuario, cedula_usuario, nombre_usuario,
                direccion_usuario, telefono_usuario, correo_usuario, fecha_nac_usuario,
                cargo_usuario) VALUES (:usuario, :password_usuario, 
                :cedula_usuario, :nombre_usuario, :direccion_usuario, :telefono_usuario, 
                :correo_usuario, :fecha_nac_usuario, :cargo_usuario)";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->bindValue(":usuario", $usuario->getUsuario());
            $resultado->bindValue(":password_usuario", $usuario->getPassword_usuario());
            $resultado->bindValue(":cedula_usuario", $usuario->getCedula_usuario());
            $resultado->bindValue(":nombre_usuario", $usuario->getNombre_usuario());
            $resultado->bindValue(":direccion_usuario", $usuario->getDireccion_usuario());
            $resultado->bindValue(":telefono_usuario", $usuario->getTelefono_usuario());
            $resultado->bindValue(":correo_usuario", $usuario->getCorreo_usuario());
            $resultado->bindValue(":fecha_nac_usuario", $usuario->getFecha_nac_usuario());
            $resultado->bindValue(":cargo_usuario", $usuario->getCargo_usuario());    
    
                if($resultado->execute()){
                    return true;
                }
            
    
            return false;
    
        }




       /**
         * Metodo que sirve para Actualizar un usuario 
         * 
         * @param object 
         * 
         * @return 
         * 
         */
        
        public static function actualizarV($usuario){

            $query = "UPDATE usuario SET password_usuario=:password_usuario,
            cedula_usuario=:cedula_usuario, nombre_usuario=:nombre_usuario,
            direccion_usuario=:direccion_usuario, telefono_usuario=:telefono_usuario, 
            correo_usuario=:correo_usuario, fecha_nac_usuario=:fecha_nac_usuario 
            WHERE id_usuario=:id_usuario";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->bindValue(":id_usuario", $usuario->getCargo_usuario());    
            $resultado->bindValue(":password_usuario", $usuario->getPassword_usuario());
            $resultado->bindValue(":cedula_usuario", $usuario->getCedula_usuario());
            $resultado->bindValue(":nombre_usuario", $usuario->getNombre_usuario());
            $resultado->bindValue(":direccion_usuario", $usuario->getDireccion_usuario());
            $resultado->bindValue(":telefono_usuario", $usuario->getTelefono_usuario());
            $resultado->bindValue(":correo_usuario", $usuario->getCorreo_usuario());
            $resultado->bindValue(":fecha_nac_usuario", $usuario->getFecha_nac_usuario());
            
    
                if($resultado->execute()){
                    return true;
                }
            
    
            return false;
    
        }


        
        #--------------------------------------MODULO PROVEEDORES----------------------------------#

        
         /**
         * Metodo que sirve para un proveedor
         * 
         * @param object $proveedorG
         * 
         * @return 
         * 
         */
        
        public static function getproveedorG($proveedorG){

            $query ="SELECT nit_proveedor, nombre_proveedor, direccion_proveedor, telefono_proveedor,
            correo_proveedor FROM proveedor";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->execute();
    
            $filas = $resultado->fetch();
    
            $proveedorG = new ProveedorG();

            $proveedorG->setNit_proveedor($filas["nit_proveedor"]);
            $proveedorG->setNombre_proveedor($filas["nombre_proveedor"]);
            $proveedorG->setDireccion_proveedor($filas["direccion_proveedor"]);
            $proveedorG->setTelefono_proveedor($filas["telefono_proveedor"]);
            $proveedorG->setCorreo_proveedor($filas["correo_proveedor"]);

            return $proveedorG;

        }


        
       /**
         * Metodo que sirve para Registrar un proveedor
         * 
         * @param object 
         * 
         * @return 
         * 
         */
        
        public static function registroP($proveedorG){

            $query ="INSERT INTO proveedor(nit_proveedor, nombre_proveedor, direccion_proveedor, telefono_proveedor,
                correo_proveedor) VALUES (:nit_proveedor, :nombre_proveedor, 
                :direccion_proveedor, :telefono_proveedor, :correo_proveedor)";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->bindValue(":nit_proveedor", $proveedorG->getNit_proveedor(), PDO::PARAM_INT);
            $resultado->bindValue(":nombre_proveedor", $proveedorG->getNombre_proveedor(), PDO::PARAM_STR);
            $resultado->bindValue(":direccion_proveedor", $proveedorG->getDireccion_proveedor(), PDO::PARAM_STR);
            $resultado->bindValue(":telefono_proveedor", $proveedorG->getTelefono_proveedor(), PDO::PARAM_INT);
            $resultado->bindValue(":correo_proveedor", $proveedorG->getCorreo_proveedor(), PDO::PARAM_STR);
            
                if($resultado->execute()){
                    return true;
                }{
            
    
            return false;
    
        }

    }



        #--------------------------------------MODULO PRODUCTOS----------------------------------#

        
         /**
         * Metodo que sirve para un producto
         * 
         * @param object $productoG
         * 
         * @return 
         * 
         */
        
        public static function getproductosG($productoG){

            $query ="SELECT id_producto, nit_proveedor, nombre_producto,
            stock, ubicacion, precio_producto, precio_venta_producto, 
            tipo_producto FROM producto";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->execute();
    
            $filas = $resultado->fetch();
    
            $productoG = new ProductoG();

            $productoG->setId_producto($filas["id_producto"]);
            $productoG->setNit_proveedor($filas["nit_proveedor"]);
            $productoG->setNombre_producto($filas["nombre_producto"]);
            $productoG->setStock($filas["stock"]);
            $productoG->setUbicacion($filas["ubicacion"]);
            $productoG->setPrecio_producto($filas["precio_producto"]);
            $productoG->setPrecio_venta_producto($filas["precio_venta_producto"]);
            $productoG->setTipo_producto($filas["tipo_producto"]);

            return $productoG;

        }


        
       /**
         * Metodo que sirve para Registrar un producto
         * 
         * @param object 
         * 
         * @return 
         * 
         */
        
        public static function RegistrarPR($productoG){

            $query ="INSERT INTO producto(id_producto, nit_proveedor, nombre_producto,
            stock, ubicacion, precio_producto, precio_venta_producto, 
            tipo_producto) VALUES (:id_producto, :nit_proveedor, :nombre_producto,
            :stock, :ubicacion, :precio_producto, :precio_venta_producto, 
            :tipo_producto)";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->bindValue(":id_producto", $productoG->getId_producto());
            $resultado->bindValue(":nit_proveedor", $productoG->getNit_proveedor());
            $resultado->bindValue(":nombre_producto", $productoG->getNombre_producto());
            $resultado->bindValue(":stock", $productoG->getStock());
            $resultado->bindValue(":ubicacion", $productoG->getUbicacion());
            $resultado->bindValue(":precio_producto", $productoG->getPrecio_producto());
            $resultado->bindValue(":precio_venta_producto", $productoG->getPrecio_venta_producto());
            $resultado->bindValue(":tipo_producto", $productoG->getTipo_producto());

                if($resultado->execute()){
                    return true;
                }{
            
    
            return false;
    
        }

    }


    
        #--------------------------------------MODULO CLIENTES----------------------------------#

        
         /**
         * Metodo que sirve para un cliente
         * 
         * @param object $cliente
         * 
         * @return 
         * 
         */
        
        public static function getcliente($cliente){

            $query ="SELECT cedula_cliente, nombre_cliente, direccion_cliente,
            telefono_cliente, correo_cliente, fecha_nac_cliente
            FROM cliente";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->execute();
    
            $filas = $resultado->fetch();
    
            $cliente = new Cliente();

            $cliente->setCedula_cliente($filas["cedula_cliente"]);
            $cliente->setNombre_cliente($filas["nombre_cliente"]);
            $cliente->setDireccion_cliente($filas["direccion_cliente"]);
            $cliente->setTelefono_cliente($filas["telefono_cliente"]);
            $cliente->setCorreo_cliente($filas["correo_cliente"]);
            $cliente->setFecha_nac_cliente($filas["fecha_nac_cliente"]);

            return $cliente;

        }


        
       /**
         * Metodo que sirve para Registrar un cliente
         * 
         * @param object 
         * 
         * @return 
         * 
         */
        
        public static function RegistrarCliente($cliente){

            $query ="INSERT INTO cliente(cedula_cliente, nombre_cliente, direccion_cliente,
            telefono_cliente, correo_cliente, fecha_nac_cliente) 
            VALUES (:cedula_cliente, :nombre_cliente, :direccion_cliente,
            :telefono_cliente, :correo_cliente, :fecha_nac_cliente)";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->bindValue(":cedula_cliente", $cliente->getCedula_cliente());
            $resultado->bindValue(":nombre_cliente", $cliente->getNombre_cliente());
            $resultado->bindValue(":direccion_cliente", $cliente->getDireccion_cliente());
            $resultado->bindValue(":telefono_cliente", $cliente->getTelefono_cliente());
            $resultado->bindValue(":correo_cliente", $cliente->getCorreo_cliente());
            $resultado->bindValue(":fecha_nac_cliente", $cliente->getFecha_nac_cliente());
            
                if($resultado->execute()){
                    return true;
                }{
            
    
            return false;
    
        }

    }


    
        #--------------------------------------MODULO FACTURA----------------------------------#

        
         /**
         * Metodo que sirve para una factura
         * 
         * @param object $factura
         * 
         * @return 
         * 
         */
        
        public static function getfactura($factura){

            $query ="SELECT id_detalle_venta, id_usuario, cedula_cliente, 
            correo_cliente, telefono_cliente, id_producto, nombre_producto,
            total_compra, cantidad_producto, fecha_compra
            FROM detalle_venta";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->execute();
    
            $filas = $resultado->fetch();
    
            $factura = new Factura();

            $factura->setId_detalle_venta($filas["id_detalle_venta"]);
            $factura->setId_usuario($filas["id_usuario"]);
            $factura->setCedula_cliente($filas["cedula_cliente"]);
            $factura->setTelefono_cliente($filas["telefono_cliente"]);
            $factura->setCorreo_cliente($filas["correo_cliente"]);
            $factura->setId_producto($filas["id_producto"]);
            $factura->setNombre_producto($filas["nombre_producto"]);
            $factura->setTotal_compra($filas["total_compra"]);
            $factura->setCantidad_producto($filas["cantidad_producto"]);
            $factura->setFecha_compra($filas["fecha_compra"]);

            return $factura;

        }


        
       /**
         * Metodo que sirve para Registrar una factura
         * 
         * @param object 
         * 
         * @return 
         * 
         */
        
        public static function RegistrarFactura($factura){

            $query ="INSERT INTO detalle_venta(id_detalle_venta, id_usuario, 
            cedula_cliente, correo_cliente, telefono_cliente, id_producto, 
            nombre_producto, total_compra, cantidad_producto, fecha_compra) 
            VALUES (:id_detalle_venta, :id_usuario, :cedula_cliente, 
            :correo_cliente, :telefono_cliente, :id_producto, :nombre_producto,
            :total_compra, :cantidad_producto, now())";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->bindValue(":id_detalle_venta", $factura->getId_detalle_venta());
            $resultado->bindValue(":id_usuario", $factura->getId_usuario());
            $resultado->bindValue(":cedula_cliente", $factura->getCedula_cliente());
            $resultado->bindValue(":correo_cliente", $factura->getCorreo_cliente());
            $resultado->bindValue(":telefono_cliente", $factura->getTelefono_cliente());
            $resultado->bindValue(":id_producto", $factura->getId_producto());
            $resultado->bindValue(":nombre_producto", $factura->getNombre_producto());
            $resultado->bindValue(":total_compra", $factura->getTotal_compra());
            $resultado->bindValue(":cantidad_producto", $factura->getCantidad_producto());
            
            
                if($resultado->execute()){
                    return true;
                }{
            
    
            return false;
    
        }

    }



        #--------------------------------------MODULO ORDENES: COMPRA----------------------------------#

        
         /**
         * Metodo que sirve para una orden de compra
         * 
         * @param object $ordenCompra
         * 
         * @return 
         * 
         */
        
        public static function getOrdenC($ordenCompra){

            $query ="SELECT id_orden_compra, nit_proveedor, id_producto,
            cantidad_producto, valor_producto, gasto_total, fecha_orden
            FROM orden_compra";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->execute();
    
            $filas = $resultado->fetch();
    
            $ordenCompra = new OrdenCompra();

            $ordenCompra->setId_orden_compra($filas["id_orden_compra"]);
            $ordenCompra->setNit_proveedor($filas["nit_proveedor"]);
            $ordenCompra->setId_producto($filas["id_producto"]);
            $ordenCompra->setCantidad_producto($filas["cantidad_producto"]);
            $ordenCompra->setValor_producto($filas["valor_producto"]);
            $ordenCompra->setGasto_total($filas["gasto_total"]);
            $ordenCompra->setFecha_orden($filas["fecha_orden"]);

            return $ordenCompra;

        }


        
       /**
         * Metodo que sirve para Registrar una orden de compra
         * 
         * @param object 
         * 
         * @return 
         * 
         */
        
        public static function RegistrarOC($ordenCompra){

            $query ="INSERT INTO orden_compra(id_orden_compra, nit_proveedor, id_producto,
            cantidad_producto, valor_producto, gasto_total, fecha_orden) 
            VALUES (:id_orden_compra, :nit_proveedor, :id_producto,
            :cantidad_producto, valor_producto, :gasto_total, :fecha_orden)";
    
            self::getConect();
    
            $resultado = self::$cnx->prepare($query);
    
            $resultado->bindValue(":id_orden_compra", $ordenCompra->getId_orden_compra());
            $resultado->bindValue(":nit_proveedor", $ordenCompra->getNit_proveedor());
            $resultado->bindValue(":id_producto", $ordenCompra->getId_producto());
            $resultado->bindValue(":cantidad_producto", $ordenCompra->getCantidad_producto());
            $resultado->bindValue(":valor_producto", $ordenCompra->getValor_producto());
            $resultado->bindValue(":gasto_total", $ordenCompra->getGasto_total());
            $resultado->bindValue(":fecha_orden", $ordenCompra->getFecha_orden());

                if($resultado->execute()){
                    return true;
                }{
            
    
            return false;
    
        }

    }


    }

?>
