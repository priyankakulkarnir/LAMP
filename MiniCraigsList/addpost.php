<!-- Page to preview information of post entered by user --> 
<!DOCTYPE html>
<html>

  <head>
	  <title>Preview</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	  <style>
	    h3{
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
  </head>
  
  <body>
    <?php
      /* Assign data coming from addnewpost to variables for posting it to database */
      $subcategory = $location = $title = $email = $price = $description = $confirmedEmail = $terms = "";
      $image1 = $image2 = $image3 = $image4 = "";
      $subcategoryMapping = "";
      $locationMapping = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    $subcategory = test_input($_POST["subcategory"]);
		    $location = test_input($_POST["location"]);
		    $title = test_input($_POST["title"]);
		    $email = test_input($_POST["email"]);
		    $price = test_input($_POST["price"]);
		    $description = test_input($_POST["description"]);
		    $timestamp = date("Y-m-d H:i:s");
		    $target_dir = "images" . "/";		
		    if(!file_exists("images"))
			    mkdir("images");
		    foreach( $_FILES[ 'image' ][ 'name' ] as $index => $Name ){
			    if(!empty($Name)){  
				    $filename = trim(addslashes($_FILES['image']['name'][$index])) ;
				    $filename = str_replace(' ', '_', $filename);
	          $target_file = $target_dir . basename($filename);
			      $uploadOk = 1;
			      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			      if(isset($_POST["submit"])) {
			        $check = getimagesize($_FILES["image"]["tmp_name"][$index]);
			        if($check !== false) {
			          $image[$index] = $target_file;
			          $uploadOk = 1;
			        } else {
			            $uploadOk = 0;    
			        }
			      }
		      }
        }  
		    $servername = "localhost";
		    $username = "lamp";
		    $password = "1";
		    $dbname = "lamp_final_project";
		    $conn = new mysqli($servername, $username, $password, $dbname);
		    if ($conn->connect_error) {
		      die("Connection failed: " . $conn->connect_error);
		    } 
		    $sql = "SELECT SUBCATEGORY_ID, SUBCATEGORYNAME FROM subcategory";
		    $result_subcategory = $conn->query($sql);
		    $sql = "SELECT LOCATION_ID, LOCATIONNAME FROM location";
		    $result_location = $conn->query($sql);	
		    $conn->close();
			  if ($result_subcategory->num_rows > 0) {
		      while($row = $result_subcategory->fetch_assoc()) {
			      $subcategoryMapping[$row["SUBCATEGORY_ID"]] = $row["SUBCATEGORYNAME"];
			    }
			  } else{
				    echo "0 results";
				}
		    if ($result_location->num_rows > 0) {
			    while($row = $result_location->fetch_assoc()) {
				    $locationMapping[$row["LOCATION_ID"]] = $row["LOCATIONNAME"];
	        }
		    } else {
				    echo "0 results";
			  }
      }
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <section>
	    <h3 align="center">Preview Post</h3>
	    <hr>
	    <form method="post" action="submitpost.php" enctype=multipart/form-data accept-charset=utf-8>
       <!-- Table to preview entered data -->
        <table border=1 align="center">
			    <tr>
				    <td>Sub-Category:</td>
				    <td>
				      <div class="form-group">
				        <input class="form-control" type="text" name="subcategory" value="<?php echo $subcategoryMapping[$subcategory]; ?>" readonly>
				        </input>
				      </div>
					    <input type="hidden" name="subcategoryID" value="<?php echo $subcategory; ?>"></input>
				    </td>
			    </tr>
			    
			    <tr>
				    <td>Location:</td>
				    <td>
				      <div class="form-group">
				        <input class="form-control" type="text" name="location" value="<?php echo $locationMapping[$location];?>" readonly>
				        </input>
				      </div>
					    <input type="hidden" name="locationID" value="<?php echo $location; ?>"></input>
				    </td>
			    </tr>
			    
			    <tr>
				    <td>Title:</td>
				    <td>
				      <div class="form-group">
				        <input class="form-control" type="text" size="40" name="title" value="<?php echo $title;?>" readonly>
				        </input>
				      </div>
				    </td>
			    </tr>	
			    
			    <tr>
				    <td>Price:</td>
				    <td>
				      <div class="form-group">
				        <input class="form-control" type="number" name="price" value="<?php echo $price;?>" readonly>
				        </input>
				      </div>
				    </td>
			    </tr>	
			    			
			    <tr>
				    <td>Description:</td>
				    <td>
				      <div class="form-group">
				        <textarea class="form-control" rows="6" cols="42" name="description" readonly><?php echo $description;?></textarea>
				      </div>
				    </td>
			    </tr>		
			    
			    <tr>
				    <td>Email:</td>
				    <td>
				      <div class="form-group">
				        <input class="form-control" type="email" size="40" name="email" value="<?php echo $email;?>" readonly>
				      </div>
				    </td>
			    </tr>
			    
			    <tr>
				    <td colspan="2" align="center">
					    <input type="submit" name="submit" value="Submit"></input>
				    </td>
			    </tr>
		    </table>

		    <input type="hidden" name="timestamp" value="<?php echo $timestamp;?>"></input></br>
		    
		    <table>
			    <tr>
				    <td>
				      <?php
				      if(!empty($image[0])){
				      echo "<img style='display:none;' class=\"img-responsive\" src=";
				      echo $image[0];
				      echo ">"; 
				      }
				      else {
				      $image[0] = "No Image";
				      }
				      ?>
				    </td>
				    <td>
				      <input type="hidden" name="img1" value="<?php echo $image[0];?>"></input>
				    </td>
			    </tr>
			    
			    <tr>
				    <td>
				      <?php
				      if(!empty($image[1])){
				      echo "<img style='display:none;' class=\"img-responsive\" src=";
				      echo $image[1];
				      echo ">";
				      }
				      else {
				      $image[1] = "No Image";
				      }
				      ?>
				    </td>
				    <td>
				      <input type="hidden" name="img2" value="<?php echo $image[1];?>"></input>
				    </td>
			    </tr>		
			    
			    <tr>
				    <td>
				      <?php
				      if(!empty($image[2])){
				      echo "<img style='display:none;' class=\"img-responsive\" src=";
				      echo $image[2];
				      echo ">"; 
				      }
				      else {
				      $image[2] = "No Image";
				      }
				      ?>
				    </td>
				    <td>
				      <input type="hidden" name="img3" value="<?php echo $image[2];?>"></input>
				    </td>
			    </tr>
			    
			    <tr>
				    <td>
				      <?php
				      if(!empty($image[3])){
				      echo "<img style='display:none;' class=\"img-responsive\" src=";
				      echo $image[3];
				      echo ">"; 
				      }
				      else {
				      $image[3] = "No Image";
				      }
				      ?>
				    </td>
				    <td>
				      <input type="hidden" name="img4" value="<?php echo $image[3];?>"></input>
				    </td>
			    </tr>
		    </table>
	    </form>
    </section>
    <?php 
        include 'footer.php';
    ?>
  </body>
</html>
