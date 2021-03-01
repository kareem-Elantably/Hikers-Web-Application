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
<?php require('../login/db.php');?>
</style>
</head>
<body style="background-color:grey;"class="header">
	

           <?php include("../nav-bar.php");  ?>


	<?php
function update($x,$conn,$col,$gID)
{
$sql="update groups set $col='$x' where ID='$gID'";
 mysqli_query($conn,$sql);
 echo '<script> location.href="http://localhost/hikers/Administrators/updateGroup.php?groupID='.$gID.'";
 
</script>';
}

function updatePhoto($conn,$gID,$file,$temp,$folder)
{
 
   
        // Get all the submitted data from the form 
        $sql = "update groups set imgName= '$file'  where ID='$gID'"; 
    
        // Execute query 
        if (mysqli_query($conn, $sql)) {
          move_uploaded_file($temp, $folder);
        echo '<script> location.href="http://localhost/hikers/Administrators/updateGroup.php?groupID='.$gID.'";
         alert(" picture changed successfully !");
       </script>';
    
        }  

}


?>
<div class="row">
<form action="" method="post"  enctype="multipart/form-data">
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
                  

                 
               echo'  <div class="profile-img">					
               <img src="../layout/photos/'.$check['imgName'].'" width="700" height="400">
                     </div>
                                      
             
   
                                    <input type="file" class="new" name="uploadfile" style="margin-left:550px;" value=""/>
                     
                 
                                  <input type="submit" class="new" name="pho" value="Update photo"/>
                                 
               <div class="row">
               
                 
              
                                        <h2> '.$name.'</h2>
										<div class="row">
                                            
                        <input type="text" class="inputFields" name="name" placeholder="New Name" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid group name." />

                                            <input type="submit" class="new" name="namebt" value="Update name"/>
                                            
                                        </div>
										
										
                    <h3>Group Description</h3>
                    <h3>  '.$des.' <br></h3>
					                                        <div class="row">
                                           
                                            <input type="text" class="inputFields" name="description" placeholder="New description" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid description text." />
                                          
                                            <input type="submit" class="new" name="desbt" value="Update description"/>
                                         
                                        </div>
										
                    <h3>Location: '.$loc.' <br></h3>
					   <div class="row">
                                            
                                            <input type="text" class="inputFields" name="location" placeholder="New Location"  pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid location text."/>
                                           
                                            <input type="submit" class="new" name="locbt" value="Update location"/>
                                           
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

            

 
$sql= "Select * from users WHERE ID ='$gID'  ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
                           
                            

                

                            if(isset($_POST['namebt']))
                            {
                              $col='name';
                              update($_POST['name'],$conn,$col,$gID);
                            }
                            if(isset($_POST['desbt']))
                            {
                              $col='description';
                              update($_POST['description'],$conn,$col,$gID);
                            }
                            if(isset($_POST['locbt']))
                            {
                              $col='location';
                              update($_POST['location'],$conn,$col,$gID);
                            }
                            if(isset($_POST['pho']))
                            {
                              $f = $_FILES["uploadfile"]["name"];
                              $t = $_FILES["uploadfile"]["tmp_name"]; 
                              $folder = "../layout/photos/".$f; 
                              updatePhoto($conn,$gID,$f,$t,$folder);
                            }
                         
                
               
?>




<div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
                
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