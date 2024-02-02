<?php
header("Content-Type: application/json");
// datos de la base de datos
$servidor="localhost";
$usuario="root";
$password="";
$basededatos="app";

// conexion a la base de datos
$conexion = new mysqli($servidor, $usuario, $password, $basededatos);

if($conexion->connect_error){
    print_r($conexion->connect_error);
}
$accion = $_POST["accion"];

//recepciona las tareas
if($accion == "agregar"){
    echo "se se agrego la tarea: ".$_POST["tarea"];
    $tarea=$_POST["tarea"];
    $sql="INSERT INTO tareas (id,tarea,completado) VALUES(NULL, '$tarea', '0');";
    $conexion->query($sql);
}

if($accion == "leer"){
    // mostrar las tareas de la base datos
    $sql = "SELECT * FROM tareas";
    $resultado = $conexion->query($sql); // aqui se corre la consulta a la base de datos para traer las tareas que se tienen en esta

    if($resultado->num_rows>0){ // Si eñ numero de renglones es mayor que 0 quiere decir que si existen registros
        $tareas = array();
        while($fila = $resultado->fetch_assoc()){ // aqui se guardan los registros por cada columna de la tabla gracias al metodo fetch_assoc()
            $tareas[] = $fila;
        }
        echo json_encode(array('success'=>true, 'datos'=>$tareas));
    }
}



?>