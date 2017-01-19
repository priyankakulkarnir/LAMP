<!DOCTYPE html>
<!-- This page is shown when user wants to submit post -->
<html>
  <head>
	  <title>Submit Post</title>
  </head>
  <style type="text/css">
    .error
    {
	    color: red;
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
  
  <body>
    <h3 align="center">Submit post</h3>
    <hr>
    <?php
      /* Posts data into database in case of successul connection and appropriate data */
      echo "<center>";
      $subcategory = $location = $title = $email = $price = $description = $confirmedEmail = $terms = $img1 = $img2 = $img3 = $imge = $img5 = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    $subcategoryID = $_POST["subcategoryID"];
		    $locationID = $_POST["locationID"];
		    $title = test_input($_POST["title"]);
		    $email = test_input($_POST["email"]);
		    $price = test_input($_POST["price"]);
		    $description = test_input($_POST["description"]);
		    $img1 = test_input($_POST["img1"]);
		    $img2 = test_input($_POST["img2"]);
		    $img3 = test_input($_POST["img3"]);
		    $img4 = test_input($_POST["img4"]);
		    $timestamp = $_POST["timestamp"];
		    $agreement = "1 Year";
		    $servername = "localhost";
		    $username = "lamp";
		    $password = "1";
		    $dbname = "lamp_final_project";
		    $conn = new mysqli($servername, $username, $password, $dbname);
		    if ($conn->connect_error) {
		      die("Connection failed: " . $conn->connect_error);
		    } 
		    echo "Database Connected<br>";
		    $sql = "INSERT INTO posts (TITLE, PRICE, DESCRIPTION, EMAIL, AGREEMENT, TIMESTAMP, SUBCATEGORY_ID, LOCATION_ID, IMAGE_1, IMAGE_2, IMAGE_3, IMAGE_4) VALUES ('$title', $price, '$description', '$email','$agreement', '$timestamp', '$subcategoryID', '$locationID','$img1','$img2','$img3','$img4')";
		    if ($conn->query($sql) === TRUE) {
		      echo "1 Record Added<br>";
		    } else {
		        echo "Error: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
      }
      function test_input($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
      }
      echo "Thank You. Submitted Your Post.";
      echo "</center>";
    ?>
	  <br>
	  <center><input type="button" onclick="location.href='index.php';" value="Go Home"></input></center>
    <?php 
      include 'footer.php';
    ?>
  </body>
</html>

