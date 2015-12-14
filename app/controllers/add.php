<?php
include('../models/funciones.php');
$array_errores = array();
$campo = array();
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['tipo']) )
    {//si envian el formulario
    $ema = "'" . $_POST['email'] . "'";
    $pass = $_POST['password'];
    
        $campo['email']=$_POST['email'];
        $campo['password']=$_POST['password'];      
        $campo['tipo']=$_POST['tipo'];
        
        if($_POST['email']=='' || $_POST['password']=='')
        {
            $array_errores['campos_vacios'] = 'Debe de introducir email y contraseña';      
            include('app/views/plantilla/add-panel.php');
        }
        else
        {
            inserta('usuario', $campo);
            echo '<a href="mostrar_usuarios.php">Pulsa para ver la lista de usuarios</a>';
        }
} 
else
{
       include('../views/plantilla/add-panel.php'); //volvemos al formulario
}