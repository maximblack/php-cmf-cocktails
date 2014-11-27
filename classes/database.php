<?php

	class Database {
	
		private static $database = null;
		private $connection = null;
                
		private static $databaseHost = 'localhost';
		private static $databaseUser = 'root';
		private static $databasePassword = 'cocktails_password';
		private static $databaseName = 'cocktail';
		
		private function __construct($databaseHost = null, $databaseUser = null, $databasePassword = null, $databaseName = null) {
		
			$this->connect($databaseHost, $databaseUser, $databasePassword, $databaseName);
		
		}
		
		public function __destruct() {
		
			$this->disconnect();
		
		}
		
		public static function getInstance() {
		
			if(self::$database == null)
				self::$database = new Database();
				
			return self::$database;
		
		}
		
		protected function connect($databaseHost = null, $databaseUser = null, $databasePassword = null, $databaseName = null) {
		
			if($databaseHost == null) {
			
				$databaseHost = self::$databaseHost;
				$databaseUser = self::$databaseUser;
				$databasePassword = self::$databasePassword;
				$databaseName = self::$databaseName;
			
			}
		
			$this->connection = new Mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);
			
			return $this;
		
		}
		
		protected function selectDatabase($database) {
		
			$this->connection->select_db($database);
			
			return $this;
			
		}
		
		protected function query($query) {
		
			return $this->connection->query($query);
		
		}
		
		private function disconnect() {
		
			if($this->connection != null)
				$this->connection->close();
			
			return $this;
		
		}
                public function insert_id()
                {
                    return $this->connection->insert_id;
                }
		
	}
	
?>