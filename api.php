<?php

if($_POST){
    echo "Se ha enviado algo con metodo POST:".$_POST['tarea'];
}
if($_GET){
    echo "Se ha enviado algo con metodo GET:".$_GET['tarea'];
}

?>