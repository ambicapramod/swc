<?php    
 session_start();  

 if(isset($_SESSION['user_id']))  
 {
  $user_id=$_SESSION['user_id'];
 echo "User name :".$user_id;
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
<br><a href="request.php">Click here to see your approval status</a></br>
</html>
