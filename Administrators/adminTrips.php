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
  margin-left: 50px;
  margin-right: 50px;
}



	</style>
</head>
<body class="header" style="background-color:grey;">
	
           <?php include("../nav-bar.php");  ?>
       

<?php require('../login/db.php');?>


<div class="row">

 
  <input type="button" class="new-btn" onclick="window.location.href='addTrip.php'" value="New trip" />



 <?php

  

  $sql = "Select * from trips";
  $result = $conn->query($sql);
  

  if ($result->num_rows > 0) 
  {
    

      while($row = $result->fetch_assoc()) 
      {
        echo '<div class="column">
        <div class="card">
          <img src="../layout/photos/'.$row['tripImg'].'" width="300" height="300"> 
          <div class="contain">
          <h2>'.$row["location"].'</h2>
          <p>Fees: '.$row["fees"].' LE</p>
          <p>Distance: '.$row["distance"].' Km</p>
              <form action="" method="post">
              <p><button class="new-btn" name="deleteID" value="'.$row["ID"].'">Delete</button></p>
              <button class="new-btn" name="editID" value="'.$row["ID"].'">Edit</button>
              </form>
            </div>
          </div>
        </div>';
       
        

      }
      echo"</div>";
  } 
  else {
      echo "<center><h2>No trips yet</h2></center>";
  }
  
  //$conn->close();
  ?>
  

 
  </div>
  </section>
  <?php
  if(isset($_POST['deleteID']))
{
  $sql="delete from trips where ID='".$_POST['deleteID']."'";
  $result= mysqli_query($conn,$sql);
  if($result)
  {
    mysqli_close($conn); 
   echo  '<script> 
    window.location.href="adminTrips.php";
    
    </script>'; 
    exit;

  }
  else{header("location:../Groups.php");}


} 

if(isset($_POST['editID']))
{
  echo  '<script> 
  window.location.href="http://localhost/hikers/Administrators/updateTrip.php?tripID='.$_POST['editID'].'";
  
  </script>'; 
    exit;


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
