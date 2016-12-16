<?php 


class CStaff {
	function __construct(){
		$this->setTable('staff');
	}

	function getStaffList(){
		global $DB;
		$query='CALL sp_stafflist();';
		return $DB->execute($query);

		$query = mysql_query("select * from ost_staff");


		$result = mysql_num_rows($$query);

		echo($result);


	}

}	
?>