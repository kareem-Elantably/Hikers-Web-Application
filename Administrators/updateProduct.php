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
 
  margin-left:10px;
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



	 .new {
  border: 1px solid rgba(255, 255, 255, 1);
  background: grey;
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
 
}
.new:hover {
	background-color: black;
  opacity: 0.7;

}

</style>
</head>
<body style="background-color:grey;"class="header">
	
<?php include("../nav-bar.php");  ?>
			  <?php require('../login/db.php');?>


	<?php
function update($x,$conn,$col,$pID)
{
$sql="update products set $col='$x' where ID='$pID'";

if( mysqli_query($conn,$sql))
{

    echo  '<script> 
    window.location.href="http://localhost/hikers/Administrators/updateProduct.php?productID='.$pID.'";
    
    </script>'; 
}


}

function updatePhoto($conn,$pID,$file,$temp,$folder)
{
 
           
 

   
        // Get all the submitted data from the form 
        $sql = "update products set imgName= '$file'  where ID='$pID'"; 
    
        // Execute query 
        if (mysqli_query($conn, $sql)) {
          move_uploaded_file($temp, $folder);
        echo '<script> location.href="http://localhost/hikers/Administrators/updateProduct.php?productID='.$pID.'";
         
       </script>';
    
        }  

}


?>
<div class="row">
<form action="" method="post" enctype="multipart/form-data">


                
<?php


$pID= $_GET['productID'];



$sql= "Select * from products WHERE ID = '$pID' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);



if(isset($check))
               
                    {
                  
                    $name= $check['name'];
                    $des = $check['description'];
                    $price= $check['price'];
                    echo' 
                    
                    <div class="profile-img">					
                    <img src="../layout/photos/'.$check['imgName'].'" width="700" height="400">
                          </div>
                                           
              		
			  
                                         <input type="file" class="new" name="uploadfile" style="margin-left:550px;" value=""/>
                          
                      
                                       <input type="submit" class="new" name="pho" value="Update photo"/>
                                      
                                
                 
                 ';
			 
               
                    echo ' 
                                        <h2> '.$name.'</h2>
										<div class="row">
                                            
                        <input type="text" class="inputFields" name="name" placeholder="New name"  pattern="[A-Za-z\s+]{2,10}" title="Please enter a valid product name."/>

                                            <input type="submit" class="new" name="namebt" value="Update name"/>
                                            
                                        </div>
										
										
                    <h3>Product Description</h3>
                    <h3>  '.$des.' <br></h3>
					                                        <div class="row">
                                           
                                            <input type="text" class="inputFields" name="description" placeholder="New description" pattern="[A-Za-z\s+]{2,1000}" title="Please enter a valid description text." />
                                          
                                            <input type="submit" class="new" name="desbt" value="Update description" />
                                         
                                        </div>
										
                    <h3>Price: '.$price.' <br></h3>
					   <div class="row">
                                            
                                            <input type="text" class="inputFields" name="price" placeholder="New Price" pattern="[0-9]{1,10000}" title="Please enter valid price" />
                                           
                                            <input type="submit" class="new" name="prbt" value="Update price" />
                                           
                                        </div>
                    
                  
                    
                   
                         
                     
                   ';
                  
                }
                else{
                    echo '<h2> please select the group you want to join </h2>';
                }

 
$sql= "Select * from products WHERE ID ='$pID'  ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
                           
                            

                

                            if(isset($_POST['namebt']))
                            {
                              $col='name';
                              update($_POST['name'],$conn,$col,$pID);
                            }
                            if(isset($_POST['desbt']))
                            {
                              $col='description';
                              update($_POST['description'],$conn,$col,$pID);
                            }
                            if(isset($_POST['prbt']))
                            {
                              $col='price';
                              update($_POST['price'],$conn,$col,$pID);
                            }
                            if(isset($_POST['pho']))
                            {
                              $f = $_FILES["uploadfile"]["name"];
                              $t = $_FILES["uploadfile"]["tmp_name"]; 
                              $folder = "../layout/photos/".$f; 
                              updatePhoto($conn,$pID,$f,$t,$folder);
                            }

                           
                
               
?>

                           
             
               

               
               




</form>
<p><input type="button" class="new-btn" onclick="window.location.href='adminProducts.php'" value="select another product" /></p>



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