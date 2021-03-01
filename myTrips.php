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
  margin-left: 30px;
}




	</style>
</head>
<body style="background-color:grey;">
	<?php include("chaticon.php"); ?>
<section class="header">
           
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
                                         
                                        <li><a href="http://localhost/hikers/login/profile.php?prof=0">Profile</a></li>
                                        <li><a href="groups.php">Groups</a></li>
                                        <li><a href="productPage.php">Shop</a></li>

                                      </ul>
                                     
                                      <ul class="nav navbar-nav navbar-right">
                     <?php
                    
                    if(isset($_SESSION['ID'])) 
                    {
                     
                      echo'
                     
                      <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
                      <li><a href="login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li>
                      <li><a href="myGroups.php"> My Groups</a></li>
                        ';
                      
                    }
                    else
                    {
                    echo'       
                    <li><a href="login/registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                    }
                    ?>
    </ul>
                                    </div>
                                    
                               
                              
                            </div>
                         
  </div>
               </div>
                 </div>
             
                
            </div>
			
			
        


            <?php require('login/db.php');?>


<div class="row">



<form action="" method="post">
 <?php

  

$sql="SELECT * FROM `trip-user` where userID='".$_SESSION["ID"]."'";
$result= mysqli_query($conn,$sql);

 
  

  if ($result->num_rows > 0) 
  {
    
   
      while($row = $result->fetch_assoc()) 
      {

        $tid = $row["tripID"];
        $sql="select * from trips where ID='$tid'";
    $query= mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($query);
    
        echo '<div class="column">
        <div class="card">
          <img src="layout/photos/'.$check['tripImg'].'" width="300" height="300"> 
            <div class="contain">
              <h2>'.$check["location"].'</h2>
              <p>Price: '.$check["fees"].' L.E</p>
              <p>Located in: '.$check["distance"].' Km</p>
              <p><button class="new-btn" name="unjoin" value="'.$check["ID"].'">Unjoin</button></p>
            </div>
          </div>
        </div>';
       
        if(isset($_POST['unjoin']))
        {
          $sql="DELETE FROM `trip-user` where userID='".$_SESSION["ID"]."' and tripID='".$_POST["unjoin"]."'";
          $result= mysqli_query($conn,$sql);
          if($result)
          {
            mysqli_close($conn); 
            echo  '<script>
   window.location.href="myTrips.php";
   </script>';  
            exit;
        
          }
        
        }   
        }}
        else { echo  '<script> alert("You are not listed on any trip")
            window.location.href="trips.php";
            
            </script>';}
        
              echo"</form>";
              
              
        ?>

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