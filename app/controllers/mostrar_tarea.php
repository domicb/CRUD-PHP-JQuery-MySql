<?php
    /*Aqui controlaremos la paginacion y pediremos la consulta al modelo*/
    include('..\\models\\funciones.php');

    define ('PROXPAG', 5);
    //Elementos de paginación

    if (isset($_GET['pag']))//si ya esta navegando dejamos la que está sino la primera
    {
        $pag=$_GET['pag'];
    }
    else
    {
        $pag=1;      
    }

    $maxPag=((int) (NRegistros())/PROXPAG)+1;//maximo de paginas según el numero de registros y la constante
    if ($pag<1 || $pag>$maxPag)
    {
        $pag=1;
    }

    $posIni=(($pag-1)*PROXPAG);

    $posIni = getPosicion($pag,$maxPag,PROXPAG);  

    $tareas = getTareas($posIni,PROXPAG); 

    include('..\\views\\mostrar.php');
     


?>