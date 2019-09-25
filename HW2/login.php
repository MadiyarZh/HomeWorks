<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
      $count = mysqli_num_rows($result);
      $row = $result->fetch_assoc();
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            padding: 6px;
            border:#bcbba1 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:400px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF;    padding: 18px; font-size: 30px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form style="margin: 20px" action = "" method = "POST">
                  <label>Username  :</label><input type = "text" name = "username" placeholder="Enter your username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" placeholder="Enter your password" class = "box" /><br/><br />
                  <input type = "submit" value = " Enter "/><br />
               </form>
               
              <?php if (isset($error)) {
                 ?>
                 <div style = "font-size: 16px; color:#cc0000; margin-top:6px"><?php echo $error; ?></div>
                 <?php
              } 
					  ?>
            </div>
				
         </div>
			
      </div>

   </body>
</html>