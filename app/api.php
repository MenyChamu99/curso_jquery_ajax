<?php

// datos de la base de datos
$servidor="localhost";
$usuario="root";
$password="";
$basededatos="app";

// conexion a la base de datos
$conexion = new mysqli($servidor, $usuario, $password, $basededatos);

if(!$conexion->connect_error){
    echo "Conexión establecida";
}else{
    print_r($conexion->connect_error);
}

if($_POST){
    echo "se se agrego la tarea: ".$_POST["tarea"];
}

?>