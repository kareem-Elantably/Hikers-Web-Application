<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Registration</title>
    <link rel="stylesheet" href="../layout/css/login.css">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../layout/css/nav-bar.css">
 <style>
h1.login-title {
    color: #fff;
    margin: 0px auto 25px;
    font-size: 25px;
    font-weight: 300;
    text-align: center;
}

p.link  {
    color: #fff;
}
.link  a{
    color: #fff;
}

</style>
</head>
<body style="background-color:grey" class="header" >

<?php include("../nav-bar.php");  ?>
<?php
$ID=$_SESSION['ID'];
?>

 
          
	 
   
    <form class="form" action="" method="POST" autocomplete="off"  enctype="multipart/form-data" style="border: 1px solid #fff;">
                                         <h1 class="login-title">Add admin</h1>
        
       	<div class="input-group-prepend">
			<div class="input-group form-group">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username" required = "true" autofocus="false" pattern="[A-Za-z]{3,10}" title = "Min of 3 characters and max of 10, letters only, no punctuation or special characters or numbers.">
						</div>
					
	
		<div class="input-group-prepend">
		<div class="input-group form-group">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="age" class="form-control"  name="age" placeholder="age" autofocus="false" required = "true" pattern = "[0-9]{2}" title = "Enter a valid age in numbers (Min age 10 years old).">
						
					</div>
		
		
		<div class="input-group-prepend" style="margin-bottom: 15px;">
		<div class="input-group form-group">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="email" placeholder="Email Adress" autofocus="false" required = "true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter a valid email." >
						
					</div>
		<div class="input-group-prepend">
        <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password" autofocus="false" required = "true" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					</div>
					
					
					<br>
             
                <div class="tm-product-img-dummy mx-auto">
                  <i
                    class="fas fa-cloud-upload-alt tm-upload-icon"
                    onclick="document.getElementById('fileInput').click();"
                  ></i>
                </div>
				

              
              
              		
			   <input type="file" class="new-btn" name="uploadfile" style="margin-left:50px;" value=""/>
					
					
					
        <input type="submit" onsubmit="return false"  name="Register" value="submit" class="login-button">
                                         
            </form>
	  </div>	
	
<?php
    
    require('../login/db.php');
    if(isset($_POST['Register']))
{	 
	$email = $_POST['email'];
	 $password = $_POST['password'];
	 $username = $_POST['username'];
	 $Age = $_POST['age'];
   $imgName = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
    $folder = "../layout/photos/".$imgName; 

    add($conn, $username,$email , $password , $Age , $imgName,$tempname, $folder);


     
} 




function add($conn, $username,$email , $password , $Age , $imgName,$tempname, $folder){

  $check=mysqli_query($conn,"select * from users where Email='$email' ");
  $checkrows=mysqli_num_rows($check);

 if($checkrows>0) {
    echo  '<script> alert("customer exists fill the form again please")</script>';
 } else {  
  // Execute query 
  //SQL INJECTION
  $sql = $conn->prepare("INSERT INTO users (username,Email,password,age,profilePic,type,survay) VALUES (?,?,?,?,'$imgName','admin','0');");
  $sql -> bind_param('ssss',$username,$email,$password,$Age);
  $sql-> execute();
  $sql->get_result();
  
  echo '<script> window.location.href="admins.php";
   alert("New record created successfully !");
 </script>';
}

  // Now let's move the uploaded image into the folder: image 
  if (move_uploaded_file($tempname, $folder))  { 
      $msg = "Image uploaded successfully"; 
  }else{ 
      $msg = "Failed to upload image"; 
}
 mysqli_close($conn);


  
}
?>

</body>
</html>
