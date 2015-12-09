<?php
include('..\\models\\funciones.php');
$tarea = array();
$t='';
$campos = array();
//si han pulsado sobre editar
if(isset($_GET['id']))
{//recojemos el id y recojemos sus datos
    $t = $_GET['id'];
    $tarea = getTarea($t);
    include('..\\views\\completar.php');
}
 
//si guardan la tarea
if(isset($_POST['completar']))
{
    
    $idcom = $_POST['idcompleta'];
    $condicion = 'idtarea = '.$idcom;
    $campos['estado'] = $_POST['estado'];
    $campos['anotaciones_posteriores'] = $_POST['anotaciones_posteriores']; 
    $campos['fecha_realizacion']=date("d/m/Y");
    actualiza($campos,$condicion);

    echo '<br><br><h1>Se ha completado la tarea con id '.$idcom.'</h1><br><br>';
    echo '<a href="mostrar_tarea.php">Pulsa para volver a ver la lista de tareas</a>';
}

 
     