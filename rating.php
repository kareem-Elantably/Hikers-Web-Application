<?php session_start();?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
  </head>
       <link rel="stylesheet" href="layout/css/rating.css">
	
	 <link rel="stylesheet" href="layout/css/nav-bar.css">
	 <link rel="stylesheet" href="layout/css/footer.css">



<style>
.header{
    background: none;
background-color:grey;
  margin-left: 50px;
}

div {

  background-color: grey;
}
.rating-block {
	 background-color: grey;
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
</style>


</head>
<body class="header" style= "background-color:grey">
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
                    ?>
    </ul>
    </div>
                                
    </div>
                         
    </div>
    </div>
   </div>
             
                
  </div>

 
 <?php require('login/db.php');?>
   
  
  <?php

if(isset($_GET['productID']))
  {
    $pID= $_GET['productID'];

    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from rating_system where productID='$pID'");
    $row = mysqli_fetch_array($query);
    $P_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from rating_system where productID='$pID' and rating='1'");
    $row = mysqli_fetch_array($query);
    $one_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from rating_system where productID='$pID'and rating='2'");
    $row = mysqli_fetch_array($query);
    $two_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from rating_system where productID='$pID'and rating='3'");
    $row = mysqli_fetch_array($query);
    $three_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from rating_system where productID='$pID'and rating='4'");
    $row = mysqli_fetch_array($query);
    $four_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from rating_system where productID='$pID'and rating='5'");
    $row = mysqli_fetch_array($query);
    $five_TOTAL=$row['TOTAL'];


 $sql= "Select * from products WHERE ID = '$pID' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);

$query = mysqli_query($conn,"SELECT AVG(rating) as AVGRATE from rating_system where productID='$pID'");
            $row = mysqli_fetch_array($query);
            $P_AVGRATE=$row['AVGRATE'];

if(isset($check))
                  {     $rate = $check['rating'];
				     $rate = $check['rating'];
			 echo' <div class="container">
    			
		<div class="row" >			
          <div class="col-sm-4">
			<div class="rating-block">
			 <h4> The total number of reviews:</h4>
			  <h2 class="bold padding-bottom-7"> '.$P_TOTAL.' reviews</h2>



			<h4>Average user rating:</h4>	 
			<h2 class="bold padding-bottom-7"> '.intval($P_AVGRATE).'<small style="color:white"> /5</small></h2>
			<input id="rate" name="rate" disabled class="rating rating-loading" value="'.$P_AVGRATE.'"  data-max="5" data-step="1" data-size="xs">
				</div></div>
				';
				 }
			

echo'<div class="col-sm-3">	
<br><br>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$one_TOTAL.'</div>
				</div>
			';
echo'<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$two_TOTAL.'</div>
					</div>';
echo' 	<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$three_TOTAL.'</div>
				</div>';
echo'<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$four_TOTAL.'</div>
				</div>
				';
echo'<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$five_TOTAL.'</div>
				</div>
				
				
					</div>			
		</div></div></div>';?>
			
<br><br><br>

<div class="row" style= "background-color:grey">
<form  method ="POST" action="">
  <div class="rate">
  <div class="container">
  <table>
  <tr> 

   
    <td> <input id="rate" name="rate" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="1" data-size="xs"></td>

   
</div>

  </tr>
  </table>
<table>
<tr>
<td><div class="media mt-3 shadow-textarea">
     
      <div class="media-body">
        
        <div class="form-group basic-textarea rounded-corners">
          <input class="form-control z-depth-1" name="comment" id="exampleFormControlTextarea345" rows="3" placeholder="Write your comment..."></input>
   
	  </div>
      </div>
    </div> </td>
	
</tr>
<tr>
<td><input class="new-btn" type="submit"> </td> 
</tr>
 </table>


</form>

                   
                   </div>



</div>
      

    
			<br><br>
		
	
<?php
 	
$query    = "SELECT * FROM `rating_system` WHERE productID='$pID'";
$result=mysqli_query($conn,$query);
//$check = mysqli_fetch_array($result);

if ($result->num_rows > 0) 
  {
while($check = $result->fetch_assoc())
{
$sql= "SELECT * FROM users WHERE ID='".$check['userID']."'";
$us=mysqli_query($conn,$sql);
$userName = mysqli_fetch_array($us);
$today = date('Y-d-m H:i:s');
  echo '
<br>
  <tr> 
 <td> <div class="review-block" style="background-color: grey;" >
					<div class="row">
						<div class="col-sm-3">
							
							<div class="review-block-name"><a href="#"><h3> '.$userName["username"].' : </h3></a></div>
							<div class="review-block-date">'.$today.'<br/></div>
						</div>
  <input id="rate" name="rate" disabled class="rating rating-loading" value="'.$check["rating"].'"  data-max="5" data-step="1" data-size="xs">
							<div class="review-block-title">'.$check["comment"].'</div>
							
						</div>
					</div>
					
					</div></td> 
				  </tr>

  ';
}
  }
  else{echo'<center><h2>Be the first to rate this item</h2></center>';}
  }


?>










  <?php




     if($_POST)
{
  $rate= $_POST['rate'];
  $comment= $_POST['comment'];
  $comment=filter_var($comment, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
  if(isset($_GET['productID']))
  {
         $pID= $_GET['productID'];

         $query    = "SELECT * FROM `rating_system` WHERE productID='$pID'
         AND userID='".$_SESSION['ID']."'";
          $repeted = mysqli_query($conn, $query) or die(mysql_error());
          if ($repeted->num_rows > 0)
          {
			  
            $sql= "update `rating_system` set  rating='$rate',comment='$comment',date= '$today' where userID= '".$_SESSION['ID']."' and productID='$pID' ";
            $result = mysqli_query($conn,$sql); 

            $query = mysqli_query($conn,"SELECT AVG(rating) as AVGRATE from rating_system where productID='$pID'");
            $row = mysqli_fetch_array($query);
            $P_AVGRATE=$row['AVGRATE'];
          
            echo '<script> location.href="http://localhost/hikers/rating.php?productID='.$pID.'";
            alert("Thank you for your opinion !");
          </script>';
			
          }
          else
          {
         $sql= "INSERT INTO `rating_system` ( `userID`, `productID`, `rating`, `comment`, `date`) VALUES ('".$_SESSION['ID']."', '$pID', '$rate','$comment', NOW());
         ";
         $result = mysqli_query($conn,$sql); 

         
         $query = mysqli_query($conn,"SELECT AVG(rating) as AVGRATE from rating_system where productID='$pID'");
         $row = mysqli_fetch_array($query);
         $P_AVGRATE=$row['AVGRATE'];
       
         echo '<script> location.href="http://localhost/hikers/rating.php?productID='.$pID.'";
         alert("Thank you for your opinion !");
       </script>';
          }

          $qq= "update `products` set  rating='$P_AVGRATE' where ID='$pID' ";
          $rr = mysqli_query($conn,$qq); 


              }
             
              else{echo'<script>alert("NOT WORKING")</script>';}
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