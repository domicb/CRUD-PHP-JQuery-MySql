<?php

//NECESITAMOS RECOJER EL ID DE LA TAREA LA CUAL MODIFICAR PARA REALIZAR EL UPDATE
//llamamos a la funcion de la capa de abstraccion de bd update
$db->update('tareas', array('nombre'=>'La nueva tarea'), 'id='.$id);

?>