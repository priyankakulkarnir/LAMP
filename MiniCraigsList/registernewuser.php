<!-- View for New user sign up page -->
<html>
  <head>
    <title>New User SignUp</title>
		<style>
			#signup 
			{
				position: relative;
				top: -77px;
				right: -120px;
			}
			body 
			{
		    width: 35%;
		    margin: 0 auto;
        background: linear-gradient(to bottom, rgba(255,255,255,0.9) 0%,rgba(255,255,255,0.9) 100%), url("images/logo.png") repeat 0 0;
		    background-repeat: no-repeat;
        background-position: 50%;
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
        margin-top:60px; 
        margin-left: 110px;  
      }
      legend, h3
      {
        font-family : Arial, sans-serif;
        font-size: 1.3em;
        font-weight:bold;
      }
      h3
      {
        margin-top:30px;
        color:#1E90FF;
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
        width:200px;
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
	  <h3 align='center'> New User- Sign up for more Products!! </h3>
  </head>

  <body>
    <!--Forms to display the data-->
	  <form method='post' onsubmit='return validateEmail();' action='addnewuser.php'>
		  <fieldset >
	      <legend>New User-Sign Up</legend>
		    <div id="newuser">
		      <div class='short_explanation'>* Required fields</div> <br/>
		      <div class='container'>
			      <div><label>Username* : </label><input type="text" name='user' id="uname" /> </div><br/>
			      <div><label>Password* : </label><input type="password" name='pass' id="pword" /> </div><br/>
			      <div><label>Confirm Password* : </label><input type="password" name='cpass' id="cpword" /> </div></br>			
			      <input type="submit" value="Signup"/>&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">Login Page</a>
		      </div>
		    </div>
		  </fieldset>
	  </form>
	
	  <script type="text/javascript">
	  //User Input Validation
		  function validateEmail() {
			  if (!/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(document.getElementById('uname').value)) {
				  alert('Enter valid email ID');
				  return false;
			  } else if (document.getElementById('pword').value != document.getElementById('cpword').value) {
				  alert('Your passwords did not match!!');
				  return false;
			  }
			  return true;
		  }
	  </script>	
	  <?php 
        include 'footer.php';
    ?>
  </body>
</html>
