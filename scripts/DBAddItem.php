<?php
        header("refresh:3; url=../Inventory.html" );
            
	if(isset($_GET['pid'])) {
		$pid = ($_GET['pid']);
	}

	if(isset($_GET ['amount'])) {
		$amount = ($_GET['amount']);
	}


	//Provide your server and database information below
	$dbhost = 'fdb1029.awardspace.net';
	$dbuser = '4240987_epwilhe';
	$dbpass = 'Kipper9000';
	$dbname = '4240987_epwilhe';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if(! $conn ) {
		die('Could not connect: ' . mysqli_error());
	}

	$sql = "UPDATE `Inventory` 
        SET `CurrentAmount`= `CurrentAmount` + " . (int)$amount . " 
        WHERE `ProductID` = '$pid'";

	if (mysqli_query($conn, $sql)) {
	    echo "Items ordered";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>