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
}



	</style>

</head>
<body style="background-color:grey;" class="header";>

<?php $ID =$_SESSION['ID']; ?>
           
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
                                         
                                        <?php $ID =$_SESSION['ID']; ?>
                                          <li><a href="http://localhost/hikers/auditor/auditorHis.php?userID=<?php echo''.$ID.'';?>">Messages </a></li>
                                        <li><a href="http://localhost/hikers/auditor/investigationS.php?userID=<?php echo''.$ID.'';?>">Investigation Requests</a></li>

                                      </ul>
                                     
                                      <ul class="nav navbar-nav navbar-right">
                                      <li><a href="../login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li> </ul>

    </ul>
                                    </div>
                                    
                               
                              
                            </div>
                         
  </div>
               </div>
                 </div>
             
                
            </div>
			
			
        

<?php require('../login/db.php');?>
<?php $conn=mysqli_connect("localhost","root","","hikers project");
$db=mysqli_select_db($conn,'surveytable');
?>


<div class="row">




 <?php

  

  $sql = "Select * from surveytable";
  $result = $conn->query($sql);
  

  if ($result->num_rows > 0) 
  {
    

      while($row = $result->fetch_assoc()) 
      {
        echo '<div class="column">
        <div class="card">
        <div class="contain">
              <h2>'.$row["username"].'</h2>
              <p>Hiking Spots: '.$row["radio1"].'</p>
              <p>Accomodation: '.$row["radio2"].'</p>
              <p>Stuff: '.$row["radio3"].'</p>
              <p>transportations: '.$row["radio4"].'</p>
              <p>Services: '.$row["radio5"].'</p>
              <p>Products: '.$row["radio6"].'</p>
              <p>Materials used: '.$row["radio7"].'</p>
              <p>Prices: '.$row["radio8"].'</p>
              <p>Comment:'.$row["comment"].'</p>
            </div>
          </div>
        </div>';
       
        

      }
      echo"</div>";
  } 
  else {
      echo "0 results";
  }
  
  //$conn->close();
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


