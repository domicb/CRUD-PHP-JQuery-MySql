<?php
//define('APPCONFIG', __DIR__.'\\..\\app\\config.php');
// Datos de configuración.
include_once 'conex.php';

/* Clase encargada de gestionar las conexiones a la base de datos */
Class Db {

	private $link;
	private $result;
	private $regActual;
	private static $_instance;

	/*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
	private function __construct(){
		
		$this->Conectar($GLOBALS['db_conf']);//le pasamos la base de datos
	}

	/*Evitamos el clonaje del objeto. Patrón Singleton*/
	private function __clone(){ }

	/*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
	public static function getInstance(){
		if (!(self::$_instance instanceof self)){
			self::$_instance=new self();
		}
		return self::$_instance;
	}

	/*Realiza la conexión a la base de datos.*/
	private function Conectar($conf)
	{
		if (! is_array($conf))
		{
			echo "<p>Faltan parámetros de configuración</p>";
			var_dump($conf);
			// Puede que no se requiera ser tan 'expeditivos' y que lanzar una excepción sea más versatil
			exit();			
		}
		$this-> link =new mysqli($conf['servidor'], $conf['usuario'], $conf['password']);

		/* check connection */
		if (! $this->link ) {
			printf("Error de conexión: %s\n", mysqli_connect_error());
			// Puede que no se requiera ser tan 'expeditivos' y que lanzar una excepción sea más versatil
			exit();
		}
		
		$this->link->select_db($conf['base_datos']);
		$this->link->query("SET NAMES 'utf8'");
	}
	
	/**
	 * Ejecuta una consulta SQL y devuelve el resultado de esta
	 * @param string $sql
	 * @return mixed
	 */
	public function Consulta($sql)
	{
           //echo "<pre>Consulta: $sql</pre>"; 
            $this->result=$this->link->query($sql);
            if (! $this->result ) {
                    $this->ShowError();
            }
            return $this->result;
	}

	public function ShowError()
	{
		echo "<p>Error: ".$this->link->error."</p>";
		die();
	}
	
	public function Insertar($tabla, $registro)
        {
            $values=array();
            $campos=array();
            foreach($registro as $campo=>$valor)
            {
                    $values[]='"'.addslashes($valor).'"';
                    $campos[]='`'.$campo.'`';
            }		
            $sql = "INSERT INTO `$tabla`(".implode(',', $campos).") 
                             VALUES (".implode(',', $values)."); ";
            //echo "<p>SQL: $sql</p>";
            return $this->link->query($sql);
	}
        
        public function delete($registro)
        {
            $sql = "DELETE FROM TAREA WHERE idtarea = ".$registro;           
            return $this->link->query($sql);
        }
	
	public function update($tabla, $registro, $cond)
	{
            $valores = array();
            foreach($registro as $campo=>$valor)
            {
                $valores[]= $campo.' ="'.addslashes($valor).'"';
            }
            $sql="update $tabla SET ".implode(',', $valores)."where ".$cond;
            $this->consulta($sql);
	}

	/**
	 * Devuelve el siguiente registro del result set devuelto por una consulta.
	 * 
	 * @param mixed $result
	 * @return array | NULL
	 */
	public function LeeRegistro($result=NULL)
	{
            if (! $result)
            {
                if (! $this->result)
                {
                        return NULL;
                }
                $result=$this->result;
            }
            $this->regActual=$result->fetch_array();
            return $this->regActual;
	}

	/**
	 * Devuelve el último registro leido
	 */
	public function RegistroActual()
	{
		return $this->regActual;
	}
	

	/**
	 * Devuelve el valor del último campo autonumérico insertado
	 * @return int
	 */
	public function LastID()
	{
		return $this->link->insert_id;
	}

	/**
	 * Devuelve el primer registro que cumple la condición indicada
	 * @param string $tabla
	 * @param string $condicion
	 * @param string $campos
	 * @return array|NULL
	 */
	public function LeeUnRegistro($campo, $condicion, $dato)
	{
            $sql="select tarea from $tabla where $campo $condicion $dato";
            //echo '<pre>SQL: $sql</pre>';
            $rs=$this->link->query($sql);
            if($rs)
            {
                    return $rs->fetch_array();
            }
            else
            {
                    return NULL;
            }
	}
}
?>