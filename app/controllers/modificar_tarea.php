<?php

include('..\\models\\funciones.php');
$tarea = array();
$t = '';
$array_errores = array();

//si han pulsado sobre editar
if (isset($_GET['id'])) {//recojemos el id y recojemos sus datos
    $t = $_GET['id'];
    $tarea = getTarea($t);
    include('..\\views\\modificar.php');
} else {

    if (!$_POST) {
        include('../views/modificar.php'); //volvemos al formulario
    } else {
        //tenemos que filtrar los campos antes de mandarlos
        if (empty($_POST['descripcion'])) {
            $array_errores['vacio'] = 'Debes introducir algo en la descripcion';
        }
        if (empty($_POST['nombre']) || empty($_POST['apellidos'])) {
            $array_errores['vacio1'] = 'Nombre y appelidos son obligatorios';
        }
        if (empty($_POST['telefono']) || is_numeric($_POST['telefono']) == false) {
            $array_errores['telefono'] = 'Debes de introducir un telefono correcto';
        }
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === true) {
            $array_errores['email'] = 'Introduce un email correcto';
        }
        if (empty($_POST['cod_postal'])) {
            $array_errores['cod_postal'] = 'El codigo postal es obligatorio';
        } else {
            $codigo = $_POST['cod_postal'];
            if (strlen($codigo) > 5) {
                $array_errores['cod_postal'] = 'Introduce un codigo postal válido';
            }
        }
        if (empty($_POST['provincia'])) {
            $array_errores['provincia'] = 'Se debe seleccionar una provincia de la lista';
        }

        if (empty($array_errores)) {//sino hay errores en el formulario podemos enviarlos
            $campos = array();
            $campos['descripcion'] = $_POST['descripcion'];
            $campos['nombre'] = $_POST['nombre'];
            $campos['apellidos'] = $_POST['apellidos'];
            $campos['telefono'] = $_POST['telefono'];
            $campos['email'] = $_POST['email'];
            $campos['direccion'] = $_POST['direccion'];
            $campos['poblacion'] = $_POST['poblacion'];
            $campos['cod_postal'] = $_POST['cod_postal'];
            $campos['operario'] = $_POST['operario'];
            $campos['anotaciones_anteriores'] = $_POST['anotaciones_anteriores'];
            $campos['idprovincia'] = $_POST['provincia'];
    

            $t = $_POST['identi'];
            $condici = 'idtarea = ' . $t;
            actualiza($campos, $condici);
            echo '<br><br><h1>Se ha modificado la tarea con id ' . $t . '</h1><br><br>';
            echo '<a href="mostrar_tarea.php">Pulsa para volver a ver la lista de tareas</a>';
        } else {
            include('../views/modificar_errores.php'); //volvemos al formulario mostrando los errores
        }
    }
}
       

