<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="../layout/css/profile.css">
	
	 <link rel="stylesheet" href="../layout/css/nav-bar.css">
	 <link rel="stylesheet" href="../layout/css/footer.css">
	 <style>



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


<body class="header" style="background: -webkit-linear-gradient(right, #fff,grey );">


  <?php
   include("../nav-bar.php");  
try{
   require('db.php');?>

  <?php
if(isset($_SESSION['ID']))
{
  echo'';
}
else
{
 
  echo'<script>
alert("Please login")
window.location.href="login.php";
</script>';
}
	if($_GET['prof']==0)
  
  {
    $p=$_SESSION['ID'];
  }
  
  else if($_GET['prof']!=0) {
    $p=$_GET['prof'];}
    else{
      echo'error';
    }
				
  $msg = ""; 
  
  // If btnAddMore button is clicked ... 
  if (isset($_POST['btnAddMore'])) { 
 $profilePic = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "../layout/photos/".$profilePic; 
           
 

   
        // Get all the submitted data from the form 
        $sql = "update users set profilePic= '$profilePic'  where ID='$p'"; 
    
        // Execute query 
        if (mysqli_query($conn, $sql)) {
        echo '<script> location.href="http://localhost/hikers/login/profile.php?prof=0";
         alert("profile picture changed successfully !");
       </script>';
          

	 
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      } 
  

  }
  }
 
$sql= "Select * from users WHERE ID ='$p'  ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);

}catch(exception $e){

  echo'Message: an error has occured';
  

}


	
	
?> 
           
			
			
			
			
			
<div class="container emp-profile">
          <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                   <div class="profile-img">					
					<?php echo'  <img src="../layout/photos/'.$check['profilePic'].'" width="300" height="300">'; ?>
          <?php
                            if($p==$_SESSION['ID'])
                            {
                              echo'
                        <div class="file btn btn-lg btn-primary">
                                Change Photo
								
            <input type="file"  name="uploadfile" value=""/> 
       
                            
						
                             </div>
                             ';
                            }?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php echo'  '.$check["username"].''; ?>
                                    </h5>
                                    <h6>
                                    <?php echo'  '.$check["Email"].' '; ?>
                                    </h6>
                                    
                            
                            <?php
                            if($p==$_SESSION['ID'])
                            {
                                echo'<ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Update</a>
                                </li>
                                
                            </ul> 
                            </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="change photo"/>
                            </div>';
                            }
                            ?>
                                
                        </div>
                    
                    
					
               
                <div class="row">
                    <div class="col-md-4">
                    <?php
                            if($check['type']=='hiker'&&$p==$_SESSION['ID'])
                            {
                              echo'
                        <div class="profile-work">
                            <p>Groups</p>
                             ';if($p!=0){groups($conn,$p);}
                            echo'
                            <p>Trips</p>';
                            if($p!=0){trips($conn,$p);}
                           
                        echo'</div>';
                        
                   }
                   else if($check['type']=='hiker'&&$p==$_GET['prof'])
                   {
                    echo'
              <div class="profile-work">
                  <p>Groups</p>
                   ';if($p!=0){groups($conn,$p);}
                  echo'
                  <p>Trips</p>';
                  if($p!=0){trips($conn,$p);}
                 
              echo'</div>';
              
         }
                   if($check['type']=='admin'&&$p==$_SESSION['ID'])
                   {
                      echo'
                      <div class="profile-work">
                      <p>Penalties</p>';
                      if($p!=0){penalty($conn,$p);}
                      
                      echo'
                  </div>';
                 } 
                 else if($check['type']=='admin'&&$p==$_GET['prof'])
                   {
                      echo'
                      <div class="profile-work">
                      <p>Penalties</p>';
                      if($p!=0){penalty($conn,$p);}
                      
                      echo'
                  </div>';
                 }
                 ?>
                    </div>
                    
                         <?php
                            if($p==$_SESSION['ID'])
                            {
                                    echo'<div class="col-md-8">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                       
                                    <div class="row">
                                            <div class="col-md-6">
                        <input type="text" class="inputFields" name="username" placeholder="New Username"  pattern="[A-Za-z]{3,10}" title = "Min of 3 characters and max of 10, letters only, no punctuation or special characters or numbers."  />

                                            </div>
                                            <div class="col-md-6"><br>
                                            <input type="submit" class="profile-edit-btn" name="namebt" value="Update name"/>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <input type="text" class="inputFields" name="email" placeholder="New Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter a valid email." />
                                            </div>
                                            <div class="col-md-6"><br>
                                            <input type="submit" class="profile-edit-btn" name="emailbt" value="Update email"/>
                                            </div>
                                        </div>
                                        <br>
                                     
                                        
                            </div>
                         
                        </div>
                        </div>
                        ';
                            }
                            if(isset($_POST['namebt']))
                            {
                              $col='username';
                              update($_POST['username'],$conn,$col,$p);
                            }
                            if(isset($_POST['emailbt']))
                            {
                              $col='Email';
                              update($_POST['email'],$conn,$col,$p);
                            }
                            

                            
                            ?>
                            
                    
                </div>
            </form>           
        </div>
		
		<?php
function update($x,$conn,$col,$p)
{
$sql="update users set $col='$x' where ID='$p'";
 mysqli_query($conn,$sql);
 echo '<script> location.href="http://localhost/hikers/login/profile.php?prof=0";
 alert("Account updated successfully !");
</script>';

}
function penalty($conn,$p)
{
  $x=0;
$sql="select * from investigation where adminID='$p' and approval='1'";
 $result=mysqli_query($conn,$sql);
 while($check=mysqli_fetch_array($result))
 {
   $x++;
 }
 echo''.$x.' penalties ';

}
function groups($conn,$p)
{
$sql="select * from members where userID='$p'";
$result=mysqli_query($conn,$sql);
if($result->num_rows > 0)
{
while($check=mysqli_fetch_array($result))
{
  $query="select name from groups where ID='".$check['groupID']."' ";
  $r=mysqli_query($conn,$query);
  $z=mysqli_fetch_array($r);
  echo'  '.$z['name'].' <br> ';
}}else{echo'No groups ';}
}

function trips($conn,$p)
{
$sql="select * from `trip-user` where userID='$p'";
$result=mysqli_query($conn,$sql);
if($result->num_rows > 0)
{
while($check=mysqli_fetch_array($result))
{
  $query="select location from trips where ID='".$check['tripID']."' ";
  $r=mysqli_query($conn,$query);
  $z=mysqli_fetch_array($r);
  echo'  '.$z['location'].' <br> ';
}}else{echo'No trips ';}
}

?>

		
		</body>
