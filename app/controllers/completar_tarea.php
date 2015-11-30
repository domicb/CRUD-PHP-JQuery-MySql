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
 else   
 {
      include('..\\views\\completar.php');//volvemos al formulario
 }