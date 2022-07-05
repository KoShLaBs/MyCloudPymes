<?php

class Conect{

    /**
     * conexion base de datos
     * 
     * @return PDO
     * 
     */

    public static function conectar(){
        try{

            $cn = new PDO("mysql:host=localhost;dbname=my_cloud_pymes","root", "");
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $cn;

        } catch (PDOException $ex){
            die($ex->getMessage());
        }
    }

}



?>