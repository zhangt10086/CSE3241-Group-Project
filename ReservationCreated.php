<html>
	<body>
	
	<!-- STEP 4 of reserving a parking spot: Processing the data. After this step, we're done! -->
		<p>Reservation created!</p>
		
		<?php
		
			// Connect to mysql
			$conn = new mysqli('localhost', 'root', 'mysql', 'PARKINGMASTER');
			
			// Get relevant data
			$GARAGE_ID = $_POST["garageID"];
			$EVENT_ID = $_POST["eventID"];
			$EVENT_DAY = $_POST["eventDay"];
			$CUSTOMER_ID = $_SESSION["customerID"]; //Use session variable for multiple pages
			
			//For testing purposes, remove in final product
			$CUSTOMER_ID = 99999999;
			
			$sql = "INSERT INTO Reservation VALUES ('$GARAGE_ID', '$EVENT_ID', '$CUSTOMER_ID', '$EVENT_DAY', false)";
			
			if (mysqli_query($conn, $sql)) {
				//mysqli_commit($sql);
				echo "Reservation created!";
			} else {
				echo "Error, reservation attempt failed";
			}
			
			
			mysqli_close($conn);
			
			
			//TO-DO: Add hyperlink to redirect user back to home page
		?>
	</body>
</html>