<!DOCTYPE html>
<!--This page shows searched results requested on index page-->
<html>
  <head>
	  <title>Posts</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
	  <style>
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
  </head>

  <body>
    <h3 align="center">List of Posts!!!!!</h3>
    <?php
    // define variables and set to empty values
      $subcategory = $location = $title = $email = $price = $description = $confirmedEmail = $terms = "";
      $image0 = $image1 = $image2 = $image3 = $image4 ="";
      $subcategoryMapping = "";
      $locationMapping = "";
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
      //Connect to sql and store posts into sql
		    $servername = "localhost";
		    $username = "lamp";
		    $password = "1";
		    $dbname = "lamp_final_project";
		    // Create connection
		    $conn = new mysqli($servername, $username, $password, $dbname);
		    // Check connection
		    if ($conn->connect_error) {
		      die("Connection failed: " . $conn->connect_error);
		    } 
		    //Get mapping of location name and category name
		    $sql = "SELECT SUBCATEGORY_ID, SUBCATEGORYNAME FROM subcategory";
		    $result_subcategory = $conn->query($sql);
		    $sql = "SELECT LOCATION_ID, LOCATIONNAME FROM location";
		    $result_location = $conn->query($sql);	
		    if ($result_subcategory->num_rows > 0) {
				  // output data of each row
				  while($row = $result_subcategory->fetch_assoc()) {
					  $subcategoryMapping[$row["SUBCATEGORY_ID"]] = $row["SUBCATEGORYNAME"];
					}
				} else {
				  echo "0 results";
				}
		    if ($result_location->num_rows > 0) {
				  // output data of each row
				  while($row = $result_location->fetch_assoc()) {
				  $locationMapping[$row["LOCATION_ID"]] = $row["LOCATIONNAME"];
				  }
				} else {
				  echo "0 results";
				}
		    //Get posts
		    $sql = "SELECT TITLE,PRICE,DESCRIPTION,EMAIL,IMAGE_1,IMAGE_2,IMAGE_3,IMAGE_4,SUBCATEGORY_ID, LOCATION_ID FROM posts WHERE ";
		    if(!empty($_GET["location"])){
			    $sql = $sql . "LOCATION_ID = " . test_input($_GET["location"]);
		    }
		    else if(!empty($_GET["subcategory"])){
			    $sql = $sql . "SUBCATEGORY_ID = " . test_input($_GET["subcategory"]);
		    }
		    else if(!empty($_GET["keyword"])){
			    $sql = $sql . "TITLE LIKE " . '\'%' . test_input($_GET["keyword"]) . '%\' OR ';
			    $sql = $sql . "DESCRIPTION LIKE " . '\'%' . test_input($_GET["keyword"]) . '%\'';	
		    }
		    else
			    echo "<h4> No data </h4>";
		    $result = $conn->query($sql);
	      $conn->close();
      }
      function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
      }
    ?>

    <section>
      <?php
	      if(empty($result)){
			      echo "<h4> No Result </h4>";
		      }
		      else{
		      if ($result->num_rows <= 0) {
				          // output data of each row
			      echo "<h4> No Result </h4>";      
		      } else {
			      while ($row = $result->fetch_assoc()) {
			        echo "<div class=\"table-responsive\">";			
			        echo "<table class=\"table table-bordered\">";
			        echo "<tr>";
			        echo "<td>Sub-Category</td>";
			        echo "<td>" . $subcategoryMapping[$row["SUBCATEGORY_ID"]] . "</td>";
			        echo "</tr>";
			        echo "<tr>";
			        echo "<td>Location</td>";
			        echo "<td>" . $locationMapping[$row["LOCATION_ID"]] . "</td>";
			        echo "</tr>";		
			        echo "<tr>";
			        echo "<td>Title</td>";
			        echo "<td>" . $row["TITLE"] . "</td>";
			        echo "</tr>";
			        echo "<tr>";
			        echo "<td>Price</td>";
			        echo "<td>" . $row["PRICE"] . "</td>";
			        echo "</tr>";
			        echo "<tr>";
			        echo "<td>Description</td>";
			        echo "<td><textarea class=\"form-control\" rows=\"6\" cols=\"42\" readonly>" . $row["DESCRIPTION"] . "</textarea></td>";
			        echo "</tr>";
			        echo "<tr>";
			        echo "<td>Email</td>";
			        echo "<td>" . $row["EMAIL"] . "</td>";
			        echo "</tr>";
			        echo "</table>";
			        echo "<table>";
			        if(!empty($row["IMAGE_1"])){
				        echo "<td>";
				        echo "<img class=\"img-responsive\" src=";
				        echo $row["IMAGE_1"];
				        echo ">"; 
				        echo "</td>";
			        }
			        if(!empty($row["IMAGE_2"])){
				        echo "<td>";
				        echo "<img class=\"img-responsive\" src=";
				        echo $row["IMAGE_2"];
				        echo ">"; 
				        echo "</td>";
			        }
			        if(!empty($row["IMAGE_3"])){
				        echo "<td>";
				        echo "<img  class=\"img-responsive\" src=";
				        echo $row["IMAGE_3"];
				        echo ">"; 
				        echo "</td>";
			        }
			        if(!empty($row["IMAGE_4"])){
				        echo "<td>";
				        echo "<img class=\"img-responsive\" src=";
				        echo $row["IMAGE_4"];
				        echo ">"; 
				        echo "</td>";
			        }
			        echo "</table>";
			        echo "</div>";
			        echo "<HR style=\"border:3 double #987cb9\" width=\"80%\" color=#987cb9 SIZE=3>";
		        }
		      }
	      }
      ?>
    </section>
    <a href="index.php">Go Home</a>
    <?php 
      include 'footer.php';
    ?>
  </body>
</html>
