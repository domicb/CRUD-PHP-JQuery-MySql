<?php
include('..\\models\\funciones.php');
$tarea = array();
$t='';
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
    $nuevo_estado = $_POST['estado'];
    $anotaciones = $_POST['anotaciones_posteriores'];   
    //actualiza();
}

 
     