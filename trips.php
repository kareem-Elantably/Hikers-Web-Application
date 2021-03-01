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
  margin-left:30px;
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


	</style>
</head>
<body style="background-color:grey;" class="header">
<section>
           
                <div class="row">
                   <div class="navbar navbar-default">
                      <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                            <div class="navlogo col-lg-2">
                                <a class="navbar-brand" href="home.php">HIKERS</a>
                            </div>
                          
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                          
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <div class="col-lg-8">
                                      <ul class="nav navbar-nav nav-links">
                                      <?php
                    
                                        if(isset($_SESSION['ID'])) 
                                         {                 
                                        echo'        <li><a href="http://localhost/hikers/login/profile.php?prof=0">Profile</a></li>';
                                         }?>  
                                        <li><a href="groups.php">Groups</a></li>
                                        <li><a href="productPage.php">Shop</a></li>

                                      </ul>
                                     
                                      <ul class="nav navbar-nav navbar-right">
                     <?php
                    try{
                    if(isset($_SESSION['ID'])) 
                    {
                      include("chaticon.php");
                      echo'
                     
                      <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
                      <li><a href="login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li>
                      <li><a href="myGroups.php"> My Groups</a></li>
                      <li><a href="myTrips.php"> My Trips</a></li>
                        ';
                      
                    }
                    else
                    {
                    echo'       
                    <li><a href="login/registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                    }
                  }catch(exception $e){

  echo'Message: an error has occured';
  

}
                    ?>
    </ul>
                                    </div>
                                    
                               
                              
                            </div>
                         
  </div>
               </div>
                 </div>
             
                
            </div>
			
			
        


<?php require('login/db.php');
       
?>
<form class="form-inline md-form mr-auto mb-4" method="GET" action="" >
  <input class="inputFields" type="text" placeholder="Search"  name="s">
  <input class="new"  type="submit" value="Search">
</form>
<br>

<div class="row">



<form action="joinTrips.php" method="get">

 <?php

  try{

  $sql = "Select * from trips";
  $result = $conn->query($sql);
  

 if ($result->num_rows > 0) 
  {
    

      while($row = $result->fetch_assoc()) 
      {  
	  
	  if(isset($_GET['s'])){
	
$query = "SELECT * FROM trips WHERE location LIKE '%".$_GET['s']."%'";
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
          <img src="layout/photos/'.$row['tripImg'].'" width="300" height="300"> 
            <div class="contain">
              <h2>'.$row["location"].'</h2>
              
              <p>Fees: '.$row["fees"].' L.E</p>
              <p>Distance in: '.$row["distance"].'</p>
              <p><button  class="new-btn" name="tripID" value="'.$row["ID"].'">Join</button></p>
            </div>
          </div>
        </div>';
       
	  
	  
	  
	     }
			 
			 
		 
	
	
		  
		}   
} 
	
	  
	  else {
		  
        echo '<div class="column">
        <div class="card">
          <img src="layout/photos/'.$row['tripImg'].'" width="300" height="300"> 
            <div class="contain">
              <h2>'.$row["location"].'</h2>
              <p>Fees: '.$row["fees"].' L.E</p>
              <p>Distance in: '.$row["distance"].'</p>
              <p><button  class="new-btn" name="tripID" value="'.$row["ID"].'">Join</button></p>
            </div>
          </div>
        </div>';
       
	  }
      }
      echo"</div>";
  } 
  else {
      echo "<center><h2>No trips yet</h2></center>";
  }
}catch(exception $e){

  echo'Message: an error has occured';
  

}
  
  ?>


 


 
  </form>
  </div>
  </section>



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
