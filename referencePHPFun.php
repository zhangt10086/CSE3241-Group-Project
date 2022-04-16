<?php
	function connect($username, $password, $database) {
		$conn = new mysqli("localhost",$username,$password,$database);
		
		if ($conn->connect_error) {
			die($conn->connect_error);
		}
		
		if ($conn === false) {
			die ("Error: Could not connect" . mysqli_connect_error());
		}
	}
	
?>
	<!-- HTML block to send a SQL query and results to another php file.  -->
	<form method="post" action ="fileToSendDataTo.php">
		<label for="postKey">Label text</label> //postKey is for $_POST[postKey] as $_POST is a assoc. array
		<select name="name" id="listName">
			<?php
			//connect($username, $password);
			$conn = new mysqli("localhost",$username,$password,$database);
			$sql = "SELECT * FROM table";
			$result = mysqli_query($conn, $sql); //Puts SQL query in $result
			
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$aVar = $row['aFieldName'];
				$bVar = $row['bFieldName'];
				$returnVal = $row['fieldValue'];
				
				print("<option value='$returnVal'>$aVar $bVar</option>");
				//Above line prints aVar and bVar together as an option.
				//Selecting that record with aVar and bVar returns the returnVal field of that record.
			}
			mysqli_close(); //Close connection
			?>
		</select>
		<input type="submit" value="Submit">
