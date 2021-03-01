<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="layout/css/cart.css">
 <link rel="stylesheet" href="layout/css/nav-bar.css">
	 <link rel="stylesheet" href="layout/css/footer.css">
<style>
.header{
    background: none;
  background-color:grey;

  margin-left:10px;
}




</style>
</head>
<body class="header">
	<?php
include("nav-bar.php");
	include("chaticon.php"); ?>

<div class="row">
<form action="" method="post">
   <?php 

try{
   require('login/db.php');?>
<?php

$conn = new mysqli('localhost' , 'root' , '' , 'hikers project');
if(!$conn)
{
    die("Connection failed".mysqli_connect_error());
}
$sql="select * from cart where userID='".$_SESSION["ID"]."'";
$result= mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
  {
      while($row = $result->fetch_assoc()) 
      {
       
       
        $pid = $row["productID"];
		    $quantity = $row["quantity"];
        $sql="select * from products where ID='$pid'";
        $query= mysqli_query($conn,$sql);
        $check = mysqli_fetch_array($query);
    


echo'<div class="column">
        <div class="card">
		 <img src="layout/photos/'.$check['imgName'].'" width="100" height="100"> 
		
    <h2>'.$check["name"].'</h2>
    <h2>'.$check["description"].'</h2>
    <h2>'.$check["price"].' L.E</h2>
	<p>Quantity:'.$row["quantity"].'</p>
	
	
   <p> <button class="new-btn" name="groupID" value="'.$row["productID"].'">Remove</button></p>
      </div>
      
        </div>';

if(isset($_POST['groupID']))
{
  $sql="delete from cart where userID='".$_SESSION["ID"]."' and productID='".$row["productID"]."'";
  $result= mysqli_query($conn,$sql);
  if($result)
  {
    mysqli_close($conn); 
    echo  '<script>
   window.location.href="cart.php";
   </script>';
    exit;

  }

}   
}
?>
<input type="button" class="new-btn" onclick="window.location.href='checkout.php'" value="Checkout" />
<?php
}
else {echo ' 
  
  <img src="layout/photos/empty-cart.jpg" width="480" height="300" title="No item in your cart!" alt="Logo of a company" />
  
  ';}

      echo"</form>";
    }catch(exception $e){

  echo'Message: an error has occured';
  

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
