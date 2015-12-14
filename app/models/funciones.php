<?php

require('classBBDD.php');

/**
 * Devuelve el estado de la tarea en modo descriptivo a traves del valor pasado como parametro
 * @param string $es es el estado de la tarea recojido en la base de datos
 * @return string $el la cadena con el estado correspondiente
 */
function getEstado($es) {
    if ($es == 'r' or $es == 'R') {
        $es = 'Realizado';
    }
    if ($es == 'p' or $es == 'P') {
        $es = 'Pendiente';
    }
    if ($es == 'c' or $es == 'c') {
        $es = 'Cancelado';
    }
    return $es;
}

/**
 * Devuelve el valor de un campo enviado por POST. Si no existe devuelve el valor por defecto
 * @param string $nombreCampo
 * @param mixed $valorPorDefecto
 * @return string
 */
function ValorPost($nombreCampo, $valorPorDefecto = '') {
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
function VerError($campo) {
    global $array_errores;
    if (isset($array_errores[$campo])) {
        echo '<div class="alert alert-danger">';
        echo '<span style="color:red">' . $array_errores[$campo] . '</span>';
        echo '</div>';
    }
}

/**
 * Devuelve un array de datos como html utilizado en la vista para crear un select de las provincias
 * para ello se apolla en la funcion getProvincias la cual devuelve el listado de provincias
 * @return string conviene el array de provincias en formato html select
 */
function CreaSelect() {

    $pro = array();
    $pro = getProvincias();
    $ids = 1;

    $html = '';

    $numCom = count($pro);

    $html.= '<label>';

    $html.= 'Selecciona Provincia: ';

    $html.= "<select class='form-control' name='provincia'";

    $html.= '<option></option>';

    for ($i = 1; $i < $numCom; $i++) {
        $html.= '<option  ';
        $html.= ' value="' . $ids . '"> ';
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
 * @return string contiene el listado de provincias
 */
function getProvincias() {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();

    /* Creamos una query sencilla */
    $sql = 'SELECT idprovincia as id, nombre as nom
                                            FROM `provincia`';

    /* Ejecutamos la query */
    $bd->Consulta($sql);

    // Creamos el array donde se guardarán las provincias
    $Provincias = Array();

    /* Realizamos un bucle para ir obteniendo los resultados */
    while ($reg = $bd->LeeRegistro()) {
        $Provincias[$reg['id']] = $reg['nom'];
    }
    return $Provincias;
}

/**
 * Devuelve el nombre de la provincia recibiendo como parametro el id de esta
 * @return string $devu contine el nombre de la provincia
 */
function getProvincia($idprov) {
    $bd = Db::getInstance();
    $prov = "select nombre from provincia where idprovincia =" . $idprov;
    $bd->Consulta($prov);

    while ($fila = $bd->LeeRegistro()) {
        $devu = $fila['nombre'];
    }
    return $devu;
}

/**
 * Devuelve un array con la lista de tareas
 * @param int $Ini contiene la posicion inicial donde realizar la consulta
 * @param int $Final contiene la posicion final donde terminar la consulta
 * @return string $tareas devuelve la lista de tareas según las posiciones señaladas
 */
function getTareas($Ini, $Final) {
    /* Creamos la instancia del objeto. Ya estamos conectados */
    $bd = Db::getInstance();
    /* Creamos una query sencilla */
    $sql = 'SELECT * FROM tarea LIMIT ' . $Ini . ', ' . $Final;
    //echo "<p>SQL: $sql</p>"; lo utilizamos para ver la consulta en la vista
    /* Ejecutamos la query */
    $rs = $bd->Consulta($sql);

    $tareas = array();
    while ($row = $bd->LeeRegistro($rs)) {
        $tareas[] = $row;
    }
    return $tareas;
}

/**
 * Nos devuelve los datos de un usuario en especifico para ello recoje la contraseña de este como parametro
 * @param string $dato contiene el nombre del usuario      
 * @return string $pass contiene la contraseña del usuario la cual es devuelta para compararla posteriormente
 */
function getUsuario($dato) {
    $bd = Db::getInstance($dato);
    $sql = 'SELECT password FROM usuario WHERE email = ' . $dato;
    $bd->Consulta($sql);
    $pass = $bd->LeeRegistro();
    return $pass['password'];
}

/**
 * Funcion que devuelve la lista de tareas que cumpla la condicion
 * @param string $campo tiene el campo por el cual filtrar
 * @param string $condicion contiene la condicion por la cual filtrar
 * @param string $dato este nos dice el dato introducido el cual comparar  
 */
function buscaTarea($campo, $condicion, $dato) {
    $bd = Db::getInstance();
    $sql = 'SELECT * FROM tarea WHERE ' . $campo . ' ' . $condicion . ' ' . $dato;

    $rs = $bd->Consulta($sql);
    $tareasfil = array();
    while ($row = $bd->LeeRegistro($rs)) {
        $tareasfil[] = $row;
    }
    return $tareasfil;
}

/**
 * Devolverá los datos de una sola tarea, la que cumpla la condición
 * @param string $id contiene la id de la tarea que sirve como filtro
 * @return string $tarea será el array con los campos de la tarea que devolvamos a la vista para recorrerla
 */

function getTarea($id) {
    $tarea = array();
    $bd = Db::getInstance();
    $sql = 'SELECT * from tarea where idtarea=' . $id;
    $bd->Consulta($sql);
    $tarea = $bd->LeeRegistro();
    return $tarea;
}

/**
 * Devuelve el numero registros de la consulta indicada
 * @return int contiene el numero total de tareas
 */
function NRegistros() {
    $bd = Db::getInstance();
    $query = "SELECT count(*) as total FROM tarea";
    $bd->Consulta($query);
    $res = $bd->LeeRegistro();
    return $res['total'];
}
/**
 * Devuelve la posicion inicial para utilizarla en la apginacion
 * @return int contiene el numero que sirve como referencia para el inicio de la paginacion
 */
function getPosicionInicial($pa, $max, $num) {
    if ($pa < 1 || $pa > $max) {
        $pa = 1;
    }
    $res = (($pa - 1) * $num);
    return $res;
}
/**
 * Inserta una tarea creando una instancia con la capa de abstrancion de bbdd
 */
function inserta($tabla, $campos) {
    $bd = Db::getInstance();
    $bd->Insertar($tabla, $campos);
}
/**
 * actualiza una tarea creando una instancia con la capa de abstrancion de bbdd
 */
function actualiza($camposTarea, $cond) {
    $bd = Db::getInstance();
    $bd->update('tarea', $camposTarea, $cond);
}
/**
 * borra una tarea creando una instancia con la capa de abstrancion de bbdd
 * @param int $iden contiene la id como referencia de la tarea a borrar
 */
function borrar($iden) {
    $bd = Db::getInstance();
    $bd->delete($iden);
}
function borrar_usuario($iden) {
    $bd = Db::getInstance();
    $bd->delete_usuario($iden);
}
/**
 * Convierte el campo email a formato mysql
 * @param string $eml contiene la cadena con el email formateado
 * @param string $con_eml contiene la cadena con la condicion formateada
 */
function condicionE($eml, $con_eml) {
    if ($con_eml == 'like') {
        $eml = "%" . $eml . "%";
    }
    return $eml;
}
/**
 * Convierte el campo operario a formato mysql
 * @param string $ope contiene la cadena con el email formateado
 * @param string $con_ope contiene la cadena con la condicion formateada
 */
function condicionO($ope, $con_ope) {
    if ($con_ope == 'like') {
        $ope = $ope . "%";
    }
    return $ope;
}

/**
 * Recoje las condiciones y si existe nos devuelve la cadena correspondiente
 * @param mixed campos y condicionesa formatear
 * @return string cadena con las condiciones y campos con formato mysql
 */

function CreaCondicion($eml, $con_eml, $ope, $con_ope, $fec, $con_fec) {
    $condiciones = array();
    $em = condicionE($eml, $con_eml);
    $op = condicionO($ope, $con_ope);

    if (!EMPTY($con_eml)) {
        $condiciones['eml'] = ' email ' . $con_eml . ' ' . "'" . $em . "'";
    }
    if (!EMPTY($con_ope)) {
        $condiciones['ope'] = ' operario ' . $con_ope . ' ' . "'" . $op . "'";
    }
    if (!EMPTY($con_fec)) {
        $condiciones['fec'] = ' fecha_creacion ' . $con_fec . ' ' . "'" . $fec . "'";
    }

    return implode(' AND ', $condiciones);
}

/**
 * La funcion recoje las condicones a buscar y devuelve la consulta
 * @param string $vari contiene la condicion 
 * @return string $tareasfiltro será el array devuelto con los resultados
 */
function filtramos($vari) {
    $tareasfiltro = array();

    $bd = Db::getInstance();
    $sql = 'SELECT * FROM tarea WHERE ' . $vari;

    $rs = $bd->Consulta($sql);

    while ($row = $bd->LeeRegistro($rs)) {
        $tareasfiltro[] = $row;
    }
    return $tareasfiltro;
}
function getTipo($id)
{
    $tarea = array();
    $bd = Db::getInstance();
    $sql = 'SELECT tipo from usuario where email=' . $id;
    $bd->Consulta($sql);
    $tarea = $bd->LeeRegistro();
    return $tarea;
}

function getUsuarios()
{
    $tareasfiltro = array();

    $bd = Db::getInstance();
    $sql = 'SELECT * FROM usuario';

    $rs = $bd->Consulta($sql);

    while ($row = $bd->LeeRegistro($rs)) {
        $tareasfiltro[] = $row;
    }
    return $tareasfiltro;
}
function actualiza_usuario($camposTarea, $cond) {
    $bd = Db::getInstance();
    $bd->update('usuario', $camposTarea, $cond);
}
