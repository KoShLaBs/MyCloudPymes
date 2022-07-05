<?php

/**
 * funcion que sirve para validar y limpiar un campo
 * 
 * @param $campo    tiene que ser campo de tipo post
 * 
 * @return string
 */


function validar($campo){

    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo); 

    return $campo;

}


?>