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
<?php include("../nav-bar.php");  ?>
  <?php require('../login/db.php');?>
  
  	
			
			<form action="" method="POST" class="contactus" enctype="multipart/form-data" style="margin-left:200px;">
      				  <div class="container">
     
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">

            <div class="row">
                <h2 h2 style="color:white">Add Trip</h2>
            </div>
			
            <div class="row ">
          
                 <ul class="noBullet">
                 <li>
                 <p style="color:rgba(0, 0, 0, .3);">..      <input id="location" name="location"type="text"class="inputFields validate" placeholder="location"required="true" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid location text." />
             </li>
			 <li>
				  
                    <textarea  id="description" name="description" type="text" class="inputFields validate" placeholder="description"required="true" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid description text." ></textarea>
          
				  </li>
				  <li>
				  
                    <input id="distance" name="distance" type="text"class="inputFields validate" placeholder="distance" required="true" pattern="[0-9]{1,100000}" title="Please enter valid distance"/>
                
				  </li>
				  <li>
				  
                    <input id="price" name="price" type="text"class="inputFields validate"placeholder="price"   onkeypress='validate(event)'required="true" pattern="[0-9]{1,100000}" title="Please enter valid price" />
                 
			</li>
                  
              <br>
             
            
				

               
			   <input type="file" class="new-btn" name="uploadfile" style="margin-left:250px;" value=""/>
               
           
                <button type="submit" onsubmit="return false"  name="upload" value="submit"class="new-btn" >Add trip Now</button>
				
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
     $location = $_POST['location'];
	 $description = $_POST['description'];
	 $distance = $_POST['distance'];
	  $price = $_POST['price'];
    $imgName = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "../layout/photos/".$imgName; 
         
   
        // Get all the submitted data from the form 
        $sql = "INSERT INTO trips (location,description,distance,fees,tripImg) VALUES ('$location','$description','$distance','$price','$imgName');"; 
    
        // Execute query 
        if (mysqli_query($conn, $sql)) {
        echo '<script> window.location.href="adminTrips.php";
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
