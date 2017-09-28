<?php   
 include 'db.php';
 session_start();
  ?>
<html>
<head>
<meta charset = "UTF-8">
<link rel = "stylesheet"
   type = "text/css"
   href = "request_status_1.css" />
</head>
<body>

<ul>
  <li><a href="request_page.html">Home</a></li>
  <li><a href="event_request.html">Event Request</a></li>
   <li><a href="request_status.html">Request Status</a>
   <li style="float:right"><a href="#">WELCOME <?php if(isset($_SESSION['user_id']))  
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
   <li style="float:right"><a href="logout.html">Logout</a></li>
 </ul>
 <div>
<form>
<center><b> VIT CHENNAI <br>Club Login</b></center>
<table class="hello">
<tr>
<th>Request id</th>
<th>Event Name</th>
<th>Event Date</th>
<th>Applied Date </th>

<th>SWC Status</th>
<th>Faculty Status</th>

</tr>
<?php   
   if(isset($_SESSION['user_id']))  
 {
	 
 $user_id = $_SESSION['user_id']; // checking for the session alive.
	$sql = "SELECT * FROM requests WHERE req_from = '$user_id'";
	$res = $connect->query($sql) or trigger_error($connect->error."[$sql]");
	
while($row = $res->fetch_assoc()) 
  {
  $swc_appr = $row["swc_appr"];
  $faculty_appr = $row["faculty_appr"];
 
 ?><tr> <td><?php echo $row['req_id']; ?></td>
 <td><?php echo $row['title']; ?></td>
<td> <?php echo  $row['from_time']; ?></td>
  <td> <?php echo $row['event_date']; ?></td>
<?php  
  if($swc_appr==0)  //Status of the requested event
  {
	 ?> <td style="color:orange;"> <?php echo "Pending"; ?> </td>
	 <?php
  }
  if($faculty_appr==0)  //Status of the requested event
  {
	   ?> <td style="color:orange;"> <?php echo "Pending"; ?> </td>
	 <?php
  }
  if($swc_appr==1)  //Status of the requested event
  {
	 	   ?> <td style="color:green"> <?php echo "Approved"; ?> </td>
	 <?php
  }
 if($faculty_appr==1)  //Status of the requested event
  {
	    ?> <td style="color:green"> <?php echo "Approved"; ?> </td>
	 <?php
  }
   if($swc_appr==-1)  //Status of the requested event
  {
	    ?> <td style="color:red;"> <?php echo "Rejected"; ?> </td>
	 <?php
  }
   if($faculty_appr==-1)  //Status of the requested event
  {
	     ?> <td style="color:orange;"> <?php echo "Rejected"; ?> </td>
	 <?php
  }
  }
 } else {
?>
<?php
 }  
   
  ?> </tr>
<tr>
</table>

  <p><a href="event_request.html"><input type="button" value="Previous" style="color:green;border-radius: 5px;"></a></p>
</form>
</div>
</body>
</html>
