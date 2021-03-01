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
  margin-left: 50px;
  margin-right: 50px;
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
  &:hover {
    
    padding: 10px 80px;
  }
}


</style>
</head>
<body style="background-color:grey;">

<section class="header">
           	<?php 
			include("nav-bar.php"); 
			
			include("chaticon.php"); ?>
               


<div class="row">

<form action="" method="post">

<?php
try{
require('login/db.php');
$tID= $_GET['tripID'];



$sql= "Select * from trips WHERE ID = '$tID' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);



if(isset($check))
               
                    {
                    $distance= $check['distance'];
                    $des = $check['description'];
                    $loc= $check['location'];
                  

               echo'  <img src="layout/photos/'.$check['tripImg'].'" width="700" height="328">';
			 
                   
                    echo ' 
                                        <h2> '.$loc.'</h2>
                    <h3>Group Description</h3>
                    <h3>  '.$des.' <br></h3>
                    <h3>Distance:'.$distance.' Km<br></h3>
                    <h3>Price:'.$check['fees'].' LE<br></h3>
                    <p><input type="submit" class="new-btn" name="joined" value="Join This Trip"></p>
                   
                   ';
                  // <p><button  class="new-btn" name="groups" onClick="" select another group</button></p>
                  
                }
                else{
                    echo '<h2> please select the group you want to join </h2>';
                }

                if(isset($_SESSION['ID'])) 
                {

                if(isset($_POST['joined']))
{
  $query    = "SELECT * FROM `trip-user` WHERE tripID='$tID'
  AND userID='".$_SESSION['ID']."'";
   $repeted = mysqli_query($conn, $query) or die(mysql_error());
   if ($repeted->num_rows > 0)
   {
    echo  '<script> alert("You are in this trip already")
    window.location.href="trips.php";
    </script>';
   }
   else{
  $sql= "INSERT INTO `trip-user`(`userID`, `tripID`) VALUES ('".$_SESSION['ID']."','$tID') ";
  $result = mysqli_query($conn,$sql);
  echo'<script>
     alert("Congratulation!!! you are a part of this trip now!")
     window.location.href="trips.php";
     </script>';

}}
                }
                else
                {
                 
                  echo'<script>
     alert("Please login")
     window.location.href="login/login.php";
     </script>';
                }
              }catch(exception $e){

  echo'Message: an error has occured';
  

}
?>
</form>
<p><input type="button" class="new-btn" onclick="window.location.href='trips.php'" value="Trips" /></p>
</div>
</div>
</div>
 
 
 
 
  </section>



<br><br><br>


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