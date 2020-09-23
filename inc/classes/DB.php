<?php
/*exit statement gives ablank page with a msg*/
//exit("test");
//must be adefine variable
//_CONFIG_ is initially defined in login and register and index and the config file loads the db
// If there is no constant defined called __CONFIG__, do not load this file  (for )
if(!defined('__CONFIG__')) {
	exit('You do not have a config file  20');
}
//Singelton db class
class DB {
  //protected : cant be called fromoutside the class (only accessable for this class and inherited classes)
  //static ; can be called with ::self
	protected static $con;

  //only called by this class
  //the constructor
	private function __construct() {

		try {
      //try and coonect with the db
      self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=3308;dbname=login_course', 'root', '' );
      //pdo instead of mysqli to connect with the mysql
			self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );
      //IF SOMETHING WENT WRONG
		} catch (PDOException $e) {
			echo "Could not connect to database."; exit;
		}

	}

  //punlic :can be used outside its class or object
  //static : called with ::
	public static function getConnection() {

		if (!self::$con) {
      //make adb connection
			new DB();
		}
    //return that connection
		return self::$con;
	}
}

?>
