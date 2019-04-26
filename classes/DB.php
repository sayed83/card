<?php
class DB {
		public static $_instance = null;
        public $dbCon;
 
        function __construct(){
            $this->dbCon = $this->connect();
        }
 
        function __destruct(){
                mysqli_close($this->dbCon);
        }
		
		public static function g(){
			if(!isset(self::$_instance)){
				self::$_instance = new DB();
			
			}
			return self::$_instance;
		}
		public function connect(){
			$this->dbCon = new mysqli(config::get('mysqli/host'), config::get('mysqli/user'), config::get('mysqli/password'), config::get('mysqli/db'));
			return $this->dbCon;
		}
    }









?>