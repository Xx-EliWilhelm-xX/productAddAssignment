<html>
<head>
	<title>Display All Items</title>
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/dbView.css">
</head>
<body>
	<?php
		$dbhost = 'fdb1029.awardspace.net';
                $dbuser = '4240987_epwilhe';
                $dbpass = 'Kipper9000';
                $dbname = '4240987_epwilhe';
                
                $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

		if($conn === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                }

		// sql to create table


		$sql = "SELECT ProductID, ProductName, UnitPrice, CurrentAmount, ReorderAmount FROM Inventory";
		$result = mysqli_query($conn, $sql);



		if (mysqli_num_rows($result) > 0) {

			$display_string = "<table>";
			$display_string .= "<tr>";
			$display_string .= "<th>Product ID</th>";
			$display_string .= "<th>Product Name</th>";
			$display_string .= "<th>Unit Price</th>";
			$display_string .= "<th>Current Amount</th>";
			$display_string .= "<th>Reorder Amount</th>";
			$display_string .= "</tr>";

			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			$display_string .= "<tr>";
			$display_string .= "<td>".$row["ProductID"]."</td>";
			$display_string .= "<td>".$row["ProductName"]."</td>";
			$display_string .= "<td>".$row["UnitPrice"]."</td>";
			$display_string .= "<td>".$row["CurrentAmount"]."</td>";
			$display_string .= "<td>".$row["ReorderAmount"]."</td>";
			$display_string .= "</tr>";
			}
			$display_string .= "</table>";
			echo $display_string;
		} else {
			echo "0 results";
		}

		mysqli_close($conn);
	?>
</body>
</html>