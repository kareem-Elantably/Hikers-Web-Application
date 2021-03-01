<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="layout/css/checkout.css">
		
	 <link rel="stylesheet" href="layout/css/nav-bar.css">
	 <link rel="stylesheet" href="layout/css/footer.css">
<style>

.header{
 
  margin-left:0px;

}
</style>
</head>
<body>
<body class="header"style="background-color:grey;">

	<?php include("chaticon.php"); ?>
            <div class="overlay">
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
                                        <li><a href="trips.php">Trips</a></li>
                                      </ul>
									  
									   <ul class="nav navbar-nav navbar-right" >
									   
                     <?php
                   
				if(isset($_SESSION['ID'])) 
				{
          echo '  
          
                      <li><a href="login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li>
                      <li><a href="myGroups.php"> My Groups</a></li>
                      <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
                      <li><a href="myTrips.php"> My Trips</a></li>
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
                         


<br>




<div class="row">
  <div class="col-25">
    <div class="container">


    <?php
try{
     require('login/db.php');?>
  <?php
$P_SUM=0;

$sql="select * from cart where userID='".$_SESSION["ID"]."'";
$result= mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
  {

    $cartNo = mysqli_query($conn,"SELECT count(productID) as TOTAL from cart where userID='".$_SESSION["ID"]."'");
    $Number = mysqli_fetch_array($cartNo);
    $P_TOTAL=$Number['TOTAL'];
    echo'<h4>Your orders <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>'.$P_TOTAL.'</b></span></h4>';
      while($row = $result->fetch_assoc()) 
      {
        $pid = $row["productID"];
		
		
        $sql="select * from products where ID='$pid'";
$query= mysqli_query($conn,$sql);
$check = mysqli_fetch_array($query);
$price=$check["price"]* $row["quantity"];
echo'<p> <img src="layout/photos/'.$check['imgName'].'" width="60" height="60"> 
<a href="http://localhost/hikers/buyProduct.php?productID='.$pid.'">'.$check["name"].'</a> <span class="price">'.$price.' LE</span> <br><span class="Quantity">Quantity:'.$row["quantity"].'</span></p>

';

$cartSum = mysqli_query($conn,"SELECT sum(sum) as summ from cart where userID='".$_SESSION["ID"]."'");
    $summition = mysqli_fetch_array($cartSum);
	  $P_SUM=$summition['summ'];
      }
    }
    
      echo'
      <hr>
      <p>Total <span class="price" style="color:black"><b>'.$P_SUM .' LE</b></span></p>
    
  ';
}catch(exception $e){

  echo'Message: an error has occured';
  

}
  ?>

<?php
try{
if(isset($_POST['order']))
$sql="insert into address (userID,fullname,email,phone,city,address,street,building,floor)values('".$_SESSION['ID']."','".$_POST['fullname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['city']."','".$_POST['address']."','".$_POST['street']."','".$_POST['building']."','".$_POST['floor']."');";
$query= mysqli_query($conn,$sql);
{



}
}catch(exception $e){

  echo'Message: an error has occured';
  

}
?>

  </div>
  </div>
  <div class="col-75">
    <div class="container">
      <form action="" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text"  id="fname" name="fullname"  placeholder="Full name" required="true" pattern="[A-Za-z\s+]{3,10}" title="Please enter a valid Name.">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter a valid email.">
            <label for="phone"><i class="fa fa-phone"></i> Phone</label>
            <input type="text" id="phone" name="phone" placeholder="01*********" required="true" pattern="[0-9]{11}" title="Please enter a valid phone number.">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Cairo">
            <label for="adr"><i class="fa fa-address-card-o"></i> Area </label>
            <input type="text" id="adr" name="address" placeholder="Nasr city,elzamalek.." required="true" pattern="[A-Za-z\s+]{1,100}" title="Please enter a valid addres.">
            <label for="str"><i class="fa fa-road"></i> Street</label>
            <input type="text" id="str" name="street" placeholder="Mostafa elnahas.." required="true" pattern="[A-Za-z\s+]{1,100}" title="Please enter a valid Street Name.">
            <label for="bld"><i class="fa fa-building"></i> Building No</label>
            <input type="text" class="a" id="bld" name="building" placeholder="1,2.." required="true" pattern="[0-9]{1,10}" title="Please enter a valid building number.">
            <label for="floor"> Floor No</label>
            <input type="text" class="a" id="floor" name="floor" placeholder="1,2.." required="true" pattern="[0-9]{1,10}" title="Please enter a valid floor number.">
            
           
         

          
            <h3>Payment</h3>
            <label>
          <input type="checkbox" checked="checked" name="sameadr"> Cash on delivery
        </label>
        
            
          </div>
          
        </div>
        
        <input type="submit" name="order" value="Order" class="btn">
      </form>
    </div>
  </div>

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
