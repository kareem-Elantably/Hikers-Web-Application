<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="layout/css/groups.css">
	
	 <link rel="stylesheet" href="layout/css/nav-bar.css">
	 <link rel="stylesheet" href="layout/css/footer.css">
	<style>
	
.header{
    background: none;
  background-color:grey;
  margin-left: 20px;
}


.new {
  border: 1px solid rgba(255, 255, 255, 1);
  background: grey;
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
  &:hover {
    background: rgba(0, 0, 0);
    padding: 10px 80px;
  }
}

.new:hover {
	background-color: black;
  opacity: 0.7;

}


.inputFields {
  margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  width: 250px;
  border: 1px solid rgba(255, 255, 255, 1);
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(20, 20, 20, .2);
  color: white;
  outline: none;
}



.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: grey;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
	background-color: black; color:white;}

.dropdown:hover .dropdown-content {
  display: block;
}



	</style>

</head>
<body style="background-color:grey;" class="header";>

        
            <?php require('login/db.php');?>

	<?php include("nav-bar.php");  ?>
           
             
			

<form class="form-inline md-form mr-auto mb-4" method="GET" action="" >
  <input class="inputFields" type="text" placeholder="Search"  name="s">
  <input class="new"  type="submit" value="Search">
</form>
<br>


<div class="row">


<form action="join.php" method="get">





 <?php

  

  $sql = "Select * from groups";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) 
  {
    

      while($row = $result->fetch_assoc()) 
      {  
	  
	  if(isset($_GET['s'])){
	
$query = "SELECT * FROM groups WHERE name LIKE '%".$_GET['s']."%'";
$result = mysqli_query($conn,$query);
if(!$result){
	var_dump($result,$_GET['s']);
	echo "<br>There's no records that matches your search input";
	exit;
}

	  ?>
<div class="row" >

	<?php
		while($row = $result -> fetch_array(MYSQLI_ASSOC)) {             
		   {
	  
	    echo '<div class="column">
        <div class="card">
          <img src="layout/photos/'.$row['imgName'].'" width="300" height="300"> 
            <div class="contain">
              <h2>'.$row["name"].'</h2>
              <p>Rated: '.$row["rating"].'/5 Stars</p>
              <p>Located in: '.$row["location"].'</p>
              <p><button  class="new-btn" name="groupID" value="'.$row["ID"].'">Join</button></p>
            </div>
          </div>
        </div>';
	  
	  
	  
	     }
			 
			 
		 
	
	
		  
		}   
} 
	
	  
	  else {
        echo '<div class="column">
        <div class="card">
          <img src="layout/photos/'.$row['imgName'].'" width="300" height="300"> 
            <div class="contain">
              <h2>'.$row["name"].'</h2>
              <p>Rated: '.$row["rating"].'/5 Stars</p>
              <p>Located in: '.$row["location"].'</p>
              <p><button  class="new-btn" name="groupID" value="'.$row["ID"].'">Join</button></p>
            </div>
          </div>
        </div>';
       } 
        
      }
      echo"</div>";
  } 
  else {
      echo "<center><h2>No groups yet</h2></center>";
  }
  
$conn->close();
  ?>

  </form>
  </div>




<section>
  <footer class="row">
  
<div class="container">
<hr>
    <div class="sozial col-xs-12 col-sm-6 col-sm-push-6">
      <ul class="row">
        <li class="col-xs-6 col-sm-2">
          <a href="#">
            <img class="logo" src="https://i.pinimg.com/originals/b7/63/69/b763699fd1fa3bfb374442593ae642e1.png">
          </a>

        </li>
        
        <li class="col-xs-6 col-sm-2">
          <a href="#">
            <img class="logo" src="https://i.pinimg.com/originals/63/9b/3d/639b3dafb544d6f061fcddd2d6686ddb.png">
          </a>
        </li>
        
      </ul>
    </div>
   
    <div class="copyright col-xs-12 col-sm-3 col-sm-pull-6">
      <p> Copyright Reserverd<b> @MIU Hikers 2021</b></p>
    </div>
    
  </div>

  </footer>
</section>

</body>
</html>
