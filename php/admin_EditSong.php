<?php
include 'dbconnect.php';
#include '../homepage.php';
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$key = $_GET["songId"];
//echo $key;
$sql = "select * FROM songs where song_id= '$key'";
//echo $sql;
$songID = "";
$price = "";
$genre = "";
$yr="";
$qty="";
$description ="";
$type ="";
$img_id ="";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		
		$songID = $row["song_id"];
		//echo $songID;
		// 
				$title = $row["title"];
				$price = $row["price"];
				$genre = $row["genre"];
				$rating = $row["rating"];
				$yr = $row["yr"];
				$qty = $row["qty"];
				$description = $row["description"];
				$type = $row["type"];
				$img_id = $row["img_id"];
		
		
		}
		}
		$conn->close();
		?>
		
	
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Edit Songs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  <script src="js/adminFunctions.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../adminpage.php">Home</a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#"></a></p>
      <p><a href="admin_AddSong.php">Add Song</a></p>
     
    </div>
    <div class="col-sm-8 text-left">
	<form action="admin_updateSong.php" method="post" enctype="multipart/form-data">
	<div class="form-group row">
  	<label for="songId" class="col-xs-2 col-form-label">Song Id</label>
  	<div class="col-xs-10">
    <input class="form-control" type="text" value='<?php echo $songID ?>' name="songId" readonly>
  	</div>
	</div>
	<div class="form-group row">
  	<label for="title" class="col-xs-2 col-form-label">Title</label>
  	<div class="col-xs-10">
    <input class="form-control" type="text" value='<?php echo $title ?>' name="title">
  	</div>
	</div>
	<div class="form-group row">
	  <label for="price" class="col-xs-2 col-form-label">Price</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" value='<?php echo $price ?>' name="price">
	  </div>
	</div>
	<div class="form-group row">
	  <label for="genre" class="col-xs-2 col-form-label">Genre</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text"  value='<?php echo $genre ?>' name="genre" placeholder="Rock,Classic,Alternative,Pop">
	  </div>
	</div>
		<div class="form-group row">
	  <label for="rating" class="col-xs-2 col-form-label">Rating</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text"  value='<?php echo $rating ?>' name="rating">
	  </div>
	</div>
		<div class="form-group row">
	  <label for="year" class="col-xs-2 col-form-label">Year</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text" value='<?php echo $yr ?>' name="year">
	  </div>
	</div>
		<div class="form-group row">
	  <label for="quantity" class="col-xs-2 col-form-label">Quantity</label>
	  <div class="col-xs-10">
	    <input class="form-control" type="text"  value='<?php echo $qty ?>' name="quantity">
	  </div>
	</div>
		<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" rows="3"><?php echo $description ?></textarea>
  </div>
		<div class="form-group">
    <label for="type">Type</label>
    <select class="form-control" name="type" value='<?php echo $type ?>'>
      <option>DVD</option>
      <option>CD</option>
      <option>Blu Ray</option>
     </select>
  </div>
  

  
   <button type="submit" class="btn btn-primary">Submit</button>	
  
     </form>   
    
    </div>
    <div class="col-sm-2 sidenav">
      
      </div>
    </div>
  </div>
</div>



</body>
</html>

