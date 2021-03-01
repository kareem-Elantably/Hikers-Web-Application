<?php session_start();?>
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
	
</head>

  <body  class="header" style="background-color:grey">

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
									   
    </ul>
                                    </div>
                                    
                               
                              
                            </div>
                         
  </div>
               </div>
                 </div>
             
                
         
			
			
        
  
            
			
            
                <form action="" method="POST" class="contactus" enctype="multipart/form-data" style="margin-left:200px;">
				  <div class="container">
     
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">

            <div class="row">
                <h2 style="color:white">Add Product</h2>
				 <ul class="noBullet">
                 <li>
                  
                <p style="color:rgba(0, 0, 0, .3);">..   <input id="name" name="name"type="text"class="inputFields validate"  placeholder="Name" required = "true" pattern="[A-Za-z\s+]{2,10}" title="Please enter a valid product name."/>
                 </li>
				  
				   <li>
                  
                  
                    <textarea  id="description" name="description" type="text" class="inputFields validate" placeholder="description" required="true" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid description text." ></textarea>

				     </li>
				  <li>
                    <input id="category" name="category" type="text"class="inputFields validate" placeholder="category" required = "true" pattern="[A-Za-z\s+]{3,10}" title="Please enter a valid category name."/>
              
				 </li>
				 <li>
                    <input id="price" name="price" type="text"class="inputFields validate" onkeypress='validate(event)' placeholder="price" required="true" pattern="[0-9]{1,10000}" title="Please enter valid price"/>
                 </li>
				 
              <br>
             
                <div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
				

              
              
              		
			   <input type="file" class="new-btn" name="uploadfile" style="margin-left:250px;" value=""/>
                <button type="submit" onsubmit="return false"  name="upload" value="submit"class="new-btn" >Add Product Now</button>

            </ul>
            </div>
          
                  </div>
                 
      </div>
  </form>
  <script>
  
  //validate price input numbers only
  function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
 		</script>		
				<?php
	
				
  $msg = ""; 
  
  // If upload button is clicked ... 
  if (isset($_POST['upload'])) { 
 
        $name = $_POST['name'];
        $description = $_POST['description'];
        $category = $_POST['category'];
         $price = $_POST['price'];
         $imgName = $_FILES["uploadfile"]["name"]; 
         $tempname = $_FILES["uploadfile"]["tmp_name"];     
             $folder = "../layout/photos/".$imgName; 
     
             add($conn, $name,$description , $category , $price , $imgName,$tempname, $folder);
              
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


<?php 
  function add($conn, $name,$description , $category , $price , $imgName,$tempname, $folder){
        // Get all the submitted data from the form 
        $sql = "INSERT INTO products (name,description,category,price,imgName,rating) VALUES ('$name','$description','$category','$price','$imgName','0');"; 
    
        // Execute query 
        if (mysqli_query($conn, $sql)) {
        echo '<script> window.location.href="adminProducts.php";
         alert("New record created successfully !");
       </script>';
          
         } else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
   }
   
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      } 
   
  

  }
   ?>

  </body>
</html>
