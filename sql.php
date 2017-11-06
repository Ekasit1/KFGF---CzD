<?php
class sql { // jjjjjjjjjjjjjjj
	private static $con;
	public function boot() {
		try {
			self::$con = new PDO("mysql:host=localhost".";dbname=".";charset=utf8", "root", "");
			// set the PDO error mode to exception
			self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return self::$con;
		} catch(PDOException $e) {
			return [false, "Connection failed: " . $e->getMessage()];
		}
	}
	public static function get($sql) {
		if($sql !== "") {
			try {
				self::boot();
				$q = self::$con->prepare($sql);
				$q->execute();
				return $q->fetchAll(PDO::FETCH_ASSOC);
			} catch(PDOException $e) {
				return [false, "Fel vid inhämntning från databasen: " . $e->getMessage()];
			}
		} else {
			return false;
		}
	}
	public static function set($sql) {
		if($sql !== "") {
			try {
				self::boot();
				$q = self::$con->prepare($sql);
				return $q->execute();
			} catch(PDOException $e) {
				return [false, "Fel vid skrivning till databasen: " . $e->getMessage()];
			}
		} else {
			return false;
		}
	}
	public static function lastId() {
		return self::$con->lastInsertId();
	}
}
sql::boot();
?>