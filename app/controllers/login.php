<?php
include('app/models/funciones.php');
if(isset($_POST['email']) && isset($_POST['password']))//si envian el formulario
{
  $ema = "'".$_POST['email']."'";
  $pass = $_POST['password'];
  
  $contrasena = getUsuario($ema);
  if($contrasena === $pass)
  {
      session_start();
      $_SESSION['email']='uno';
      $_SESSION['valores']='<p><b>'.$_POST['email'].date("H:i").'</b></p>';
      include('index.php');
  } 
}
else
{
    include('app/views/plantilla/login-panel.php');//volvemos al formulario
}
