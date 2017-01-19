<!-- View & Controller for the main browse,search i.e. index page -->
<?php ini_set('display_errors',0); ?>
<html>
	<head>
		<title>Mini-Craigslist</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	
		<style type="text/css">
		  body 
		  {
		    text-align: left;
		    width: 80%;
		    margin: 0 auto;
        background: linear-gradient(to bottom, rgba(255,255,255,0.9) 0%,rgba(255,255,255,0.9) 100%), url("images/logo.png") repeat 0 0;
		    background-repeat: no-repeat;
        background-position: 50%;
	    }
			h2 {
				text-align:center;
				position: relative;
				left:-60px;
			}
			td 
			{
				width:100px;
				vertical-align: center;
				background: #f0f0f2;
				font-family : Times New Roman;
        font-size:1em;  
			}
			th
			{
			  background: #395870;
			  font-family : Times New Roman;
			  color: #fff;
			}
			a 
			{
				text-decoration: none;
			}
			#container 
			{
				padding-top: 50px;
			}
			.desc 
			{
				width:300px;
			}
			.email 
			{
				width:200px;
			}
			.pic 
			{
				width:50px;
			}			
			#search_spacing
			{
			  float:right;
			}
			h3
      {
        font-family : Arial, sans-serif;
        font-size: 1.3em;
        font-weight:bold;
        color:#1E90FF;
      }
      label
      {
        font-weight:bold;
      }
      table
      {
        border-collapse: separate;
        border-spacing: 2px;
        
      }
		</style>
	</head>
	
	<?php if (isset($_COOKIE['uid']) && $_COOKIE['uid']) { ?>
	
	<body>
	  <script type="text/javascript">
	  function reset(){
		    document.forms["keyword"].value = "";
	    }
	    </script>
		  <h3 align='center'>Welcome to Mini-Craigslist</h3>
		  <hr>
      <div align='left'>
        <form action="search.php" >
          <span class="glyphicon glyphicon-search"></span>Search:
          <input type="text" name="keyword" id="keyword">
          <input type="submit" value="Submit">
          <input type="button" value="Reset" onclick="reset();">
          <span id="search_spacing">
            <span id="uid">
              <span class="glyphicon glyphicon-user"></span> 
              <label>Hi, <?php echo $_COOKIE['uid']; ?></label> 
            </span>
            &nbsp;&nbsp;&nbsp;
		        <span id="addpost">
		          <a href="addnewpost.php"> 
		            <span class="glyphicon glyphicon-plus"></span> 
		            Add a New Post
		          </a>
		        </span>
		        &nbsp;&nbsp;&nbsp;
		        <span id="logout">
		          <a href ="logout.php"> 
		            <span class="glyphicon glyphicon-log-out"></span> 
		            Log out
		          </a>
		        </span> 
		      </span>
        </form>
      </div>
		  
		  <hr>
		  
		  <form action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post">	
		    <span><label> Browse Post By: </label></span>
		    <span id="category-div">
		      &nbsp;&nbsp;&nbsp;&nbsp;
			    <label>Category :</label>
			    <!--Displaying all the Categories from the database-->
			    <select name='category' id='category' >
			      <option value="0">Select</option>
			      <?php
              mysql_connect('localhost', 'lamp', '1');
              mysql_select_db('lamp_final_project');
              $sql = "SELECT CATEGORYNAME FROM category";
              $result = mysql_query($sql);
              while ($row = mysql_fetch_array($result)) {
                echo "<option value='" . $row['CATEGORYNAME'] . "'>" . $row['CATEGORYNAME'] . "</option>";
              }
              echo "</select>";
            ?>
		    </span>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <span id="sub-category-div">
		      <label>Sub Category :</label>
			    <select name='sub-category' id='sub-category' >
			      <option value="0">Select</option>
			      <!--Displaying all the Sub-Categories from the database-->
		        <?php
              mysql_connect('localhost', 'lamp', '1');
              mysql_select_db('lamp_final_project');
              $sql = "SELECT SUBCATEGORYNAME FROM subcategory";
              $result = mysql_query($sql);
              while ($row = mysql_fetch_array($result)) {
                echo "<option value='" . $row['SUBCATEGORYNAME'] . "'>" . $row['SUBCATEGORYNAME'] . "</option>";
              }
              echo "</select>";
            ?>
		    </span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <span id="region-div">
			    <label>Region:</label> 
			    <select name='region' id="region-id">
			      <option value="0">Select</option>
			      <!--Displaying all the Regions from the database-->
			      <?php
              mysql_connect('localhost', 'lamp', '1');
              mysql_select_db('lamp_final_project');
              $sql = "SELECT REGIONNAME FROM region";
              $result = mysql_query($sql);
              while ($row = mysql_fetch_array($result)) {
                echo "<option value='" . $row['REGIONNAME'] . "'>" . $row['REGIONNAME'] . "</option>";
              }
              echo "</select>";
            ?>		
		    </span>	
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <span id="location-div">
			    <label>Location:</label> 
			    <select name='loc' id="location">
			      <option value="0">Select</option>
			      <!--Displaying all the location from the database-->
            <?php
              mysql_connect('localhost', 'lamp', '1');
              mysql_select_db('lamp_final_project');
              $sql = "SELECT LOCATIONNAME FROM location";
              $result = mysql_query($sql);
              while ($row = mysql_fetch_array($result)) {
                echo "<option value='" . $row['LOCATIONNAME'] . "'>" . $row['LOCATIONNAME'] . "</option>";
              }
              echo "</select>";
            ?>			
            &nbsp;&nbsp;&nbsp;
          <input id="btn" type="submit" value="Browse"></input>
		    </span>
		  </form>
		  <br>
	    <table border='1' width='100%'>
			  <thead/>
			  <tbody class="tab-body">
			  <tr class="tab-header">
				  <th>Title</th>
				  <th>Price in $</th>
					<th class='desc'>Desciption</th>
				  <th class='email'>Email</th>
				  <th class='category'>Category</th>
				  <th class='subcategory'>Sub-category</th>
				  <th class='loc'>Location</th>
				  <th class='region'>Region</th>
			  <tr>
			  <?php
				  mysql_connect("localhost", "lamp", "1") or die(mysql_error());   
					mysql_select_db("lamp_final_project") or die(mysql_error()); 
          $location = $_POST['loc'];	
				  $category = $_POST['category'];
   			  $region = $_POST['region'];
				  $subcategory=$_POST['sub-category'];
					switch($location)
					{
					  case "Mumbai":
						$location=1 ;
						break;
						case "Delhi":
						$location= 2;
						break;
						case "Chennai":
						$location=3 ;
						break;
						case "Norwich":
            $location= 4;
            break;
            case "Oxford":
            $location= 5;
            break;
            case "Durham":
            $location= 6;
            break;
            case "San Jose":
            $location= 7;
            break;
            case "Union City":
            $location= 8;
            break;
            case "Santa Clara":
            $location= 9;
            break;
				  }
          switch ($category) 
          {
            case "Housing":
            $category = 1;
            break;
            case "For Sale":
            $category = 2;
            break;
            case "Jobs":
            $category = 3;
            break;
            default:
            $category = 0;
            break;
          }
          switch ($subcategory) {
   				  case "Apartment":
   					$subcategory = 1;		
   				  break;
   				  case "Commercial":
   			    $subcategory = 2;
   				  break;
   				  case "Individual":
   					$subcategory = 3;
      			break;
					  case "Laptops":
   				  $subcategory = 4;
   				  break;
					  case "Mobiles":
   				  $subcategory = 5;
   				  break;
					  case "Video Game":
   				  $subcategory = 6;
   				  break;
   				  case "Finance":
   				  $subcategory = 7;
   				  break;
   				  case "Technical":
   				  $subcategory = 8;
   				  break;
					  case "Non-Technical":
   				  $subcategory = 9;
   				  break;
   				  default:
   				  $subcategory = 0;
   				  break;
					}
					switch ($region) {
   			    case "India":
   				  $region = 1;
					  $regionName="India";
   				  break;
   				  case "United Kingdom":
   				  $region = 2;
   				  $regionName="UK";
   				  break;
   				  case "United States":
   				  $region = 3;
   				  $regionName="USA";
   				  break;
   				  default:
   				  $region = 0;
   				  break;
   				}
						  //if All Post are to display - By Default/ is user selects select in all the selection list
			        if(!$region && !$category && !$subcategory &&!$location)
						  {
							  $query = mysql_query("SELECT TITLE, PRICE, DESCRIPTION,EMAIL,SUBCATEGORY_ID,LOCATION_ID FROM posts") or die(mysql_error());
							  $numrows = mysql_num_rows($query);
							  while ($row = mysql_fetch_array($query)) {
								  switch($row["LOCATION_ID"])
								  {
								    case 1:
								    $locationName="Mumbai";
								    $regionName="India";
								    break;
								    case 2:
								    $locationName="Delhi";
								    $regionName="India";
								    break;
								    case 3:
								    $locationName="Chennai";
								    $regionName="India";
								    break;
								    case 4:
								    $locationName="Norwich";
								    $regionName="United Kingdom";
								    break;
								    case 5:
								    $locationName="Oxford";
								    $regionName="United Kingdom";
								    break;
								    case 6:
								    $locationName="Durham";
								    $regionName="United Kingdom";
								    break;
								    case 7:
								    $locationName="San Jose";
								    $regionName="United States";
								    break;
								    case 8:
								    $locationName="Union City";
								    $regionName="United States";
								    break;
								    case 9:
								    $locationName="Santa Clara";
								    $regionName="United States";
								    break;
								  }	
							    switch ($row["SUBCATEGORY_ID"]) 
							    {
       							case 1:
							      $subcategoryName = "Apartment";
							      $categoryName = "Housing";
							      break;
       							case 2:
       								$subcategoryName = "Commercial";
								      $categoryName = "Housing";
       								break;
       							case 3:
       								$subcategoryName = "Individual";
								      $categoryName = "Housing";
       								break;
							      case 4:
       								$subcategoryName = "Laptops";
								      $categoryName = "For Sale";
       								break;
							      case 5:
       								$subcategoryName = "Mobiles";
								      $categoryName = "For Sale";
       								break;
							      case 6:
       								$subcategoryName = "Video Game";
								      $categoryName = "For Sale";
       								break;
       							case 7:
       								$subcategoryName = "Finance";
								      $categoryName = "Jobs";
       								break;
       							case 8:
       								$subcategoryName = "Technical";
								      $categoryName = "Jobs";
       								break;
							      case 9:
       								$subcategoryName = "Non-Technical";
								      $categoryName = "Jobs";
       								break;
   						    }	
						  echo "<tr><td>".$row["TITLE"]."</td><td>".$row["PRICE"]."</td><td>".$row["DESCRIPTION"]."</td><td>".$row["EMAIL"]."</td><td>".$categoryName."</td><td>".$subcategoryName."</td><td>".$locationName."</td><td>".$regionName."</td></tr>";	
							}
						}
					  if($category)
						  {
							  if($category == 1)
							  {
								
								  $query = mysql_query("SELECT P.TITLE, P.PRICE, P.DESCRIPTION, P.EMAIL,
													  P.LOCATION_ID,P.SUBCATEGORY_ID, C.CATEGORYNAME FROM posts AS P LEFT JOIN category AS C 
													  on P.SUBCATEGORY_ID = C.Category_ID 
													  WHERE P.SUBCATEGORY_ID <=3") or die(mysql_error());
							  }
							  if($category ==2)
							  {
								  $query = mysql_query("SELECT P.TITLE, P.PRICE, P.DESCRIPTION, P.EMAIL,
													  P.LOCATION_ID,P.SUBCATEGORY_ID, C.CATEGORYNAME FROM posts AS P LEFT JOIN category AS C 
													  on P.SUBCATEGORY_ID = C.Category_ID 
													  WHERE P.SUBCATEGORY_ID >=4 AND P.SUBCATEGORY_ID <=6") or die(mysql_error());
							  }
							  if($category ==3)
							  {
								  $query = mysql_query("SELECT P.TITLE, P.PRICE, P.DESCRIPTION, P.EMAIL,
													  P.LOCATION_ID,P.SUBCATEGORY_ID, C.CATEGORYNAME FROM posts AS P LEFT JOIN category AS C 
													  on P.SUBCATEGORY_ID = C.Category_ID 
													  WHERE P.SUBCATEGORY_ID >=7 AND P.SUBCATEGORY_ID <=9") or die(mysql_error());
							  }
							  $numrows = mysql_num_rows($query);
							  while ($row = mysql_fetch_array($query)) {
								  switch($row["LOCATION_ID"])
								  {
								    case 1:
								    $locationName="Mumbai";
								    $regionName="India";
								    break;
								    case 2:
								    $locationName="Delhi";
								    $regionName="India";
								    break;
								    case 3:
								    $locationName="Chennai";
								    $regionName="India";
								    break;
								    case 4:
								    $locationName="Norwich";
								    $regionName="United Kingdom";
								    break;
								    case 5:
								    $locationName="Oxford";
								    $regionName="United Kingdom";
								    break;
								    case 6:
								    $locationName="Durham";
								    $regionName="United Kingdom";
								    break;
								    case 7:
								    $locationName="San Jose";
								    $regionName="United States";
								    break;
								    case 8:
								    $locationName="Union City";
								    $regionName="United States";
								    break;
								    case 9:
								    $locationName="Santa Clara";
								    $regionName="United States";
								    break;
								  }	
							    switch ($row["SUBCATEGORY_ID"]) {
       							case 1:
							        $subcategoryName = "Apartment";
							        $categoryName = "Housing";
							        break;
       							case 2:
       								$subcategoryName = "Commercial";
								      $categoryName = "Housing";
       								break;
       							case 3:
       								$subcategoryName = "Individual";
								      $categoryName = "Housing";
       								break;
							      case 4:
       								$subcategoryName = "Laptops";
								      $categoryName = "For Sale";
       								break;
							      case 5:
       								$subcategoryName = "Mobiles";
								      $categoryName = "For Sale";
       								break;
							      case 6:
       								$subcategoryName = "Video Game";
								      $categoryName = "For Sale";
       								break;
       							case 7:
       								$subcategoryName = "Finance";
								      $categoryName = "Jobs";
       								break;
       							case 8:
       								$subcategoryName = "Technical";
								      $categoryName = "Jobs";
       								break;
							      case 9:
       								$subcategoryName = "Non-Technical";
								      $categoryName = "Jobs";
       								break;
   						   }
						  echo "<tr><td>".$row["TITLE"]."</td><td>".$row["PRICE"]."</td><td>".$row["DESCRIPTION"]."</td><td>".$row["EMAIL"]."</td><td>".$categoryName."</td><td>".$subcategoryName."</td><td>".$locationName."</td><td>".$regionName."</td></tr>";
							  }
						  }
						  //if browse by sub-category
						  if($subcategory)
						  {
							  $query = mysql_query("SELECT P.TITLE, P.PRICE, P.DESCRIPTION, P.EMAIL,
												P.LOCATION_ID,P.SUBCATEGORY_ID, C.CATEGORYNAME FROM posts AS P LEFT JOIN category AS C 
												on P.SUBCATEGORY_ID = C.Category_ID 
												WHERE P.SUBCATEGORY_ID = '$subcategory'") or die(mysql_error());
							  $numrows = mysql_num_rows($query);
							  while ($row = mysql_fetch_array($query)) {
								  switch($row["LOCATION_ID"])
								  {
								    case 1:
								    $locationName="Mumbai";
								    $regionName="India";
								    break;
								    case 2:
								    $locationName="Delhi";
								    $regionName="India";
								    break;
								    case 3:
								    $locationName="Chennai";
								    $regionName="India";
								    break;
								    case 4:
								    $locationName="Norwich";
								    $regionName="United Kingdom";
								    break;
								    case 5:
								    $locationName="Oxford";
								    $regionName="United Kingdom";
								    break;
								    case 6:
								    $locationName="Durham";
								    $regionName="United Kingdom";
								    break;
								    case 7:
								    $locationName="San Jose";
								    $regionName="United States";
								    break;
								    case 8:
								    $locationName="Union City";
								    $regionName="United States";
								    break;
								    case 9:
								    $locationName="Santa Clara";
								    $regionName="United States";
								    break;
								  }	
							    switch ($row["SUBCATEGORY_ID"]) {
       							case 1:
							        $subcategoryName = "Apartment";
							        $categoryName = "Housing";
							        break;
       							case 2:
       								$subcategoryName = "Commercial";
								      $categoryName = "Housing";
       								break;
       							case 3:
       								$subcategoryName = "Individual";
								      $categoryName = "Housing";
       								break;
							      case 4:
       								$subcategoryName = "Laptops";
								      $categoryName = "For Sale";
       								break;
							      case 5:
       								$subcategoryName = "Mobiles";
								      $categoryName = "For Sale";
       								break;
							      case 6:
       								$subcategoryName = "Video Game";
								      $categoryName = "For Sale";
       								break;
       							case 7:
       								$subcategoryName = "Finance";
								      $categoryName = "Jobs";
       								break;
       							case 8:
       								$subcategoryName = "Technical";
								      $categoryName = "Jobs";
       								break;
							      case 9:
       								$subcategoryName = "Non-Technical";
								      $categoryName = "Jobs";
       								break;
   						    }
						  echo "<tr><td>".$row["TITLE"]."</td><td>".$row["PRICE"]."</td><td>".$row["DESCRIPTION"]."</td><td>".$row["EMAIL"]."</td><td>".$categoryName."</td><td>".$subcategoryName."</td><td>".$locationName."</td><td>".$regionName."</td></tr>";	
							  }
						  }
						  //if browse by location
						  if($location)
						  {
							  $query = mysql_query("SELECT P.TITLE, P.PRICE, P.DESCRIPTION, P.EMAIL, P.LOCATION_ID, P.SUBCATEGORY_ID, 
													   L.LOCATIONNAME FROM posts AS P LEFT JOIN location AS L 
													  on P.LOCATION_ID = L.LOCATION_ID 
													  WHERE P.LOCATION_ID = '$location'") or die(mysql_error());				
							  $numrows = mysql_num_rows($query);
							  while ($row = mysql_fetch_array($query)) {
								  switch($row["LOCATION_ID"])
								  {
								    case 1:
								    $locationName="Mumbai";
								    $regionName="India";
								    break;
								    case 2:
								    $locationName="Delhi";
								    $regionName="India";
								    break;
								    case 3:
								    $locationName="Chennai";
								    $regionName="India";
								    break;
								    case 4:
								    $locationName="Norwich";
								    $regionName="United Kingdom";
								    break;
								    case 5:
								    $locationName="Oxford";
								    $regionName="United Kingdom";
								    break;
								    case 6:
								    $locationName="Durham";
								    $regionName="United Kingdom";
								    break;
								    case 7:
								    $locationName="San Jose";
								    $regionName="United States";
								    break;
								    case 8:
								    $locationName="Union City";
								    $regionName="United States";
								    break;
								    case 9:
								    $locationName="Santa Clara";
								    $regionName="United States";
								    break;
								  }
							    switch ($row["SUBCATEGORY_ID"]) {
   							    case 1:
							        $subcategoryName = "Apartment";
							        $categoryName = "Housing";
							        break;
       							case 2:
       								$subcategoryName = "Commercial";
								      $categoryName = "Housing";
       								break;
       							case 3:
       								$subcategoryName = "Individual";
								      $categoryName = "Housing";
       								break;
							      case 4:
       								$subcategoryName = "Laptops";
								      $categoryName = "For Sale";
       								break;
							      case 5:
       								$subcategoryName = "Mobiles";
								      $categoryName = "For Sale";
       								break;
							      case 6:
       								$subcategoryName = "Video Game";
								      $categoryName = "For Sale";
       								break;
       							case 7:
       								$subcategoryName = "Finance";
								      $categoryName = "Jobs";
       								break;
       							case 8:
       								$subcategoryName = "Technical";
								      $categoryName = "Jobs";
       								break;
							      case 9:
       								$subcategoryName = "Non-Technical";
								      $categoryName = "Jobs";
       								break;
   						    }
						  echo "<tr><td>".$row["TITLE"]."</td><td>".$row["PRICE"]."</td><td>".$row["DESCRIPTION"]."</td><td>".$row["EMAIL"]."</td><td>".$categoryName."</td><td>".$subcategoryName."</td><td>".$locationName."</td><td>".$regionName."</td></tr>";
							  }
						  }
						  //if browse by region
						  if($region)
						  {
							  if($region == 1)
							  {
								  $query = mysql_query("SELECT P.TITLE, P.PRICE, P.DESCRIPTION, P.EMAIL, P.LOCATION_ID, P.SUBCATEGORY_ID, 
													   L.LOCATIONNAME FROM posts AS P LEFT JOIN location AS L 
													  on P.LOCATION_ID = L.LOCATION_ID 
													  WHERE P.LOCATION_ID <= 3") or die(mysql_error());
							  }
							  if($region == 2)
							  {
								  $query = mysql_query("SELECT P.TITLE, P.PRICE, P.DESCRIPTION, P.EMAIL, P.LOCATION_ID, P.SUBCATEGORY_ID, 
													   L.LOCATIONNAME FROM posts AS P LEFT JOIN location AS L 
													  on P.LOCATION_ID = L.LOCATION_ID 
													  WHERE P.LOCATION_ID >= 4 AND P.LOCATION_ID <= 6") or die(mysql_error());
							  }
							  if($region == 3)
							  {
								  $query = mysql_query("SELECT P.TITLE, P.PRICE, P.DESCRIPTION, P.EMAIL, P.LOCATION_ID, P.SUBCATEGORY_ID, 
													   L.LOCATIONNAME FROM posts AS P LEFT JOIN location AS L 
													  on P.LOCATION_ID = L.LOCATION_ID 
													  WHERE P.LOCATION_ID >= 7 AND P.LOCATION_ID <= 9") or die(mysql_error());
							  }
							  $numrows = mysql_num_rows($query);
							  while ($row = mysql_fetch_array($query)) {
								  switch($row["LOCATION_ID"])
								  {
									  case 1:
								    $locationName="Mumbai";
								    $regionName="India";
								    break;
								    case 2:
								    $locationName="Delhi";
								    $regionName="India";
								    break;
								    case 3:
								    $locationName="Chennai";
								    $regionName="India";
								    break;
								    case 4:
								    $locationName="Norwich";
								    $regionName="United Kingdom";
								    break;
								    case 5:
								    $locationName="Oxford";
								    $regionName="United Kingdom";
								    break;
								    case 6:
								    $locationName="Durham";
								    $regionName="United Kingdom";
								    break;
								    case 7:
								    $locationName="San Jose";
								    $regionName="United States";
								    break;
								    case 8:
								    $locationName="Union City";
								    $regionName="United States";
								    break;
								    case 9:
								    $locationName="Santa Clara";
								    $regionName="United States";
								    break;
								  }	
							    switch ($row["SUBCATEGORY_ID"]) {
   							    case 1:
							        $subcategoryName = "Apartment";
							        $categoryName = "Housing";
							        break;
       							case 2:
       								$subcategoryName = "Commercial";
								      $categoryName = "Housing";
       								break;
       							case 3:
       								$subcategoryName = "Individual";
								      $categoryName = "Housing";
       								break;
							      case 4:
       								$subcategoryName = "Laptops";
								      $categoryName = "For Sale";
       								break;
							      case 5:
       								$subcategoryName = "Mobiles";
								      $categoryName = "For Sale";
       								break;
							      case 6:
       								$subcategoryName = "Video Game";
								      $categoryName = "For Sale";
       								break;
       							case 7:
       								$subcategoryName = "Finance";
								      $categoryName = "Jobs";
       								break;
       							case 8:
       								$subcategoryName = "Technical";
								      $categoryName = "Jobs";
       								break;
							      case 9:
       								$subcategoryName = "Non-Technical";
								      $categoryName = "Jobs";
       								break;
   					    	}
						  echo "<tr><td>".$row["TITLE"]."</td><td>".$row["PRICE"]."</td><td>".$row["DESCRIPTION"]."</td><td>".$row["EMAIL"]."</td><td>".$categoryName."</td><td>".$subcategoryName."</td><td>".$locationName."</td><td>".$regionName."</td></tr>";
					    }
				    }
			  ?>
	    </tbody>
    </table>	
    <?php
    include 'footer.php';
    ?>  
	</body>	
	
	<?php } else {
		//Redirect to Login Page if user is not authenticated
	  echo "<script type='text/javascript'>", 
		"window.location.href='login.php' ;",
	  "</script>";
	  }
	?>	
</html>
