<?php 	
require('classBBDD.php');

	function getEstado($es)
	{
		if($es == 'r' or $es == 'R')
		{
			$es= 'Realizado';
		}
		if($es == 'p' or $es == 'P')
		{
			$es= 'Pendiente';
		}
		if($es == 'c' or $es == 'c')
		{
			$es= 'Cancelado';
		}
		return $es;
	}

	/**
	 * Devuelve el valor de un campo enviado por POST. Si no existe devuelve el valor por defecto
	 * @param string $nombreCampo
	 * @param mixed $valorPorDefecto
	 * @return string
	 */
	function ValorPost($nombreCampo, $valorPorDefecto='')
	{
		if (isset($_POST[$nombreCampo]))
			return $_POST[$nombreCampo];
		else
			return $valorPorDefecto;
	}

	// La siguiente función se utilizará en la vista
	/**
	 * Muestra el texto de error si el campo es erroneo
	 * @param string $campo Nombre campo
	 */
	function VerError($campo)
	{
		global $array_errores;
		if (isset($array_errores[$campo]))
		{
			echo '<div class="alert alert-danger">';
			echo '<span style="color:red">'.$array_errores[$campo].'</span>';
			echo '</div>';
		}
	}

	function CreaSelect()
	{

		$pro = array();	
		$pro = getProvincias();	
		$ids = 1;

		$html = '';

		$numCom = count($pro);

		$html.=	'<label>';

		$html.= 'Selecciona Provincia: ';

		$html.= "<select class='form-control' name='provincia'";

		$html.= '<option></option>';
			
			for($i = 1;$i < $numCom; $i++)
			{	
				$html.= '<option  ';
				$html.= ' value="'.$ids.'"> ';
				$html.= $pro[$i];
				$html.= '</option>';
				$ids++;
			}	
		$html.= '</select>';
		$html.= '</label>';

		return $html;
	}

	/**
	 * Devuelve un array con los datos de las provincias
	 */
	function getProvincias()
	{
		/*Creamos la instancia del objeto. Ya estamos conectados*/
		$bd = Db::getInstance();
		
		/*Creamos una query sencilla*/
		$sql = 'SELECT idprovincia as id, nombre as nom
						FROM `provincia`';
		
		/*Ejecutamos la query*/
		$bd->Consulta($sql);
		
		// Creamos el array donde se guardarán las provincias
		$Provincias = Array();
		
		/*Realizamos un bucle para ir obteniendo los resultados*/
		while ($reg = $bd->LeeRegistro())
		{
			$Provincias[$reg['id']] = $reg['nom'];	 
		}
		return $Provincias;
	}

	/**
	 * Devuelve el nombre de la provincia recibiendo como parametro el id de esta
	 */
	function getProvincia($idprov)
	{
		$bd = Db::getInstance(); 
		$prov="select nombre from provincia where idprovincia =".$idprov;
		$bd->Consulta($prov);

		while($fila=$bd->LeeRegistro())
	    {              
	        $devu =  $fila['nombre'];
	    }       
	    return $devu;
	}

	function getTareas($Ini,$Final)
	{
	    /*Creamos la instancia del objeto. Ya estamos conectados*/
	    $bd=Db::getInstance();
	    /*Creamos una query sencilla*/
	    $sql='SELECT * FROM tarea LIMIT ' . $Ini . ', ' . $Final;
	    //echo "<p>SQL: $sql</p>"; lo utilizamos para ver la consulta en la vista
	    /*Ejecutamos la query*/
	    $rs=$bd->Consulta($sql);

	    $tareas = array();
		while ($row=$bd->LeeRegistro($rs))
		{
			$tareas[] = $row;
		}
	    return $tareas;
	}
	/**
	*Funcion que devuelve la lista de tareas que cumpla la condicion
	*/
	function buscaTarea($campo,$condicion,$dato)
	{
		$bd=Db::getInstance();
		$sql='SELECT * FROM tarea WHERE ' . $campo .' '. $condicion .' '. $dato;

		$rs=$bd->Consulta($sql);
		$tareasfil = array();
		while($row=$bd->LeeRegistro($rs))
		{
			$tareasfil[] = $row;
		}
		return $tareasfil;
	}

	/*
	*Devolverá los datos de una sola tarea, la que cumpla la condición
	*$tarea será el array que devolvamos a la vista para recorrerla
	*/
	function getTarea($id)
	{
		$tarea = array();
		$bd=Db::getInstance();
		$sql='SELECT * from tarea where idtarea='.$id;
		$bd->Consulta($sql);
		$tarea=$bd->LeeRegistro();
		return $tarea;
	}    
	/**
	 * Devuelve el numero registros de la consulta indicada
	 */
	function NRegistros()
	{
			$bd=Db::getInstance();
			$query ="SELECT count(*) as total FROM tarea";
			$bd->Consulta($query);
			$res=$bd->LeeRegistro();
			return $res['total'];
	}

	function getPosicionInicial($pa,$max,$num)
	{
        if ($pa<1 || $pa>$max)
            $pa=1;
        $res = (($pa-1)*$num);
        return $res;
	}

	function inserta($tabla,$campos)
	{
		$bd=Db::getInstance();
		$bd->Insertar($tabla,$campos);
	}

	function setTarea($camposTarea,$cond)
	{
		$bd=Db::getInstance();
		$res = $bd->update('tarea',$camposTarea,$cond);
		
		return $res;
	}

	function unSoloCampo($eml,$ope,$fec)
	{
        $tar = Array();
        //si solo se filtra por email
        if($eml != '' && $ope =='' && $fec == '') 
        {
            $condicion=$_POST['condicion_email'];
            if($condicion == 'like')
            {
                $eml = "'%".$eml."%'";
                $tar = buscaTarea('email',$condicion,$eml);  
            }
            else
            {            	$eml = "'".$eml."'";
           	    $tar = buscaTarea('email',$condicion,$eml);          }         
        } 
        //si se filtra solo por operario
        if($ope != '' && $eml =='' && $fec == '') 
        {
            $condicion=$_POST['condicion_operario'];
            if($condicion =='like')
            {
                $ope = "'".$ope."%'";
                $tar = buscaTarea('operario',$condicion,$ope);  
            }
            else{     $ope = "'".$ope."'";
            $tar = buscaTarea('operario',$condicion,$ope);          }       
        } 
        //si se filtra solo por fecha
        if($fec != '' && $ope =='' && $eml == '') 
        {
            $condicion=$_POST['condicion_creacion'];
            $fec = "'".$_POST['creacion']."'";
            
            $tar = buscaTarea('fecha_creacion',$condicion,$fec);  
        } 
        return $tar;
	}

	/*
	*Recoje las condiciones y si existe nos devuelve la cadena correspondiente
	*/
	function CreaCondicion($eml,$con_eml,$ope,$con_ope,$fec,$con_fec)
	{
		$condiciones = array();

		if(! EMPTY($con_eml))
		{
			$condiciones['eml'] = ' email '. $con_eml . ' '."'". $eml ."'";
		}
		if(! EMPTY($con_ope))
		{
			$condiciones['ope'] = ' operario '. $con_ope . ' '."'". $ope."'";
		}
		if(! EMPTY($con_fec))
		{
			$condiciones['fec'] = ' fecha_creacion '. $con_fec . ' '. $fec;
		}

		return  implode(' AND ', $condiciones);	
	}
	/**
	*$tareasfiltro será el array devuelto con los resultados
	*esta funcion crea el sql correspondiende y lo manda al modelo para obtener el resultado
	*/
	function tresCampos($eml,$con_ema,$ope,$con_ope,$fec,$con_fec)
	{
		$tareasfiltro = array();
		//le damos formato a la busqueda del operario
		$ope = "'".$ope."'";
		if($con_ema == 'like')
        {
            $eml = "'".$eml."%'";
        }
        else
        {
        	$eml="'".$eml."'";
        }

		$bd=Db::getInstance();
		$sql='SELECT * FROM tarea WHERE email '. $con_ema .' '. $eml .' AND operario '. $con_ope .' '. $ope .' AND fecha_creacion '. $con_fec .' '. $fec;

		$rs=$bd->Consulta($sql);
		
		while($row=$bd->LeeRegistro($rs))
		{
			$tareasfiltro[] = $row;
		}
		return $tareasfiltro;
	}

	function dosCampos($vari)
	{
		$tareasfiltro = array();

		$bd=Db::getInstance();
		$sql='SELECT * FROM tarea WHERE '.$vari;

		$rs=$bd->Consulta($sql);
		
		while($row=$bd->LeeRegistro($rs))
		{
			$tareasfiltro[] = $row;
		}
		return $tareasfiltro;
	}

	function numFiltro($lista)
	{
		$numero = 0;
		for ($i=0; $i <3 ; $i++) { 
			
			if($lista[$i] != '')
			{
				$numero++;
			}
		}
		return $numero;
	}
?>