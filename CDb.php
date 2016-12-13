<?php
//clase para la conexion a la bd
abstract class DatabaseProvider
{
	#Guarda internamente el objeto de conexión
	protected $resource;
	#Se conecta según los datos especificados
	public abstract function connect($host, $user, $pass, $dbname);
	#Obtiene el número del error
	public abstract function getErrorNo();
	#Obtiene el texto del error
	public abstract function getError();
	#Envía una consulta
	public abstract function query($q);
	#Convierte en array la fila actual y mueve el cursor
	public abstract function fetchArray($resource);
	#Comprueba si está conectado
	public abstract function isConnected();
	#Escapa los parámetros para prevenir inyección
	public abstract function escape($var);
}


class MySqlProvider extends DatabaseProvider
{
	public function connect($host, $user, $pass, $dbname){
		$this->resource = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		return  $this->resource;
	}
	public function getErrorNo(){
		return mysqli_errno($this->resource);
	}
	public function getError(){
		return mysqli_error($this->resource);
	}
	public function query($q){
		return mysqli_query($this->resource,$q);
	}
	public function fetchArray($result){
		return mysqli_fetch_array($result,MYSQLI_ASSOC);
	}
	public function isConnected(){
		return !is_null($this->resource);
	}
	public function escape($var){
		return mysqli_real_escape_string($this->resource,$var);
	}
	
	
	public function cerrarConexion(){
	  mysqli_close($this->resource);
	}
	
	public function returnid()
	{
		return $this->resource->insert_id;
	}
	
	public function getInfo(){
		return mysqli_info($this->resource);
	}
	
}
class DatabaseLayer
{
	private $provider;
	private $params;
	private static $_con;
	private function __construct($provider){
		if(!class_exists($provider)){
			throw new Exception("El proveedor especificado no ha sido implentado o añadido.");
		}
		$this->provider = new $provider;
		$this->provider->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if(!$this->provider->isConnected()){
			/*Controlar error de conexion*/
		}
	}
	public static function getConnection($provider){
		if(self::$_con){
			return self::$_con;
		}
		else{
			$class = __CLASS__;
			self::$_con = new $class($provider);
			return self::$_con;
		}
	}
	private function replaceParams($coincidencias){
		$b=current($this->params);
		next($this->params); 
		return $b;
	}
	private function prepare($sql, $params){
		for($i=0;$i<sizeof($params); $i++){
			if(is_bool($params[$i])){
				$params[$i] = $params[$i]? 1:0;
			}
			elseif(is_double($params[$i]))
				$params[$i] = str_replace(',', '.', $params[$i]);
			elseif(is_numeric($params[$i]))
				$params[$i] = $this->provider->escape($params[$i]);
			elseif(is_null($params[$i]))
				$params[$i] = "NULL";
			else
				$params[$i] = "'".$this->provider->escape($params[$i])."'";
		}
		
		$this->params = $params;
		$q = preg_replace_callback("/(\?)/i", array($this,"replaceParams"), $sql);
		return $q;
	}
	private function sendQuery($q, $params){
		 
		$query = $this->prepare($q, $params);
		$result = $this->provider->query($query);
		if($this->provider->getErrorNo()){
			/*Controlar errores*/
			return $this->provider->getError();
		}
		return $result;
	}
	
	

	
	
	
	public function executeScalar($q, $params=null){
		$result = $this->sendQuery($q, $params);
		if(!is_null($result)){
			if(!is_object($result)){
				return $result;
			}
			else{
				$row = $this->provider->fetchArray($result);
				return $row[0];
			}
		}
		return null;
	}
	public function execute($q, $params=null){
		
		$result = $this->sendQuery($q, $params);
		if(is_object($result)){
			$arr = array();
			while($row = $this->provider->fetchArray($result)){
				$arr[] = $row;
			}
			return $arr;
		}
		return $this->provider->getError();//null		
	}
	
	public function executesp($q, $params=null){
		$this->provider->cerrarConexion();
		$this->provider->connect(DB_SERVER,DB_USER, DB_PASSWORD,DB_NAME);
		$result = $this->sendQuery($q, $params);
		if(is_object($result)){
			$arr = array();
			while($row = $this->provider->fetchArray($result)){
				$arr[] = $row;
			}
		    
			return $arr;
		}
		return $this->provider->getError();//null
		
	}

	
	public function returnid()
	{
		return $this->provider->returnid();
	}
	
	public function getInfo(){
		return mysqli_info($this->getInfo());
	}

}



//ejemplo de como instanciar la clase para la conexion
/*global $DB;
$DB = DatabaseLayer::getConnection("MySqlProvider");
$res = $DB->execute("select * from usuarios");
print_r($res);*/
?>

