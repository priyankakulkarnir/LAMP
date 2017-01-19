<!DOCTYPE html>
<!--This page is to add new post-->
<html>

  <head>
	  <title>Add New Post</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>		
  </head>
  
  <style type="text/css">
    .error
    {
      color: red;
    }
	  #uid 
	  {
		  font-style: italic;
		  position:relative;
		  left:-5px;
		  float:right;
	  }
    h3
    {
        font-family : Arial, sans-serif;
        font-size: 1.3em;
        font-weight:bold;
        color:#1E90FF;
    }   
    body
    {
      background: linear-gradient(to bottom, rgba(255,255,255,0.9) 0%,rgba(255,255,255,0.9) 100%), url("images/logo.png") repeat 0 0;
		  background-repeat: no-repeat;
      background-position: 50%;
    } 
  </style>
  
  <?php if (isset($_COOKIE['uid']) && $_COOKIE['uid']) { ?>
  
  <body>

    <script type="text/javascript">
      /* Validation to check required fields */
	    function validateForm(){
		    var valid = true;	
		    var data = document.forms["postdata"]["subcategory"].value;
		    if (data == null || data =="Select Sub-Category"){
		      document.getElementById("subcategoryError").innerHTML="* Sub-Category is required";
			    valid = false;
		    }
		    var data = document.forms["postdata"]["location"].value;
		    if (data == null || data =="Select Location"){
		      document.getElementById("locationError").innerHTML="* Location is required";
			    valid = false;
		    }
		    var data = document.forms["postdata"]["title"].value;
		    if (data == null || data =="") {
			    document.getElementById("titleError").innerHTML="* Title is required";
			    valid = false;
		    }
		    else{
			    document.getElementById("titleError").innerHTML="* ";
		    }
		    data = document.forms["postdata"]["price"].value;
		    if (data == null || data =="") {
			    document.getElementById("priceError").innerHTML="* Price is required";
			    valid = false;
		    }
		    else if(data < 0.0){
			    document.getElementById("priceError").innerHTML="* Price must be non-negative";
			    valid = false;	
		    }
		    else{
			    document.getElementById("priceError").innerHTML="* ";
		    }
		    data = document.forms["postdata"]["description"].value;
		    if (data == null || data =="") {
			    document.getElementById("descriptionError").innerHTML="* Description is required";
			    valid = false;
		    }
		    else{
			    document.getElementById("descriptionError").innerHTML="* ";
		    }
		    data = document.forms["postdata"]["email"].value;
		    if (data == null || data =="") {
			    document.getElementById("emailError").innerHTML="* Email is required";
			    valid = false;
		    }
		    else{
			    document.getElementById("emailError").innerHTML="* ";
		    }
		    var confirmData = document.forms["postdata"]["confirmedEmail"].value;
		    if (data == null || data =="" || data != confirmData) {
			    document.getElementById("confirmError").innerHTML="* Email doesn't match";
			    valid = false;
		    }
		    else{
			    document.getElementById("confirmError").innerHTML="*";
		    }
		    data = document.getElementById("agree").checked;
		    if (data == null || data =="" || data == false) {
			    document.getElementById("termsError").innerHTML="* You must agree terms and conditions";
			    valid = false;
		    }
		    else{
			    document.getElementById("termsError").innerHTML="* ";
		    }
		    return valid;
	    }
	    /* Function to reset all values of form */
	    function reset(){
	      document.forms["postdata"]["location"].value = "Select Location";
	      document.forms["postdata"]["subcategory"].value = "Select Sub-Category";
		    document.forms["postdata"]["title"].value = "";
		    document.forms["postdata"]["price"].value = "";
		    document.forms["postdata"]["description"].value = "";
		    document.forms["postdata"]["email"].value = "";
		    document.forms["postdata"]["confirmedEmail"].value = "";
		    document.getElementById("agree").checked=false;
	    }
    </script>

    <?php
      /* Php code for database connection using following username, password and databasename */
		  $servername = "localhost";
		  $username = "lamp";
		  $password = "1";
		  $dbname = "lamp_final_project";
		  $conn = new mysqli($servername, $username, $password, $dbname);
		  if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		  } 
		  /* Select data from subcategory and location tables to display in combobox */
		  $sql = "SELECT SUBCATEGORY_ID, SUBCATEGORYNAME FROM subcategory";
		  $result_subcategory = $conn->query($sql);
		  $sql = "SELECT LOCATION_ID, LOCATIONNAME FROM location";
		  $result_location = $conn->query($sql);	
		  $conn->close();
    ?>

    <section>
      <div class="container">
        <span class="glyphicon glyphicon-home"></span> <a href="index.php">Go Home</a>
        <span id="logout"><a href ="logout.php" style="position:relative;left:30px"> <span class="glyphicon glyphicon-log-out"></span> Log out</a></span> 
        <!--Displaying the username on sucessfull login-->
        <span id="uid"><span class="glyphicon glyphicon-user"></span> <label>Hi, <?php echo $_COOKIE['uid']; ?></label> </span>
        <!--Form to accept post related information: sub-category,location, title, price, description, emailid, images from user-->
        <form name="postdata" method="post" action="addpost.php" enctype=multipart/form-data accept-charset=utf-8 onsubmit="return validateForm();" >
	        <h3 align="center">Add New Post</h3>
	        <table class="table table-condensed">
            <tr>
				      <th>Sub-Category:</th>
				      <td>
				        <div class="form-group">
				          <select name="subcategory">
                    <option select="selected"> Select Sub-Category </option> 
				              <?php
					              if ($result_subcategory->num_rows > 0) {
					                  while($row = $result_subcategory->fetch_assoc()) {
					                  	echo "<option value=\"" . $row["SUBCATEGORY_ID"] . "\">" . $row["SUBCATEGORYNAME"] ."</option>";
					                  }
					              } else{
					                  echo "0 results";
					              }
				              ?>	
				          </select>
				          <span class="error" id="subcategoryError">*</span>
				        </div>
				      </td>
  			    </tr>
			
			      <tr>
				      <th>Location:</th>
				      <td>
				        <div class="form-group">
				          <select name="location">
				            <option select="selected"> Select Location </option>
				              <?php
					              if ($result_location->num_rows > 0) {
					                  while($row = $result_location->fetch_assoc()) {
					                  	echo "<option value=\"" . $row["LOCATION_ID"] . "\">" . $row["LOCATIONNAME"] ."</option>";
					                  }
					              } else {
					                  echo "0 results";
					              }
				              ?>
				          </select>
				          <span class="error" id="locationError">*</span>
				        </div>
				      </td>	
			      </tr>
			
			      <tr>
				      <th>Title:</th>
				      <td>
				        <input type="text" size="40" name="title">
				        <span class="error" id="titleError">* </span>
				      </td>
			      </tr>	
			      
			      <tr>
				      <th>Price:</th>
				      <td>
				        <input type="number" name="price" min=0>
				        <span class="error" id="priceError">* </span>
				      </td>
			      </tr>				
			
			      <tr>
				      <th>Description:</th>
				      <td>
				        <textarea rows="4" cols="40" name="description" ></textarea>
				        <span class="error" id="descriptionError">* </span>
				      </td>
			      </tr>		
			
			      <tr>
				      <th>Email:</th>
				      <td>
				        <input type="email" size="40" name="email" >
				        <span class="error" id="emailError">* </span>
				      </td>
			      </tr>			
			
			      <tr>
				      <th>Confirm Email:</th>
				      <td>
				        <input type="email" size="40" name="confirmedEmail" >	
				        <span class="error" id="confirmError">* </span>
				      </td>
			      </tr>
			      
		      </table>
		
		      <hr>
		      <p>
		        <label>I agree with terms and conditions:</label> 
		        <input type="checkbox" id="agree" name="terms" >
		        <span class="error" id="termsError">* </span>
		      </p>
		  
		      <hr>
		      <label>Optional fields:</label>
		      <table>
		      
			      <tr>
				      <th>Image 1 (max 5MB):</th>
				      <td></td>
				      <td><input type="file" name="image[]"></td>
			      </tr>
			      
			      <tr>
				      <th>Image 2 (max 5MB):</th>
				      <td></td>
				      <td><input type="file" name="image[]"></td>
			      </tr>	
			      	
			      <tr>
				      <th>Image 3 (max 5MB):</th>
				      <td></td>
				      <td><input type="file" name="image[]"></td>
			      </tr>
			      
			      <tr>
				      <th>Image 4 (max 5MB):</th>
				      <td></td>
				      <td><input type="file" name="image[]"></td>
			      </tr>
			
		      </table>
		
		      <hr>
		      <input type="submit" name="submit" value="Preview">
		      &nbsp; &nbsp; &nbsp;
		      <input type="button" value="Reset" onclick="reset();">
		
        </form>
      </div>
    </section>
    
    <!--Loading Footer-->
    <?php 
        include 'footer.php';
      ?>
  </body>

  <!--Re-Directing the page to Login in case if user is not logged in-->
  <?php } else {
	  echo "<script type='text/javascript'>", 
				  "window.location.href='login.php' ;",
			  "</script>";
	  }
  ?>
</html>
