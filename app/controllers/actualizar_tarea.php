    <?php
    include('..\\models\\funciones.php');
    $tarea = array();
    
    if(isset($_POST['guardar']))
    {//le pasamos el array con los datos y su id
        $tarea = setTarea($tarea,$t);
    }
    include('..\\views\\modificar.php');
    ?>