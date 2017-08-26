<?php   
 
  include 'db.php';
  include 'sessions.php';
  
   if(isset($_POST['submitMain']))
  {
   $user_id = $_POST['user_id'];
   $password = $_POST['password'];
   $type = $_POST['type'];
   
   $sql = "SELECT * FROM login_details WHERE user_id = '$user_id' AND pass = '$password'";
	$result=mysqli_query($link,$sql);
	if ($result->num_rows == 1) {
		$_SESSION['user_id']= $user_id;
	 $_SESSION['type']= $type;
     echo "<script>window.location='welcome.html';</script>";
		echo "<p>Invalid username/password combination</p>";
	} else {
		echo '<div align="center"><strong><font color="#FF0000">user id & Password not match !!</font></Strong></div>';
	}
   
  
  }
  ?>
