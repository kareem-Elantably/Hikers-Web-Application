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
<body style="background-color:grey;"class="header">

           	<?php include("nav-bar.php");
			
			include("chaticon.php"); ?>
                
        
 

<?php
try{
  require('login/db.php');
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hikers project";
  
  
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  ?>


<div class="row">
<form action="" method="post">
 <?php

  

$sql="select * from members where userID='".$_SESSION["ID"]."'";
$result= mysqli_query($conn,$sql);

 
  

  if ($result->num_rows > 0) 
  {
    
   
      while($row = $result->fetch_assoc()) 
      {

        $gid = $row["groupID"];
        $sql="select * from groups where ID='$gid'";
    $query= mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($query);
    
        echo '<div class="column">
        <div class="card">
          <img src="layout/photos/'.$check['imgName'].'" width="300" height="300"> 
            <div class="contain">
              <h2>'.$check["name"].'</h2>
              <p>Rated: '.$check["rating"].' Stars</p>
              <p>Located in: '.$check["location"].'</p>
              <p><button class="new-btn" name="unjoin" value="'.$check["ID"].'">Unjoin</button></p>
            </div>
          </div>
        </div>';
       
        if(isset($_POST['unjoin']))
        {
          $sql="delete from members where userID='".$_SESSION["ID"]."' and groupID='".$_POST["unjoin"]."'";
          $result= mysqli_query($conn,$sql);
          if($result)
          {
            mysqli_close($conn); 
            echo  '<script>
   window.location.href="myGroups.php";
   </script>';  
            exit;
        
          }
        
        }   
        }}
        else {echo ' 
  
  <img src="layout/photos/sad.png" width="400" height="400" title="No item in your cart!" alt="Logo of a company" />
  
  ';;}
        
              echo"</form>";
              
          }catch(exception $e){

  echo'Message: an error has occured';
  

}    
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
