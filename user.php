<?php
	include_once('header.php');
	require_once('employee.class.php');
    require_once('db_connection.php');
    require_once('machine.class.php');

    // data base infos
    $host = 'localhost';
    $username = 'root';
    $password = '';

    //connexion to data base
    $db = new DB($host, $username, $password);
    $db->connect();

	//get all machine from db
	// list of machine
	$machines = array();

	//fetch data from db and create machine instante with each data
	$sql = "SELECT * FROM tblmachines";
    $result = $db->_conn->query($sql);
    $name = "Sandy";

    function user_ausleihen($conn, $surname){
        $typ = "ausliehe";
        $datum = date("y-m-d");
        $sql =$conn->prepare("SELECT Surname, Title, Description, Datum, Typ FROM tblausleihen INNER JOIN tblemployees ON tblausleihen.Employee_fk=tblemployees.EmployeeID INNER JOIN tblmachines ON tblausleihen.Machine_fk=tblmachines.MachineID WHERE Typ=? AND Surname=? AND Datum=?");
        $sql->execute([$typ, $surname, $datum]);
        $result = $sql->fetchAll();
        return $result;
    }
    ?>
    <div class="row">
        <div class="col-12 row">
        <p class="text-center"><h3 align="center">die von <?php echo $name ?> ausgeliehene Machinen</h3></p>
    <?php
    $machines = user_ausleihen($db->getConnexion(), $name);
    foreach($machines as $machine){
    ?>
            <div class="col-3">
                <div class="card" style="width: 18rem; margin: 5px; padding: 5px; background-color: rgb(158, 245, 155);">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $machine["Title"] ?></h4>
                        <p class="card-text"><?php echo $machine["Description"] ?></p>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>
        </div>
    </div>

<?php include_once ('footer.php') ?>