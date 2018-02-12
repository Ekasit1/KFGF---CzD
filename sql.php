<?php
class sql {
	private static $con;   //conection som är privat, statisk alltid där
	public function sql() { // en construkter som körs direkt när man skapar classen
		try {
			self::$con = new PDO(
			"mysql:host=localhost;dbname=kfgf;charset=utf8", "root", "");  	//self är nyckelord till klassen sql klassen , con med koppling , 
																					//root=username inget lösenord som default, dbname= databasename
																						//PDO är ny koppling till databasen 
																							// set the PDO error mode to exception
			self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  				// ändar errormode
			return self::$con;																	
		} catch(PDOException $e) {        														//ifall resten funkar inte så körs detta
			echo "Connection failed: " . $e->getMessage(); 										//då kommer detta felmeddelandet
		}
	}
	public static function get($sql) {
		if($sql !== "") {
			try {
				$q = self::$con->prepare($sql);
				$q->execute();
				return $q->fetchAll(PDO::FETCH_ASSOC);
			} catch(PDOException $e) {
				echo "Fel vid inhämntning från databasen: " . $e->getMessage();
			}
		} else {
			return false;
		}
	}
	public static function set($sql) {
		if($sql !== "") {
			try {
				$q = self::$con->prepare($sql);
				return $q->execute();
			} catch(PDOException $e) {
				echo "Fel vid skrivning till databasen: " . $e->getMessage();
			}
		} else {
			return false;
		}
	}
	public static function lastId() {
		return self::$con->lastInsertId();
	}
}
?>