<html>
<head>
	<title>Display Query Result</title>
	<link rel="stylesheet" href="../css/default.css">
	<link rel="stylesheet" href="../css/dbView.css">
</head>
<body>
	<ul>
		<li><a href="../Inventory.html">Home</a></li>
		<li><a href="../DBAdd.html">Add Items</a></li>
		<li><a href="../DBView.html">View Items</a></li>
	</ul>

	<?php

		$dbhost = 'fdb1029.awardspace.net';
		$dbuser = '4240987_epwilhe';
		$dbpass = 'Kipper9000';
		$dbname = 'Inventory';
		$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

		if(! $conn ) {
			die('Could not connect: ' . mysqli_error());
		}

		echo 'Connected successfully'."<br>";

		// sql to create table


		$sql = "SELECT ProductID, ProductName, UnitPrice, CurrentAmount, ReorderAmount FROM Inventory";
		$result = mysqli_query($conn, $sql);



		if (mysqli_num_rows($result) > 0) {

			$display_string = "<table>";
			$display_string .= "<tr>";
			$display_string .= "<th>Product Id</th>";
			$display_string .= "<th>Product Name</th>";
			$display_string .= "<th>Unit Price</th>";
			$display_string .= "<th>Current Amount</th>";
			$display_string .= "<th>Reorder Amount</th>";
			$display_string .= "</tr>";

			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
			$display_string .= "<tr>";
			$display_string .= "<td>".$row["ProductId"]."</td>";
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