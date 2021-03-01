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
  margin-left: 1px;
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




  .new {
  border: 1px solid rgba(255, 255, 255, 1);
  background: grey;
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
  &:hover {
    background-color: black;
    padding: 10px 80px;
  }
}

.new:hover {
	background-color: black;
  opacity: 0.7;

}


.inputFields {
  margin: 15px 0;
  font-size: 16px;
  padding: 10px;
  width: 250px;
  border: 1px solid rgba(255, 255, 255, 1);
  border-top: none;
  border-left: none;
  border-right: none;
  background: rgba(20, 20, 20, .2);
  color: white;
  outline: none;
}

</style>
</head>
<body style="background-color:grey;"class="header">
	
<?php require('../login/db.php');?>
           
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
			


	<?php
function update($x,$conn,$col,$tID)
{
$sql="update trips set $col='$x' where ID='$tID'";
if( mysqli_query($conn,$sql))
{

    echo  '<script> 
    window.location.href="http://localhost/hikers/Administrators/updateTrip.php?tripID='.$tID.'";
    
    </script>'; 
}

}

function updatePhoto($conn,$tID,$file,$temp,$folder)
{
 
    
   
        // Get all the submitted data from the form 
        $sql = "update trips set tripImg= '$file'  where ID='$tID'"; 
    
        // Execute query 
        if (mysqli_query($conn, $sql)) {
          move_uploaded_file($temp, $folder);
        echo '<script> location.href="http://localhost/hikers/Administrators/updateTrip.php?tripID='.$tID.'";
         
       </script>';
    
        }  

}




?>
<div class="row">
<form action="" method="post" enctype="multipart/form-data">
<?php


$tID= $_GET['tripID'];


$sql= "Select * from trips WHERE ID = '$tID' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);


if(isset($check))
               
                    {
                  
                    $fees= $check['fees'];
                    $des = $check['description'];
                    $loc= $check['location'];
                    $dist= $check['distance'];

                 
               echo' <div class="profile-img">					
               <img src="../layout/photos/'.$check['tripImg'].'" width="700" height="400">
                     </div>
                                      
             
   
                                    <input type="file" class="new" name="uploadfile" style="margin-left:550px;" value=""/>
                     
                 
                                  <input type="submit" class="new" name="pho" value="Update photo"/>
                                 ';
			 
               
                    echo ' 
                                        <h2> '.$loc.'</h2>
										<div class="row">
                                            
                        <input type="text" class="inputFields" name="location" placeholder="New Location" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid location text." />
                                           
                                            <input type="submit" class="new" name="locbt" value="Update location"/>
                                           
                                        </div>
										
										
                    <h3>Trip Description</h3>
                    <h3>  '.$des.' <br></h3>
					                                        <div class="row">
                                           
                                            <input type="text" class="inputFields" name="description" placeholder="New description" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid description text." />
                                          
                                            <input type="submit" class="new" name="desbt" value="Update description"/>
                                         
                                        </div>
										
                    <h3>Fees: '.$fees.' <br></h3>
					   <div class="row">
                                            
                       <input type="text" class="inputFields" name="fees" placeholder="New Fees" pattern="[0-9]{1,100000}" title="Please enter valid price" />

                       <input type="submit" class="new" name="feesbt" value="Update fees"/>
                     
                                        </div>
                    
                                        <h3>Trip distance </h3>
                    <h3>  '.$dist.' <br></h3>
					                                        <div class="row">
                                           
                                            <input type="text" class="inputFields" name="dist" placeholder="New distance" pattern="[0-9]{1,100000}" title="Please enter valid distance"  />
                                          
                                            <input type="submit" class="new" name="distbt" value="Update distance"/>
                                         
                                        </div>
                  
                    
                   <div class="col-md-8">
                                  
                                    
                                        <br>

                                        <br>
                                       
                                        <br>
                                        
                                        
                            </div>
                         
                     
                   ';
                  
                }
                else{
                    echo '<h2> please select the group you want to join </h2>';
                }

 
$sql= "Select * from trips WHERE ID ='$tID'  ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
                           
                            

                

                            if(isset($_POST['feesbt']))
                            {
                              $col='fees';
                              update($_POST['fees'],$conn,$col,$tID);
                            }
                            if(isset($_POST['desbt']))
                            {
                              $col='description';
                              update($_POST['description'],$conn,$col,$tID);
                            }
                            if(isset($_POST['locbt']))
                            {
                              $col='location';
                              update($_POST['location'],$conn,$col,$tID);
                            }
                            if(isset($_POST['distbt']))
                            {
                              $col='distance';
                              update($_POST['dist'],$conn,$col,$tID);
                            }
                            if(isset($_POST['pho']))
                            {
                              $f = $_FILES["uploadfile"]["name"];
                              $t = $_FILES["uploadfile"]["tmp_name"]; 
                              $folder = "../layout/photos/".$f; 
                              updatePhoto($conn,$tID,$f,$t,$folder);
                            }
               
?>


<div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
                


</form>
<p><input type="button" class="new-btn" onclick="window.location.href='adminTrips.php'" value="select another trip" /></p>

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
      <p> copyright</p>
    </div>
    
    <div class="impressum col-xs-12 col-sm-3 col-sm-pull-6">
      <p> text</p>
      <p> text </p>
    </div>
	</div>

  </footer>
</section>



</body>
</html>