<?php
	class DB
	{
		/**
		 *DB's host
		 *@var string $host
		*/
		private $host;

		/**
		 *DB's username
		 *@var string $username
		*/
        private $username;

        /**
		 *DB's password
		 *@var string $password
		*/
		private $password;

		public $conn;

		function __construct($host , $username, $password)
		{
			$this->_host = $host;
            $this->_username = $username;
            $this->_password = $password;
        }

        public function connect() : void{
			try{
				$this->_conn = new PDO("mysql:host=$this->_host;dbname=flexxter", $this->_username, $this->_password);
				$this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//echo 'succesfull connection';
			}
			catch(PDOException $e){
				echo "Error connection : " . $e->getMessage();
			}
		}

		public function getConnexion(){
			return $this->_conn;
		}
	}
 ?>