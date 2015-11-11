<?php
include_once ('..\\models\\funciones.php');

$array_errores = array();

if(! $_POST)//si no se ha enviado nada o es la primera vez
{
	include('../views/nueva.php');//volvemos al formulario
}
else 
{
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
	if (empty($_POST['estado'])) {
		$array_errores['estado'] = 'Se debe seleccionar un estado';
	}
	if (empty($_POST['provincia'])) {
		$array_errores['provincia'] = 'Se debe seleccionar una provincia de la lista';
	}
	if(empty($_POST['fecha_creacion']))
	{
		$array_errores['fecha_creacion']= 'Se debe introducir un fecha';
	}
	
	if($_POST['fecha_creacion'] < date("Y-m-d"))
	{
		$array_errores['fecha_creacion']= 'La fecha de creacion debe ser igual o posterior al dia de hoy';
	}

	if (empty($array_errores))//sino hay errores en el formulario podemos enviarlos
	{
		$campos=array();
		$campos['descripcion']=$_POST['descripcion'];
		$campos['nombre']=$_POST['nombre'];
		$campos['apellidos']=$_POST['apellidos'];
		$campos['telefono']=$_POST['telefono'];
		$campos['email']=$_POST['email'];
		$campos['direccion']=$_POST['direccion'];
		$campos['poblacion']=$_POST['poblacion'];
		$campos['cod_postal']=$_POST['cod_postal'];
		$campos['estado']=$_POST['estado'];
		$campos['fecha_creacion']=$_POST['fecha_creacion'];
		$campos['operario']=$_POST['operario'];
		$campos['fecha_realizacion']='';
		$campos['anotaciones_anteriores']=$_POST['anotaciones_anteriores'];
		$campos['anotaciones_posteriores']=null;
		$campos['idprovincia']=$_POST['provincia'];

		inserta('tarea',$campos);
		echo 'Se ha insertado una nueva tarea satisfactoriamente';
	}
	else
	{
		include('../views/nueva.php');//volvemos al formulario
	}
}

?>