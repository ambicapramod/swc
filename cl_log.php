<?php   
 include 'db.php';
 session_start();
  ?>
<html>
<head>
<link rel = "stylesheet"
   type = "text/css"
   href = "cl_log.css" />
</style>
</head>
<body>
<div>
  <form action="cl_log.php" method="post" name="student_login" id="student_login" enctype="multipart/form-data" position="fixed">
  <center><b> VIT CHENNAI <br>Club Login</b></center>
    <label for="email-id">Email-id</label>
    <input type="text" name="user_id" id="user_id" placeholder="Email id..">

    <label for="pwd">Password</label>
    <input type="password" name="password" id="password" placeholder="Password..">

   <!-- <label for="clb">Club Name</label>
    <select id="clb" name="Club Name">
	
      <option value="dance">Dance Club</option>
      <option value="music">Music Club</option>
      <option value="wdc">Womens Development Club</option>
	  <option value="robo">Robotics Club</option>
	  <option value="lit">litsoc Club</option>
	  <option value="deb">Debsoc Club</option>
	  <option value="yrc">Youth Red Cross Club</option>
	  <option value="nss">Nss Club</option>
	  <option value="sports">Sports Club</option>
    </select>-->
  <label for="entry">Enter as:</label>
  <label class="radio-inline">
  <input type="radio" name="type" id="type" value="student" checked="checked">Student
  </label>
  <label>
  <input type="radio" name="type" id="type" value="faculty" >faculty
  </label></br>
  <input type="submit" id="submitMain" name="submitMain" value="Login">
  </form>
</div>
</body>
</html>
 <?php
   if(isset($_POST['submitMain'])) //submit the request
  {
   $user_id = $_POST['user_id'];
   $password = $_POST['password'];
   $type = $_POST['type'];
   
   $sql = "SELECT * FROM login_details WHERE user_id = '$user_id' AND pass = '$password' AND type = '$type'";  // matching the userid 
	$result=mysqli_query($connect,$sql); 
	if ($result->num_rows == 1) {
		$_SESSION['user_id']= $user_id;
	 $_SESSION['type']= $type;
	 if($type=='faculty')
	 {
		 echo "<script>window.location='faculty.php';</script>"; 
	 }
     echo "<script>window.location='event_request.php';</script>";
		
	} else {
		echo '<div align="center"><strong><font color="#FF0000">user id & Password not match !! <br/>If you are a student please select student as your login type</font></Strong></div>';
	}
  }
  ?>
