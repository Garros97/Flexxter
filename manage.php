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

	//fetch datat from db and create machine instante with eacht data
	$sql = "SELECT * FROM tblmachines";
	$result = $db->_conn->query($sql);

    //if ($result->num_rows > 0) {
        while($row = $result->fetch()) {
            //create an Instance of the lass Machine with data from the database
            $machine = new Machine($row["MachineID"], $row["Title"], $row["Description"], $row["Status"]);

            //add the machine to our array
            array_push($machines, $machine);
        }
        //array_push($a,"blue","yellow");
    //}else{
    //    echo "there is not machines in the data base";
    //}
?>

<div class="row">
	<div class="col-12 row">
		<p class="text-center"><h3 align="center">Liste auf Machinen</h3></p>
		<div class="col-6">
            <div class="col-12 row">
                <p class="text-center"><h3 align="center">verfügbare Machinen</h3></p>
                <?php
                    // loop over all machine
                    foreach($machines as $machine){
                        if($machine->getStatus()){
                ?>
                            <div class="col-md-6">
                                <div class="card" style="width: 18rem; margin: 5px; padding: 5px; background-color: rgb(158, 245, 155);">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $machine->_title ?></h4>
                                        <p class="card-text"><?php echo $machine->_description ?></p>
                                        <form action="manage.php" method="post">
                                            <input type="submit" class="btn btn-primary" name="<?php echo $machine->_title ?>" value="Ausleihen" />
                                        </form>
                                        <?php
                                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$machine->_title]))
                                            {
                                                $employee = new Employee(1, "sandy", "");
                                                $machine->checkout($employee, $db->getConnexion());
                                                header("Location: manage.php");
                                                exit;
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>

        <div class="col-6">
            <div class="col-12 row">
                <p class="text-center"><h3 align="center">ausgeliehene Machinen</h3></p>

                <?php
                    // loop over all machine
                    foreach($machines as $machine){
                        if(!$machine->getStatus()){
                ?>
                            <div class="col-6">
                                <div class="card" style="width: 18rem; margin: 5px; padding: 5px; background-color: rgb(250, 213, 192);">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $machine->_title ?></h4>
                                        <p class="card-text"><?php echo $machine->_description ?></p>
                                        <form action="manage.php" method="post">
                                            <input type="submit" class="btn btn-primary" name="<?php echo $machine->_title ?>" value="Rueckgabe" />
                                        </form>
                                        <?php
                                            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST[$machine->_title]))
                                            {
                                                $employee = new Employee(1, "sandy", "");
                                                $machine->back_to_warehouse($employee, $db->getConnexion());
                                                header("Location: manage.php");
                                                exit;
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                ?>
            </div>
		</div>
	</div>
</div>

<?php include_once ('footer.php') ?>