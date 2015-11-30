<?php
include('..\\models\\funciones.php');
//recojemos la id de la tarea a borrar

if(isset($_GET['id']))
{//si pulsan sobre borrar tarea mostramos sus datos y pedimos confirmacion
   $iden = $_GET['id'];
   $tarea = getTarea($iden);
   include('..\\views\\borrar.php');//volvemos al formulario
}

if(isset($_POST['borrar']))
{
    borrar($iden);
    echo '<br><br><h1>Se ha borrado la tarea seleccionada</h1><br><br>';
    echo '<a href="mostrar_tarea.php">Pulsa para volver a ver la lista de tareas</a>';
}
if(isset($_POST['volver']))
{
    include('..\\controllers\\mostrar_tarea.php');
}



