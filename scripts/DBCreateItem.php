<?php
	if(isset($_GET['pid'])) {
		$pid = ($_GET['pid']);
	}

	if(isset($_GET['pname'])) {
		$pname = ($_GET['pname']);
  	}

	if(isset($_GET['uprice'])) {
		$uprice = ($_GET['uprice']);
	}

	if(isset($_GET ['camount'])) {
		$camount = ($_GET[camount]);
	}

	   if(isset($_GET ['ramount'])) {
		$ramount = ($_GET[ramount]);
	}


	//Provide your server and database information below
	$dbhost = 'fdb1029.awardspace.net';
	$dbuser = '4240987_epwilhe';
	$dbpass = 'Kipper9000';
	$dbname = 'Inventory';
	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if(! $conn ) {
		die('Could not connect: ' . mysqli_error());
	}

	echo 'Connected successfully';

	// sql to create table

	$sql = "INSERT INTO My_ProductInfo (ProductName, UnitPrice, CurrentAmount, ReorderAmount)
	VALUES ('$pname', $uprice, $camount, $ramount)";

	if (mysqli_query($conn, $sql)) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>