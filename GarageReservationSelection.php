<html>
<head>
  <title>Garage Selection</title>
</head>
<body>

<!-- STEP 3 of reserving a parking spot: Select the garage. After this, proceed to data processing step. -->

<form method="post" action="ReservationCreated.php">
  <label for="garageList">Select the garage: </label>
  <select name="garageID" id="garageList">
    <?php
	  //Get post variables
	  $EVENT_ID = $_POST["eventID"];
	  $EVENT_DAY = $_POST["eventDay"];
	 
	  
      // Connect to mysql
      $conn = new mysqli('localhost', 'root', 'mysql', 'PARKINGMASTER');
      $sql = "SELECT * FROM Garage NATURAL JOIN Venue_Dist NATURAL JOIN Event_Days NATURAL JOIN Event WHERE Event_id = '$EVENT_ID' AND Day = Cast('$EVENT_DAY' as date) ORDER BY Venue_Dist";
      $result = mysqli_query($conn, $sql);
	  
	  // FOR DEBUGGING
	  if($result->num_rows <= 0) {
		  echo "Error, no rows found!";
	  } else {
		  echo "Number of rows: $result->num_rows";
	  }
	  
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $GARAGE_ID = $row['Garage_id'];
		$GARAGENAME = $row['Garage_Name'];
        $VENUE_DIST = $row['Venue_Dist'];
		$FEE = $row['Fee'];
	
		
		//Quickly run query to check number of reservations for specific garage
		$sql = "SELECT * FROM Reservation WHERE Garage_id = '$GARAGE_ID' AND Day = Cast('$EVENT_DAY' as date) AND NOT is_Cancelled";
		$resvResult = mysqli_query($conn, $sql);
		$NUM_RESERVED = mysqli_num_rows($resvResult); //Number of garage spaces reserved
		
		
		$sql = "SELECT numSpace FROM Garage WHERE Garage_id = '$GARAGE_ID'";
		$numResult = mysqli_query($conn, $sql);
		$garageRow = mysqli_fetch_array($numResult, MYSQLI_ASSOC);
		$NUM_TOTAL = $garageRow['numSpace']; //Max capacity of garage
		
		
		//Print if garage has available spaces
		If($NUM_RESERVED < $NUM_TOTAL) {
			print("<option value='$GARAGE_ID'>Garage: $GARAGENAME, Venue Distance: $VENUE_DIST, Fee: $FEE</option>");
		}
	
      }
      mysqli_close($conn);
    ?>
  </select>
  <!--Hidden field to pass eventID to next page-->
  <input type="hidden" name="eventID" value= "<?php echo $EVENT_ID;?>"/>
  <input type="hidden" name="eventDay" value= "<?php echo $EVENT_DAY;?>"/>
  <input type="submit" value="Submit">
</form>


</body>
</html>