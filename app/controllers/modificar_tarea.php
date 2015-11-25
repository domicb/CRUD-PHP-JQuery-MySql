<?php

include('..\\models\\funciones.php');
$tarea = array();

//si han pulsado sobre editar
if(isset($_GET['id']))
{//recojemos el id y recojemos sus datos
    $t = $_GET['id'];
    $tarea = getTarea($t);
    //tendremos que acerlo en otro controlador para guardar la tarea <<<------------
}


//llamamos a la funcion de la capa de abstraccion de bd update
//$db->update('tareas', array('nombre'=>'La nueva tarea'), 'id='.$id);
include('..\\views\\modificar.php');
?>