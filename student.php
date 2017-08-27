<?php    
  include 'db.php';
 session_start();  

 if(isset($_SESSION['user_id']))  
 {
  $username=$_SESSION['user_id'];
 echo "User name :".$username;
 } else {
 ?>
 <script>
  alert('You Are Not Logged In !! Please Login to access this page');
  window.location='login.php';
 </script>
 <?php
 }
 ?>
  <html>
 <form action="" method="post" name="request" id="request" enctype="multipart/form-data">
          <table width="100%" border=0>
            <tr>
              <td height="22"><table width="100%" border=0>
                  <tr>
                    <th colspan="5" id="formhedear"></th>
                  </tr>
                  <tr>
                    <td height="34" colspan="2"></td>
                    
                  </tr>
				  <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Title of the event: </strong></div></td>
                 <td width="128"><input type="textbox" name="title" id="title" maxlength="20" style="width:176px;"
                                   />
                                   </td>
								   </tr>
								   <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Resource Person Name: </strong></div></td>
                 <td width="128"><input type="textbox" name="resource_person" id="resource_person" maxlength="20" style="width:176px;"
                                   />
                                   </td>
								   </tr>
								   <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Event Date: </strong></div></td>
                 <td width="128"><input type="date"   placeholder="dd-mm-yyyy" name="event_date" id="event_date"/>
                                   </td>
								   </tr>
								   <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Venue: </strong></div></td>
                 <td width="128"><input type="textbox"   placeholder="" name="venue" id="venue"/>
                                   </td>
								   </tr>
								    <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Start Time: </strong></div></td>
                 <td width="128"><input type="time" name="start_time" id="start_time" />
                                   </td>
								   </tr>
								   <tr>
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>End Time: </strong></div></td>
                 <td width="128"><input type="time" name="end_time" id="end_time">
                                   </td>
								   </tr>
              <tr>
                 <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submitMain" name="submitMain" value="submitMain" />
                 &nbsp;&nbsp;&nbsp;
                 </td>
              </tr>
           
              </table></td>
            </tr>
          </table>
        </form>
</html>

  <?php
 

		  $user_id = $_SESSION['user_id']; // checking for the session alive.
	$sql = "SELECT * FROM requests WHERE req_from = '$user_id'";
	$res = $link->query($sql) or trigger_error($link->error."[$sql]");
while($row = $res->fetch_assoc()) 
  {
  echo "title: ".$row["title"] . "<br/>Request from: " . $row["req_from"] . "<br/>Venue: " . $row["venue"] . "<br/>Start time: " . $row["from_time"] . "<br/>End time: " . $row["to_time"] . "<br/>Event date: " . $row["event_date"];
  $swc_appr = $row["swc_appr"];
  $faculty_appr = $row["faculty_appr"];
  if($swc_appr==0 && $faculty_appr==0)  //Status of the requested event
  {
	  echo "status : Pending for approval"; 
  }
  
  echo "<br />";
  }
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
			
   $today_dt = strtotime("Y-m-d");   // Get today's date.

			if ($edate < $today_dt) {?> <script> // check the validity of the date.
  alert('Enter the correct date.');
  
 </script> <?php }
			
   $sql = "INSERT INTO requests (title,req_from,venue,event_date,from_time,to_time,swc_appr,faculty_appr,resource_person)
   VALUES ('$title','$user_id','$venue','$edate','$start_time','$end_time','0','0','resource_person')";  // Insert into the table
   if (mysqli_query($link, $sql)) {
               echo "Your request has been sent.";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($link);
            }
	}
  ?>
  
