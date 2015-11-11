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
function CreaSelect(){

	$pro = array();	
	$pro = getProvincias();	
	$ids = 1;

	$html = '';

	$numCom = count($pro);

	$html.=	'<label>';

	$html.= 'Selecciona Provincia: ';

	$html.= "<select class='form-control' name='provincia'";

	$html.= '<option></option>';
		
		for($i = 1;$i < $numCom; $i++){
		
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
function muestraProvincia($idprov)
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

function mostrarTareas($Ini,$Final)
{
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
    /*Creamos una query sencilla*/
    $sql='SELECT * FROM tarea LIMIT ' . $Ini . ', ' . $Final;
    //echo "<p>SQL: $sql</p>"; lo utilizamos para ver la consulta en la vista
    /*Ejecutamos la query*/
    $rs=$bd->Consulta($sql);
    
    /*$row=$bd->LeeRegistro() <-- While */
	 while ($row=$bd->LeeRegistro($rs))
	 { 		
	 		echo '<tr>';
			echo '<td>'.$row['descripcion'].'</td>';
            echo '<td>'.$row['operario'].'</td>';
            echo '<td>'.$row['telefono'].'</td>'; 
            //sacamos el id de la provincia el cual nos sirve para preguntar por su nombre                         
            echo '<td>'.muestraProvincia($row['idprovincia']).'</td>';                                                         
                
			echo '<td>'.$row['direccion'].'</td>';
            echo '<td>'.$row['poblacion'].'</td>';
            echo '<td>'.getEstado($row['estado']).'</td>';
            echo '<td>'.$row['fecha_creacion'].'</td>';
            echo '<td>'.$row['fecha_realizacion'].'</td>';

			echo '<td><a href="modificar.php?id='.$row['idtarea'].'"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;<a href="eliminar.php?id='.$row['idtarea'].'"><span class="glyphicon glyphicon-remove"></span></a></td>';
			echo '<tr>';
	} 
}

	function mostrarProvincias($Ini,$Final)
	{
		/*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
    /*Creamos una query sencilla*/
    $sql='SELECT * FROM provincia LIMIT ' . $Ini . ', ' . $Final;
    echo "<p>SQL: $sql</p>";
    /*Ejecutamos la query*/
    $bd->Consulta($sql);
	 while ($row=$bd->LeeRegistro())
	 { 		echo '<tr>';
			echo '<td>'.$row['nombre'].'</td>';
            echo '<td>'.$row['idprovincia'].'</td>';
            echo '</tr>';
	 } 
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

	function getPosicion($pa,$max,$num)
	{
        if ($pa<1 || $pa>$max)
            $pa=1;
        $res = (($pa-1)*$num);
        return $res;
	}

	function inserta($tabla,$campos)
	{
		$db=Db::getInstance();
		$db->Insertar($tabla,$campos);
	}
?>