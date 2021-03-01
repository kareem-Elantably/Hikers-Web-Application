<?php session_start();?>
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
<body style="background-color:grey;">
	
<section class="header">
           
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
                                        
                                         
                                      <li><a href="http://localhost/hikers/login/profile.php?prof=0">Profile</a></li>
                                      <li><a href="admins.php">Admins</a></li>
                                        <li><a href="adminUsers.php">Users</a></li>
                                        <li><a href="adminTrips.php">Trips</a></li>
                                        <li><a href="adminGroups.php">Groups</a></li>
                                        <li><a href="adminProducts.php">Products</a></li>
                                        <li><a href="http://localhost/hikers/history.php?userID=<?php echo''.$_SESSION['ID'].'';?>">Message History</a></li>

                                      </ul>
                                     
                                      <ul class="nav navbar-nav navbar-right">
                     
                      <li><a href="../login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li> </ul>
									   
                                    </div>
                                   
                            </div>
                         
  </div>
               </div>
                 </div>
             
                
            </div>
			


<div class="row">

<form action="" method="post">
<?php require('../login/db.php');?>
<?php


$gID= $_GET['groupID'];



$sql= "Select * from groups WHERE ID = '$gID' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);



if(isset($check))
               
                    {
                   
                    $name= $check['name'];
                    $des = $check['description'];
                    $loc= $check['location'];
                  

                 
               echo'  <img src="../layout/photos/'.$check['imgName'].'" width="800" height="328">';
			      
                    echo ' 
                                        <h2> '.$name.'</h2>
                                       
                    <h3>Group Description</h3>
                    <h3>  '.$des.' <br></h3>
                    
                    <h3>Location: '.$loc.' <br></h3>
                    
                    <p><input type="submit" class="new-btn" name="joined" value="Join This Group"></p>
                   
                   ';
                }
                else{
                    echo '<h2> This group is no longer available </h2>';
                }

                if(isset($_SESSION['ID'])) 
                {

                if(isset($_POST['joined']))
{
  $query    = "SELECT * FROM `members` WHERE groupID='$gID'
  AND userID='".$_SESSION['ID']."'";
   $repeted = mysqli_query($conn, $query) or die(mysql_error());
   if ($repeted->num_rows > 0)
   {
    echo  '<script> alert("You are in this group already")
    window.location.href="../groups.php";
    </script>';
   }
   else{
  $sql= "insert into members (userID,groupID) VALUES ('".$_SESSION['ID']."','$gID') ";
  $result = mysqli_query($conn,$sql);
  echo'<script>
     alert("Congratulation!!! you are a part of this group now!")
     window.location.href="../groups.php";
     </script>';

}}
                }
                else
                {
                  header("Location:login/registration.php");
                }
?>
</form>

<form method="get" action="groupUsers.php">
<?php
echo'
<p><button class="new-btn" name="groupID" value="'.$gID.'">Members</button></p>
';
?>
</form>
</div>
</div>

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