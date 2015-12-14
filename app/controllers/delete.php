<?php
include('../models/funciones.php');
$campo = array();

if (isset($_POST)) 
    {//si envian el formulario
    if ($_POST['email'] == '') 
        {
        $array_errores['campos_vacios'] = 'Introduce un email';
        include('../views/plantilla/delete-panel.php');
    } else 
        {       
        $ema = "'" . $_POST['email'] . "'";
        //comprobamos si existe
        $existe = getUsuario($ema);
        
        if($existe !='')
            {              
                borrar_usuario($ema);
                echo '<a href="mostrar_usuarios.php">Pulsa para ver la lista de usuarios</a>';
        
            }
            else{$array_errores['no_existe'] = 'El email introducido no corresponde con ninguno registrado';
             include('../views/plantilla/delete-panel.php');}
    }
} 
else  
{
    include('../views/plantilla/delete-panel.php'); //volvemos al formulario
}
