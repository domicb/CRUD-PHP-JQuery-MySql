<?php
include('..\\models\\funciones.php');
$usuarios = array();
$usuarios = getUsuarios();
include('..\\views\\plantilla\\usuarios.php');
