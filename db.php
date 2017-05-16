<?php
	try {
		
		$db = new PDO('mysql:host=******;dbname=*******;charset=utf8', '*********', '*********');
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
	
	function pdo_insert($table,$keyvals) {
		global $db;	
		$sql = sprintf("INSERT INTO %s ( `%s` ) %sVALUES ( :%s );",
			$table,
			implode("`, `", array_keys($keyvals)), 
			PHP_EOL, 
			implode(", :", array_keys($keyvals))
		);
				
		$stmt = $db->prepare($sql);
		
		foreach ($keyvals as $field => $value) {
			$stmt->bindValue(":$field", $value, PDO::PARAM_STR);
		}
		// echo "<pre>";
		// print_r($stmt);

		$stmt->execute();
		//$stmt->debugDumpParams();
		//return true;
	}
?>