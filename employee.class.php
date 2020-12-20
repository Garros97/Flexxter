<?php
	class Employee
	{
		/**
		 *Employee's unique id
		 *@var int $id
		*/
		public $id;

		/**
		 *Employee's surname
		 *@var string $surname
		*/
		public $surname;

		/**
		 *Hashed als salted password
		 *@var string $password
		*/
		public $password;

		function __construct($id, $surname, $password)
		{
			$this->_id = $id;
			$this->_surname = $surname;
			$this->password = $password;
		}

		public function getId(){
			return $this->_id;
		}

		public function getSurname(){
			return $this->_surname;
		}

		public function setId($id){
			$this->_id = $id;
		}

		public function setSurnam($surname){
			$this->_surname = $surname;
		}
	}
?>