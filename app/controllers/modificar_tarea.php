<?php

include('..\\models\\funciones.php');
$tarea = array();
$t='';
//si han pulsado sobre editar
if(isset($_GET['id']))
{//recojemos el id y recojemos sus datos
    $t = $_GET['id'];
    $tarea = getTarea($t);
    include('..\\views\\modificar.php');
}

if(isset($_POST['guardar']))
{
    //ceamos la condicion para la tarea 
   $condici = 'idtarea = '.$t;
   
 actualiza($tarea,$condici);
}
//llamamos a la funcion de la capa de abstraccion de bd update
//$db->update('tareas', array('nombre'=>'La nueva tarea'), 'id='.$id);

