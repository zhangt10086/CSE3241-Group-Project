<html>


<!-- STEP 2 of reserving a parking spot: Select the date. After this, proceed to garage selection step. -->

<head>
  <title>Date Selection</title>
</head>
<body>


<form method="post" action="GarageReservationSelection.php">
  <label for="dateList">Select the date: </label>
  <select name="eventDay" id="dateList">
    <?php
		
		//Grab previous post data
		$EVENT_ID = $_POST["eventID"];
		
		//Hidden field to pass eventID data to next page

		// Connect to mysql
		$conn = new mysqli('localhost', 'root', 'mysql', 'PARKINGMASTER');
		$sql = "SELECT * FROM Event_Days NATURAL JOIN Event WHERE Event_id = '$EVENT_ID' ORDER BY Day";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$DAY = $row['Day'];
			
			print("<option value='$DAY'>$DAY</option>");
		}
		
		mysqli_close($conn);
	?>
  </select>
  <!--Hidden field to pass eventID to next page-->
  <input type="hidden" name="eventID" value= "<?php echo $EVENT_ID;?>"/>
  <input type="submit" value="Submit">
</form>


</body>
</html>