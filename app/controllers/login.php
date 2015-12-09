<?php

include('app/models/funciones.php');
$array_errores = array();
$campo = array();
if (isset($_POST['email']) && isset($_POST['password'])) {//si envian el formulario
    $ema = "'" . $_POST['email'] . "'";
    $pass = $_POST['password'];

    $contrasena = getUsuario($ema);
    if ($contrasena == '' || $contrasena == 0) 
    {
        $campo['email']=$_POST['email'];
        $campo['password']=$_POST['password'];
        $array_errores['email'] = 'el email no corresponde con el de ningun usuario registrado';
        include('app/views/plantilla/login-panel.php');
    } 
    else
    {
        if ($contrasena === $pass) 
            {
            // SQL -> WHERE USERNAME='$username' AND PASSWORD='$password'
            // if(mysql_num_rows($query) == 1)
            session_start();
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['valores'] = '<p><b>' . $_POST['email'] . ' ' . date("H:i") . '</b></p>';
            include('index.php');
        } 
        else 
        {
            $array_errores['password'] = 'Contraseña incorrecta';
            include('app/views/plantilla/login-panel.php');
        }
    }
} 
else
    {
       include('app/views/plantilla/login-panel.php'); //volvemos al formulario
}
