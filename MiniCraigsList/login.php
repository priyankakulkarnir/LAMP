<!-- View for login page -->
<html>
	<head>
		<title>Login Page</title>
		<style>
			#signup 
			{
			  position: relative;
				top: -77px;
				right: -150px;
			}
			fieldset
      {
        width: 230px;
        padding:20px;
        border:1px solid #ccc;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        -khtml-border-radius: 10px;
        border-radius: 10px;  
        margin-left: 45px;
        margin-top: 60px;
      }
      body 
      {
		    width: 25%;
		    margin: 0 auto;
		    background: linear-gradient(to bottom, rgba(255,255,255,0.9) 0%,rgba(255,255,255,0.9) 100%), url("images/logo.png") repeat 0 0;
		    background-repeat: no-repeat;
        background-position: 50%;
	    }
      legend, h3
      {   
        font-family : Arial, sans-serif;
        font-size: 1.3em;
        font-weight:bold; 
      }
      h3
      {
        color:#1E90FF;
        margin-top:30px;
      }
      label
      {
        font-family : Arial, sans-serif;
        font-size:0.8em;
        font-weight: bold;
      }
      input[type="text"], input[type="password"]
      {
        font-family : Arial, Verdana, sans-serif;
        font-size: 0.8em;
        line-height:140%;
        color : #000; 
        padding : 3px; 
        border : 1px solid #999;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -khtml-border-radius: 5px;
        border-radius: 5px;
      }
      input[type="text"], input[type="password"]
      {
        height:24px;
        width:235px;
      }
      input[type="submit"]
      {
        width:80px;
        height:30px;
        padding-left:0px;
      }
      input[type="text"]:focus, input[type="password"]:focus
      {
        color : #009;
        border : 1px solid #990000;
        background-color : #ffff99;
        font-weight:bold;
      }
      .container
      {
        margin-top:8px;
        margin-bottom: 10px;
      }
      .error
      {
        font-family: Verdana, Arial, sans-serif; 
        font-size: 0.7em;
        color: #900;
        background-color : #ffff00;
      }
      .short_explanation
      {
        font-family : Arial, sans-serif;
        font-size: 0.6em;
        color:#333;   
      }
		</style>
	</head>
	
	<body>
    <h3 align='center'>Mini Craigslist - LAMP Final Project</h3>
	  
	  <form method='post' onsubmit='return validateCredentials();' action='uservalidation.php' >
		  <fieldset >
	      <legend>Login</legend>
		    <div id="existinguser">
		      <div class='short_explanation'>* Required fields</div> 
		      <div class='container'>
			      <div><label>Username : </label><input type="text" name='user' id="uname" /></div> <br/>
			      <div><label>Password : </label><input type="password" name='pass' id="pword" /></div> <br/>
			      <input type="submit" value="Login" onsubmit="validateCredentials();"/>					
			      <div id="error"></div>
		      </div>
		    </div>
		  </fieldset>
	  </form>	
	
	  <label text-weight='bold' id="signup"> New User? </label>
	  <input type="submit" value="Signup" id="signup" onclick="registerNewUser();"/>	
		<script type="text/javascript">	
		//User Input Validation
			function validateCredentials() {
				if (document.getElementById('uname').value == '' || document.getElementById('pword').value == '') {
					alert("Please don't leave the fields empty");
					return false;
				}
				else{
				  return true;
				}
			}		
			function registerNewUser() {
				window.location.href = 'registernewuser.php';
			} 
		</script>
		<?php 
      include 'footer.php';
    ?>
	</body>
</html>
