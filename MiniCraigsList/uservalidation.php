<!-- Controller for the login validation of users -->
<?php 
  echo "<html><head><title>Validate User</title></head></html>";
	ob_start();
	mysql_connect("localhost", "lamp", "1") or die(mysql_error());   
	mysql_select_db("lamp_final_project") or die(mysql_error());  
  if (isset($_POST['user']) && isset($_POST['pass']) && $_POST['user'] && $_POST['pass']) {
	  $uname = $_POST['user'];
	  $pwd = $_POST['pass'];
    if ($uname && $pwd) {
			if (!get_magic_quotes_gpc()) {  
		   $uname = addslashes($uname); 
		   $pwd = addslashes($pwd);
			}	
      $query = mysql_query("SELECT username, password FROM users WHERE username = '$uname'")   or die(mysql_error()); 
			$numrows = mysql_num_rows($query);
		  if ($numrows != 0) {  					
		    while ($row = mysql_fetch_assoc($query)) {
				  $user = $row['username'];
					$pass = $row['password'];
					echo "Debug ". $user. " " .$pass;
					//User is not authenticated
					if ( $user != $uname || $pwd != $pass) {
					  echo "<script type='text/javascript'>", 
						"window.location.href='login.php' ;",
						"</script>";
					} else {
						  //Redirect users to the homepage
							setcookie('uid', $user, time() + 14400, '/');							
							echo "<script type='text/javascript'>", 
							"window.location.href='index.php' ;",
							"</script>";
						}
					}
				} 
				else {
					echo "Please check Username & Password!!! Try Again!!!";
					echo "<br>";
					echo "<a href='login.php'>Login Page</a>";
				}
    }
  } else {				
				echo "<script type='text/javascript'>", 
				"window.location.href='login.php' ;",
				"</script>";
		}
	mysql_close();
?>
