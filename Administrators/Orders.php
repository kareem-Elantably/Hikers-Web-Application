<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="../layout/css/groups.css">
	
	 <link rel="stylesheet" href="../layout/css/nav-bar.css">
	 <link rel="stylesheet" href="../layout/css/footer.css">
	<style>
	
.header{
    background: none;
  background-color:grey;
  margin-left: 200px;
}



	</style>
</head>
<body class="header" style="background-color:grey;">

	
           
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
                                <a class="navbar-brand" >HIKERS</a>
                            </div>
                          
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <div class="col-lg-8">
                                      <ul class="nav navbar-nav nav-links">
                                        
                                        <li><a  href="http://localhost/hikers/login/profile.php?prof=0">Profile</a></li>
                                        
                                        <li><a href="admins.php">Admins</a></li>
                                        <li><a href="adminTrips.php">Trips</a></li>
                                        <li><a href="adminUsers.php">Users</a></li>
                                        <li><a href="adminProducts.php">Products</a></li>
                                        <li><a href="http://localhost/hikers/history.php?userID=<?php echo''.$_SESSION['ID'].'';?>">Message History</a></li>

                                      </ul>
                                     
                                      <ul class="nav navbar-nav navbar-right">
                     
                      <li><a href="../login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li>
                    </ul>
                                    </div>
                                    
                               
                              
                            </div>
                         
  </div>
               </div>
                 </div>
             
                
            </div>
			
			
        
 <div class="col-75">
    <div class="container">
      <form action="" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Order Checking</h3>
            <label for="fname">Order ID</label>
            <input type="text"  id="orderid" name="order" placeholder="Order ID">
            <input type="submit" name="check" value="Check" class="btn">
  
            
          </div>
          
        </div>
        
        
      </form>
    </div>
  </div>

<?php require('../login/db.php');

if (isset($_POST['check'])) {


  $Idd=$_POST['order'];

  $sql= "SELECT * FROM `address` WHERE orderID='$Idd'";

  $result = mysqli_query($conn, $sql) or die(mysql_error());


  if ($result->num_rows > 0) 
  {
     while($row = $result->fetch_assoc()) 
      {


        echo '
        
              <form action="" method="post">
              <label name="orderID" >order ID :</label>
              <label name="orderID" value="'.$row["orderID"].'">'.$row["orderID"].'</label><br>


              <label name="fullName" >Full Name:</label>
              <label name="fullName" value="'.$row["fullname"].'">'.$row["fullname"].'</label><br>

              <label name="email" >Email :</label>
              <label name="email" value="'.$row["email"].'">'.$row["email"].'</label><br>

              <label name="phone" >phone:</label>
              <label name="phone" value="'.$row["phone"].'">'.$row["phone"].'</label><br>

              <label name="city" >city:</label>
              <label name="city" value="'.$row["city"].'">'.$row["city"].'</label><br>

              <label name="address" >address:</label>
              <label name="address" value="'.$row["address"].'">'.$row["address"].'</label><br>

              <label name="street" >street :</label>
              <label name="street" value="'.$row["street"].'">'.$row["street"].'</label><br>

              <label name="building" >building:</label>
              <label name="building" value="'.$row["building"].'">'.$row["building"].'</label><br>

              <label name="floor" >floor:</label>
              <label name="floor" value="'.$row["floor"].'">'.$row["floor"].'</label><br>
              
              
          ';
       
        
        $query="SELECT * FROM cart WHERE userID='".$row["userID"]."'   ";
         $res = mysqli_query($conn, $query) or die(mysql_error());
         while($ro = $res->fetch_assoc()){

         	$queryy="SELECT * FROM products WHERE ID='".$ro["productID"]."'   ";
         	$r = mysqli_query($conn, $queryy) or die(mysql_error());

         	while($rw = $r->fetch_assoc()){
         		echo' 
         		<div class="row">
         		<div class="column">
         				<div class"card">
         				  <img src="../layout/photos/'.$rw['imgName'].'" width="100" height="100"> 
         					<div class"contain">
         						<h2>'.$rw["name"].'</h2>
         						<p>Price/Piece : '.$rw["price"].' egp</p>
         						<p>quantity: '.$ro["quantity"].'</p>
         						<p>Total : '.$ro["sum"].' egp</p>
         					</div>
         				  </div>
         				  </div>';



         	}

         }


      }
      echo"</form>
      </div>
      </div>";

  }
  else {
    echo "0 results";
  }
}



?>











<section>
  <footer class="row">
  
<div class="container">
<hr>
    <div class="sozial col-xs-12 col-sm-6 col-sm-push-6">
      <ul class="row">
        <li class="col-xs-6 col-sm-2">
          <a href="#">
            <img class="logo" src="https://i.pinimg.com/originals/b7/63/69/b763699fd1fa3bfb374442593ae642e1.png" width="60" height="50">
          </a>

        </li>
        
        <li class="col-xs-6 col-sm-2">
          <a href="#">
            <img class="logo" src="https://i.pinimg.com/originals/63/9b/3d/639b3dafb544d6f061fcddd2d6686ddb.png" width="60" height="100">
          </a>
        </li>
        
      </ul>
    </div>
    
    <div class="copyright col-xs-12 col-sm-3 col-sm-pull-6">
      <p> © 2013 Hikers.com.  All rights reserved.</p>
    </div>
    
    <div class="impressum col-xs-12 col-sm-3 col-sm-pull-6">
      <p> text</p>
      <p> text </p>
    </div>
  </div>

  </footer>
</section>

</body>
</html>
