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
			$this->dbCon = mysqli_connect(Config::get('mysqli/host'), Config::get('mysqli/user'), Config::get('mysqli/password'), Config::get('mysqli/db'));
			return $this->dbCon;
		}
    }









?>