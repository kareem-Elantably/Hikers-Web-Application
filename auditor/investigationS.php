<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     
		  <link rel="stylesheet" href="../layout/css/addProduct.css">
	 <link rel="stylesheet" href="../layout/css/nav-bar.css">
	 <link rel="stylesheet" href="../layout/css/footer.css">
	<style>
	
.header{
    background: none;
  background-color:grey;
  margin-left: 50px;
  margin-right: 50px;
}

table, th, td {
  padding: 5px;
  margin: 0;
  text-align: center;
  font-size: 15px;
  color:white;
}

th, td {
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    border-color:white;
}

table {
  width: 90%;
  margin: 0 auto;
    color:white;
  max-width: 80%;
}
h3, p, h1, h2, b
{    color:white;}

.new-btn {
  border: 1px solid rgba(255, 255, 255, 1);
  background: grey;
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
  margin-bottom:10px;
	  }
	  .new-btn:hover {
	background-color: black;
  opacity: 0.7;

}	

	</style>
</head>
<body class="header" style="background-color:grey;" class="header">
	
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
                                        <li><a href="formView.php">Form view</a></li>

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
	
	

          <form action="" method="post">
<?php require('../login/db.php');?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hikers project";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$gID= $_GET['groupID'];
$q="SELECT * FROM users WHERE type='admin'";
$result= mysqli_query($conn,$q);

if ($result->num_rows > 0) 
  {
    echo'
    <div class="col-12">
   
    <table>
      <tr>
      <th>Profile picture</th>
      <th>Admin ID</th>
      <th>Admin Name</th>
      <th>Email</th>
      <th>Send</th>
        

        
        
      </tr>
  </div>
  ';
      while($row = $result->fetch_assoc()) 
      {
        
        
echo'
  
  <tr>
  <td><img src="../layout/photos/'.$row["profilePic"].'"  width="60" height="60"></td>
  <td>'.$row["ID"].'</td>
    <td>'.$row["username"].'</td>
    <td>'.$row["Email"].'</td>
    <td><button class="new-btn" name="send" value="'.$row["ID"].'">Send Investigation </button></td>
    
  </tr>
  
';

   
}
echo'</table>';

}
else {echo"<h3>There are no problems to investigate</h3>";}

      echo'</form>
      ';
      
  
    
   
      if (isset($_POST['send']))
      {
        
        echo'  <center><input  class="inputFields"  type="text" name="message" value="" id="Message" placeholder="Complain" />
        <button class="new-btn" action name="pen" value="'.$_POST['send'].'">Investigate </button>
        </center>';
      
  }
  
  if(isset($_POST['pen']))
  {
    $aid=$_POST['pen'];
    $q="select * from users where ID='$aid'";
    $result= mysqli_query($conn,$q);
    $ro=mysqli_fetch_array($result);
    $adn=$ro['username'];
    $mess=$_POST['message'];
    $queryy="INSERT INTO investigation (auditorID,adminID,adName,Description) VALUES ('$ID','$aid','$adn','$mess')";
          
    if(mysqli_query($conn,$queryy)){

      echo  '<script> 
      location.href="http://localhost/hikers/auditor/investigationS.php";
     alert("Investigation added");
     </script>'; 
    
            
       } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
        echo  '<script> 
      location.href="http://localhost/hikers/auditor/investigationS.php";
     alert("Investigation failed");
     </script>';
       }
       mysqli_close($conn);
  
  }
?>


</table>

	
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