<?php session_start();?>
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
  
  margin-left:10px;
  }
  .new-btn {
  border: 1px solid rgba(255, 255, 255, 1);
  background: grey;
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
 
}
.new-btn:hover {
	background-color: black;
  opacity: 0.7;

}

.select-box {
  position: relative;
  width: 5%;
  margin: 0 auto;
  font-family: 'Open Sans', 'Helvetica Neue', 'Segoe UI', 'Calibri', 'Arial', sans-serif;
  font-size: 18px;
  color: white;
  background-color:grey;
}



</style>
</head>
<body class="header">




	<?php include("chaticon.php"); ?>

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
									   <ul class="nav navbar-nav navbar-right">
                     <?php
                    
                    if(isset($_SESSION['ID'])) 
                    {
                     
                      echo'
                     
                     
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
                    ?>
    </ul>
                                    </div>
                                    
                               
                              
                            </div>
                         
  </div>
               </div>
                 </div>



<div class="row">
<?php require('login/db.php');?>
<?php
//require('nav-bar.php');


$pID= $_GET['productID'];


try{

$sql= "Select * from products WHERE ID = '$pID' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);

}catch(exception $e){

  echo'Message: an error has occured';
  

}

if(isset($check))
                  {   
                    $name= $check['name'];
                    $des = $check['description'];
                    $price=$check['price'];
                    $rate = $check['rating'];
					
					
               
                echo'  <img src="layout/photos/'.$check['imgName'].'" width="1000" height="328" position="center">';
                 //echo'   <img src="../layout/photos/'.$check['imgName'].' alt="" >'; 
                    echo ' 
                                        <h2> '.$name.'</h2>
                    <h3>Group Description</h3>
                    <p>  '.$des.' <br></p>
                    <h3>Price: '.$price.' <br></h3>
                    <h3>Rating: <p> '.$rate.'/5</p></h3>
					
		
                   
                   
                   ';
                  
                }
                else{
                    echo '<h2> please select the equipment you need </h2>';
                }
?>
                <form method="post" action="">
	          
			
             <label for="quantity">Qantity:</label>    <select name="quantity"   class="select-box" id="quantity" >
                   <option value="1" selected>1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
				   <option value="5">5</option>
                   <option value="6">6</option>
                   <option value="7">7</option>
				   <option value="8">8</option>
                   <option value="9">9</option>
				   <option value="10">10</option>
                   
                   
                 </select>
                <h3>	<button type="submit" class="new-btn" name="submit" value="Add to cart">Add to cart</button></h3>
                
                </form> 
                
                <form method="get" action="rating.php">
                <?php
                echo'
                <h3><button  class="new-btn" name="productID" value="'.$pID.'">Rating</button></h3>
                ';
                ?>
                </form> 
                </div>
<?php
if(isset($_SESSION['ID']))
{
if(isset($_POST['submit']))
{
	
	   $quantity =$_POST['quantity'];
	   $sum =$check['price']*$_POST['quantity'];
  $query    = "SELECT * FROM `cart` WHERE productID='$pID'
  AND userID='".$_SESSION['ID']."'";
   $repeted = mysqli_query($conn, $query);
   if ($repeted->num_rows > 0)
   {
    

    echo  '<script>
     alert("Item is already in your cart")
     window.location.href="productPage.php";
     </script>';

   }
   else{
  $query=  "INSERT into `cart` (userID, productID,quantity,sum)
  VALUES ('".$_SESSION['ID']."', '".$pID."', ".$quantity.",".$sum.")";

  $result = mysqli_query($conn,$query);
  echo  '<script>
  alert("Item is added to your cart")
  window.location.href="productPage.php";
  </script>';
 
}
}
} else
{
 
  echo'<script>
alert("Please login")
window.location.href="login/login.php";
</script>';
}


?> 

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