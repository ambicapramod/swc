<?php    
  include 'db.php';
 session_start();  
?>
<html>
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
<meta charset = "UTF-8">
<link rel = "stylesheet"
   type = "text/css"
   href = "event_request.css" />
</head>
<body>
<ul>
  <li><a href="request_page.php">Home</a></li>
  <li><a href="event_request.php">Event Request</a></li>
   <li><a href="request_status_1.php">Request Status</a></li>
  
   <li style="float:right"><a href="#">WELCOME  <?php if(isset($_SESSION['user_id']))  
 {
  $user_id=$_SESSION['user_id'];
 echo "".$user_id;
 } else {
 ?>
 <script>
  alert('You Are Not Logged In !! Please Login to access this page');
  window.location='login.php';
 </script>
 <?php
 }
 ?></a></li>
   <li style="float:right"><a href="logout.php">Logout</a></li>
 
</ul>

<div>
<form action="" method="post" name="request" id="request" enctype="multipart/form-data">
<center><b>EVENT REQUEST</b></center>
<label for="event-name"><b>EventName</b></label><span style="color:red">*</span>
    <input type="text" name="title" id="title"></label>

   <p> <label for="eventdate"><b>Event Date</b></label><span style="color:red">*</span></p>
   <p> <input type="date" placeholder="dd-mm-yyyy" name="event_date" id="event_date" ></br></p>
	<p><label for="eventtiming"><b>Event Time:</b></label><span style="color:red">*</span><br></p>
    <p>from:<input type="time" name="start_time" id="start_time" >to:<input type="time" name="end_time" id="end_time" ></br></p>
	<label for="eventvenue"><b>Event Venue</b></label><span style="color:red">*</span>
    <input type="text"  placeholder="Venue" name="venue" id="venue" ></br>
	<label for="sponsors"><b>Resource Person</b></label>
    <input type="text" name="resource_person" id="resource_person">
	
	<div class="w3-light-grey">
    <div id="myBar" class="w3-container w3-green" style="height:24px;width:0%">
    </div>
  </div>

  <button type="submit" id="submitMain" name="submitMain" value="submitMain">send request</button> </p>
</form>
<form action="request_status_1.php" >
  <input type="submit" value="Next" />
  </form>
</div>

	
	</div>
	</body>
	</html>

  <?php	 
   if(isset($_POST['submitMain']))
  {
	   $title = $req_from = $event_date = $venue_date = $start_time = $end_time= "";
   $title = $_POST['title'];
   $resource_person = $_POST['resource_person'];
   $venue = $_POST['venue'];
   $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
   
   $event_date = strtotime($_POST['event_date']); 
			$edate=date("Y-m-d",$event_date);

   $sql = "INSERT INTO requests (title,req_from,venue,event_date,from_time,to_time,swc_appr,faculty_appr,resource_person)
   VALUES ('$title','$user_id','$venue','$edate','$start_time','$end_time','0','0','resource_person')";  // Insert into the table
   if (mysqli_query($connect, $sql)) {
               echo "Your request has been sent.";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($connect);
            }
	}
  ?>
