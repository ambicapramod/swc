<?php   
 
  include 'db.php';
 session_start();
  ?>
  <html>
 <form action="login.php" method="post" name="student_login" id="student_login" enctype="multipart/form-data">
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
                 <td width="245" height="37"><div align="right"><strong><font color="#FF0000">*</font>Student Id : </strong></div></td>
                 <td width="128"><input type="textbox" name="user_id" id="user_id" maxlength="20" style="width:176px;"
                                   "/>
                                   </td>
              </tr>
			  <tr>
                 <td ><strong><font color="#FF0000">*</font> student: </strong>
                 <input type="radio" name="type" id="type" value="student" checked="checked"
                                   /></td>
				<td  ><strong><font color="#FF0000">*</font> faculty: </strong>
                 <input type="radio" name="type" id="type" value="faculty" 
                                   /></td>	
				<td  ><strong><font color="#FF0000">*</font> student welfare cordinator: </strong>
                 <input type="radio" name="type" id="type" value="swc" 
                                   /></td>
              </tr>
              <tr>
                 <td width="245" height="37"><strong><font color="#FF0000">*</font>Password : </strong></td>
                 <td width="128"><input type="password" name="password" id="password"  
                                  /></td>
              </tr>
              <tr>
                 <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <input type="submit" id="submitMain" name="submitMain" value="Login" />
                 &nbsp;&nbsp;&nbsp;
                 </td>
              </tr>
              </table></td>
            </tr>
          </table>
        </form>
</html>

  <?php
   if(isset($_POST['submitMain'])) //submit the request
  {
   $user_id = $_POST['user_id'];
   $password = $_POST['password'];
   $type = $_POST['type'];
   
   $sql = "SELECT * FROM login_details WHERE user_id = '$user_id' AND pass = '$password'";  // matching the userid
	$result=mysqli_query($link,$sql); 
	if ($result->num_rows == 1) {
		$_SESSION['user_id']= $user_id;
	 $_SESSION['type']= $type;
     echo "<script>window.location='student.php';</script>";
		
	} else {
		echo '<div align="center"><strong><font color="#FF0000">user id & Password not match !!</font></Strong></div>';
	}
   
  
  }
  ?>
  
