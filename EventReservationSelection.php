<html>


<!-- STEP 1 of reserving a parking spot: Select the event. After this, proceed to date selection step. -->

<head>
  <title>Event Selection</title>
</head>
<body>


<form method="post" action="ParkingDaySelection.php">
  <label for="eventList">Select the event: </label>
  <select name="eventID" id="eventList">
    <?php

		// Connect to mysql
		$conn = new mysqli('localhost', 'root', 'mysql', 'PARKINGMASTER');
		$sql = "SELECT * FROM Event";
		$result = mysqli_query($conn, $sql);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$NAME = $row['Event_Name'];
			$EVENT_ID = $row['Event_id'];
			
			print("<option value='$EVENT_ID'>$NAME</option>");
		}
		
		mysqli_close($conn);
	?>
  </select>
  <input type="submit" value="Submit">
</form>


</body>
</html>