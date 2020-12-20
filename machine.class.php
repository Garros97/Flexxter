<?php
	require_once('employee.class.php');

    class Machine
	{
		/**
		 *Machine's unique id
		 *@var int $id
		*/
		private $id;

		/**
		 *Machine's title
		 *@var string $title
		*/
        private $title;

        /**
		 *Machine's status
		 *@var string $status
		*/
		private $status;

		/**
		 *Machine's Description
		 *@var string $description
		*/
        private $description;

		function __construct($id , $title, $description, $status)
		{
			$this->_id = $id;
			$this->_title = $title;
			$this->_description = $description;
            $this->_status = $status;
		}

		public function getId(){
			return $this->_id;
		}

		public function setId($id){
			$this->_id = $id;
		}

		public function getTitle(){
			return $this->_title;
		}

		public function getStatus(){
			return $this->_status;
		}

		public function getDescription(){
			return $this->_description;
		}

		public function setTitle($title){
			$this->_title = $title;
		}

		public function setStatus($status){
			$this->_status = $status;
		}

		public function setDescription($description){
			$this->_description = $description;
		}
		/**
		 * assigns the machine to the given employee (checks the machine out)
		 * @param Employee  $employee the employee who wants to check out the machine
		 */
        function checkout(Employee $employee, PDO $conn) : void{
			$requete = "UPDATE tblmachines  set `Status`=? WHERE `MachineID`=?";
			$statement = $conn->prepare($requete);
			$statement->execute([!$this->_status, $this->getID()]);


			$sql = $conn->prepare("INSERT INTO tblausleihen (Datum, Typ, Employee_fk, Machine_fk ) VALUES (:Datum, :Typ, :Employee_fk, :Machine_fk)");
			$sql->bindParam(':Datum', $datum);
			$sql->bindParam(':Typ', $typ);
			$sql->bindParam(':Employee_fk', $Employee_fk);
			$sql->bindParam(':Machine_fk', $Machine_fk);

			$datum = date("y-m-d");
			$typ = "ausliehe";
			$Employee_fk = $employee->getId();
			$Machine_fk = $this->getId();

			$sql->execute();
        }
		/**
		 * Indicates that no employee has takenthe machine with them
		 * and that the employee put the machine back to the warehouse
		 */
        function back_to_warehouse($employee, $conn): void{
			$requete = "UPDATE tblmachines  set `Status`=? WHERE `MachineID`=?";
			$statement = $conn->prepare($requete);
			$statement->execute([!$this->_status, $this->getID()]);

			$sql = $conn->prepare("INSERT INTO tblausleihen (Datum, Typ, Employee_fk, Machine_fk ) VALUES (:Datum, :Typ, :Employee_fk, :Machine_fk)");
			$sql->bindParam(':Datum', $datum);
			$sql->bindParam(':Typ', $typ);
			$sql->bindParam(':Employee_fk', $Employee_fk);
			$sql->bindParam(':Machine_fk', $Machine_fk);

			$datum = date("y-m-d");
			$typ = "rueckgabe";
			$Employee_fk = $employee->getId();
			$Machine_fk = $this->getId();

			$sql->execute();
        }
	}
?>