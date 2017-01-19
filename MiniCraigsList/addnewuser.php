<!-- Controller for updating new users to the database --> 
<html>

  <head>
    <title>Added Successfully</title>
    <style>
     span
      {
         font-family : Arial, sans-serif;
         font-size: 1.0em;
         font-weight:bold;
         color:#333;
      }
     body
     {
      background: linear-gradient(to bottom, rgba(255,255,255,0.9) 0%,rgba(255,255,255,0.9) 100%), url("images/logo.png") repeat 0 0;
		  background-repeat: no-repeat;
      background-position: 50%;
     }
    </style>
  </head>

  <?php  
	  if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['cpass'])
	  && $_POST['user'] && $_POST['pass'] && $_POST['cpass']) {
      mysql_connect("localhost", "lamp", "1") or die(mysql_error());   
	    mysql_select_db("lamp_final_project") or die(mysql_error());
      $uname = $_POST['user'];
	    $pwd = $_POST['pass'];
	    $cpwd = $_POST['cpass'];
	    if ($uname && $pwd) {
	      if (!get_magic_quotes_gpc()) {  
	        $uname = addslashes($uname);
	        $pwd = addslashes($pwd);
	        $cpwd = addslashes($cpwd);
	      }  
        $check = mysql_query("SELECT username FROM users WHERE username = '$uname'")   or die(mysql_error());  
        $check2 = mysql_num_rows($check);    
	      //if the name exists it gives an error  
	      if ($check2 != 0) {  
	        echo "<script type='text/javascript'>", 
	        "alert('Sorry, the username is already in use.');",
	        "window.location.href = 'registernewuser.php';",
	        "</script>";
	      }
	    }				
      $query = "INSERT INTO users(username, password)  VALUES('$uname', '$pwd')";  
	    if(mysql_query($query)) { ?> 
	    <!--ON Successfull user Registration-->
	      <span style="text-align:center;">  You have signed up!!  Please login to see new products!!</span><br/><br/>
	      <span><a href="login.php" style="text-decoration:none;text-align:center">Login</a></span>						    				
      <?php } 
      else {				
			  die('Error:'.mysql_error());
			}
      mysql_close();
	  } 
	?>
	<?php 
    include 'footer.php';
  ?>
</html>

