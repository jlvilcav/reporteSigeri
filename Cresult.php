<?php 
abstract class Cresult{
	private $table='';
	private $arResult=array();
	private $query='';
	private $fields=array();
	private $values=array();
	private $params='';
	function setTable($table){
		$this->table=$table;
	}
	function clearAll(){
		$this->arResult=array();
		$this->query='';
		$this->fields=array();
		$this->values=array();
		$this->params='';
	}
	function Add($params=array()){
		$this->clearAll();
		global $DB;
		$this->fields='('.implode(',',array_keys($params)).')';
		$this->values=array_values($params);
		for($i=0;$i<count($this->values);$i++){
			$this->params.='?,';
		}
		$this->params='('.substr($this->params,0,strlen($this->params)-1).')';
		$this->query='INSERT INTO '.$this->table.' '.$this->fields.' VALUES '.$this->params;
		$DB->execute($this->query,$this->values);
	}
	function Delete($id){
		$this->clearAll();
		global $DB;
		if(is_array($id)){
			for($i=0;$i<count($id);$i++){
				$this->params.='?,';
			}
			$this->params='('.substr($this->params,0,strlen($this->params)-1).')';	
			$this->query='DELETE FROM '.$this->table.' WHERE id IN '.$this->params;
			$DB->execute($this->query,$id);
		}else{
			$this->query='DELETE FROM '.$this->table.' WHERE id=?';
			$DB->execute($this->query,array($id));
		}
		//echo $this->query;
	}
	function Update($params,$id){
		$this->clearAll();
		global $DB;
		$this->fields=array_keys($params);
		foreach($this->fields as $k=>$v){
			$this->fields[$k]=$v.'=?';
		}
		$this->fields=implode(',',$this->fields);
		$this->values=array_values($params);
		$this->values[]=$id;
		$this->query='UPDATE '.$this->table.' SET '.$this->fields.' WHERE id=?';
		/*echo '<pre>';
		echo $this->query;
		print_r($this->values);
		echo '<pre>';*/
		$DB->execute($this->query,$this->values);
	}
	function GetList($params=array(),$select='*',$limit1=false,$limitc=1){
		$this->clearAll();
		global $DB;
		if(count($params)>0){
			$this->fields=array_keys($params);
			foreach($this->fields as $k=>$v){
				$this->fields[$k]=$v.'=?';
			}
			$this->fields=implode(' AND ',$this->fields);
			$this->values=array_values($params);
		}
		$where='';
		if(count($params)>0){
			$where=' WHERE '.$this->fields;
		}
		$this->query='SELECT '.$select.' FROM '.$this->table.$where;
		if($limit1==true){
			$this->query=$this->query.' LIMIT '.$limitc;	
		}
		if(count($params)>0){
			$this->arResult=$DB->execute($this->query,$this->values);
		}else{
			$this->arResult=$DB->execute($this->query);
		}
		/*echo '<script>console.log("'.$this->query.''.$this->values[0].'")</script>';*/
		return $this->arResult;
	}
}
/*$array=array('nombre'=>'Renzo','apellido'=>'Carpio','usuario'=>'admin','password'=>'123456');
$arraydelete=array(1,2,3,4,5);
$obj=new CUser();
$obj->Update($array,5);
$obj->Delete($arraydelete);*/
?>