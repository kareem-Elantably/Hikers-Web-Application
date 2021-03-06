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
	<style>
.header{
    background: none;
  background-color:grey;

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
.contactus {
  width: 70%;
  padding: 30px 0;
  background: rgba(0, 0, 0, .3);
  transition: .2s;
  h2 {
    font-weight: 300;
  }
}
.noBullet {
  list-style-type: none;
  padding: 0;
}
</style> 
</head>

  <body  class="header" style="background-color:grey">

	<?php include("../nav-bar.php");  ?>
           
  <?php require('../login/db.php');?>
  	
  
     
  
            
			
            
                <form action="" method="POST" class="contactus" enctype="multipart/form-data" style="margin-left:200px;">
				  <div class="container">
     
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">

            <div class="row">
                <h2 style="color:white">Add Group</h2>
				 <ul class="noBullet">
                 <li>
                  
                <p style="color:rgba(0, 0, 0, .3);">..   <input id="name" name="name"type="text"class="inputFields validate"  placeholder="Name" required="true" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid group name." />
                 </li>
				  
				   <li>
                  
                  
                    <textarea  id="description" name="description" type="text" class="inputFields validate" placeholder="description" required="true" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid description text." ></textarea>

				     </li>
				  <li>
                    <input id="loc" name="loc" type="text"class="inputFields validate" placeholder="Location" required="true" pattern="[A-Za-z\s+]{2,100}" title="Please enter a valid location text." />
              
				 </li>
				 
				 
              <br>
             
                <div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
				

              
              
              		
			   <input type="file" class="new-btn" name="uploadfile" style="margin-left:250px;" value=""/>
                <button type="submit" onsubmit="return false"  name="upload" value="submit"class="new-btn" >Add Group Now</button>

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
	 $loc = $_POST['loc'];
    $imgName = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "../layout/photos/".$imgName; 
         
    
        
        // Get all the submitted data from the form 
        $sql = "INSERT INTO groups (name,description,location,imgName) VALUES ('$name','$description','$loc','$imgName');"; 
    
        // Execute query 
        if (mysqli_query($conn, $sql)) {
        echo '<script> window.location.href="adminGroups.php";
         alert("New group created successfully !");
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
