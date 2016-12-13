<?php 
class CStaff {
	function __construct(){
		$this->setTable('staff');
	}

	function getStaffList(){
		global $DB;
		$query='CALL sp_stafflist();';
		return $DB->execute($query);
	}

}	
?>