<?php
    /*Aqui controlaremos la paginacion y pediremos la consulta al modelo*/
    include('..\\models\\funciones.php');

    define ('PROXPAG', 5);
    //Elementos de paginación
    $tarea = array();

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

    $posIni = getPosicionInicial($pag,$maxPag,PROXPAG); 

    //si se busca filtrando datos NOS FALTA FILTRAR LOS CAMPOS
    if(isset($_POST['busca']))
    {
        $eml = $_POST['ema'];
        $ope = $_POST['operario'];
        $fec = $_POST['creacion'];

        if($eml != '' && $ope != '' && $fec != '')//si se filtra por los tres campos
        {
            $con_eml = $_POST['condicion_email'];
            $con_fec = $_POST['condicion_creacion'];
            $con_ope = $_POST['condicion_operario'];
            //mandamos los campos con sus correspondientes condiciones
            $tarea = tresCampos($eml,$con_eml,$ope,$con_ope,$fec,$con_fec);
        }
        else
        {   //primero averiguamos por cuantos campos se filtra
            $list = array();
            $list[0] = $eml;
            $list[1] = $ope;
            $list[2] = $fec;

            $num = numFiltro($list);
            if($num == 2)
            {
                $con_eml = $_POST['condicion_email'];
                $con_fec = $_POST['condicion_creacion'];
                $con_ope = $_POST['condicion_operario'];
                $consult = CreaCondicion($eml,$con_eml,$ope,$con_ope,$fec,$con_fec);

                $tarea = dosCampos($consult);
            }
            else// BUSCA POR UN SOLO CAMPO
                {    $tarea = unSoloCampo($eml,$ope,$fec);      }              
        }              
    }
    else
    {
        $tarea = getTareas($posIni,PROXPAG); 
    }  

    include('..\\views\\mostrar.php');

?>