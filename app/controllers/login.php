<?php
if($_POST['password'])
{
    session_start();
    $_SESSION['email']= '123';
    include('../../index.php');
}
