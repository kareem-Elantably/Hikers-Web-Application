<?php session_start();?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Registration</title>
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


#message {
  display:none;
  background: transparent;
  color: #fff;
  position: relative;
 
  margin-top: -100 px;
}

#message p {
  margin-left:50px;
  font-size: 12px;
}

.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}


.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>


</head>
<body style="background: url(../layout/photos/hikers.jpg) center center fixed;" class="header" >

             <div class="overlay">
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
                                <a class="navbar-brand" href="../home.php">HIKERS</a>
                            </div>
                          
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                          
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <div class="col-lg-8">
                                      <ul class="nav navbar-nav nav-links">
                                         <?php
                                         if(isset($_SESSION['ID']))
                                         {
                                          echo' 
                                      <li><a href="login/update.php">Profile</a></li>
                                      <li><a href="../Administrators/admins.php">Admins</a></li>
                                      <li><a href="../Administrators/adminTrips.php">Trips</a></li>
                                      <li><a href="../Administrators/adminUsers.php">Users</a></li>
                                      <li><a href="../Administrators/adminGroups.php">Groups</a></li>
                                     
                                    </ul>
                                   
                                    <ul class="nav navbar-nav navbar-right">
                   
                    <li><a href="../login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li> </ul>
                   ';
                                         }
                                         else{
                                           echo'<li><a href="../groups.php">Groups</a></li>
                                           <li><a href="../productPage.php">Shop</a></li>
                                           <li><a href="../trips.php">Trips</a></li>';

                                         }
                                        ?>
                                      </ul>
								      
                               ''
                              
                            </div>
 
               </div>
       </div> 
	   </div>
	   </div>	
	   <div>
	 

    <div id="contact_form">
    <form class="form"  action="" method="POST" autocomplete="off" style="border: 1px solid #fff;">
                                          <?php
                                         if(isset($_SESSION['ID']))
                                         {echo'<h1 class="login-title">Add user</h1>';}
                                         else{echo'<h1 class="login-title">Registration</h1>';}
                                         ?>
        
		 <label>
       	<div class="input-group-prepend">
			<div class="input-group form-group">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" required="true" name="username" placeholder="username" autofocus="false" pattern="[A-Za-z]{3,10}" title = "Min of 3 characters and max of 10, letters only, no punctuation or special characters or numbers.">


					</label>
	
		 <label>
		<div class="input-group-prepend">
		<div class="input-group form-group">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" required="true" name="age" placeholder="age" autofocus="false" pattern = "[0-9]{2}" title = "Enter a valid age in numbers (Min age 10 years old).">
						
					</div>
		</label>
      
		 <label>
		<div class="input-group-prepend" style="margin-bottom: 15px;">
		<div class="input-group form-group">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						
						<input type="text" class="form-control"  required="true"  name="email" placeholder="Email Adress" autofocus="false">
						
					</div> 
					</label>
					
					
		 <label>
		<div class="input-group-prepend">
        <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" id="password" class="form-control"required="true" name="password" placeholder="password" autofocus="false"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
						
					</div>
				</label>	
					
					
					
					
					
          <input type="submit" id="Register" name="Register"onsubmit="return false" value="submit" class="login-button">
                                          <?php
                                         if(isset($_SESSION['ID']))
                                         {echo'     ';}
                                         else{echo'<p class="link">Already have an account? <a href="login.php">Login here</a></p>';}
                                         ?>
            </form>
				<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
	  </div>	
	</div>


<?php
    require('db.php');
    if(isset($_POST['Register']))
{	 
	
   $email = $_POST['email'];
	 $password = $_POST['password'];
	 $username = $_POST['username'];
	 $Age = $_POST['age'];
try{
   if(filter_var($email, FILTER_VALIDATE_EMAIL)) {



	 $check=mysqli_query($conn,"select * from users where email='$email' ");
    $checkrows=mysqli_num_rows($check);

   if($checkrows>0) {
      echo  '<script> alert("customer exists fill the form again please")</script>';
   } else {  

    //SQL INJECTION
     $sql = $conn->prepare("INSERT INTO users (Email,password,username,age,type,survay)  VALUES (?,?,?,?,'hiker','0')");
     $sql -> bind_param('ssss',$email,$password,$username,$Age);
     $sql-> execute();
     $sql->get_result();

	 echo '<script> window.location.href="Login.php";
         alert("New record created successfully !");
       </script>';
}
   }
 else {

    echo("E-mail is not valid");
     

}
}catch(exception $e){

  echo'Message: an error has occured';
  

}
}

?>

<!-- include Google hosted jQuery Library -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Start jQuery code -->
<script type="text/javascript">
$(document).ready(function() {
    $("#Register").click(function() { 

        var proceed = true;
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields       
        $("#contact_form input[required=true], #contact_form textarea[required=true]").each(function(){
            $(this).css('border-color','green'); 
            if(!$.trim($(this).val())){ //if this field is empty 
                $(this).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag
            }
           
        });

        if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
              
                'username'     : $('input[name=username]').val(), 
                'email'        : $('input[name=email]').val(), 
                'password'     : $('input[name=password]').val(),
			          'age'          : $('input[name=age]').val()
            };

        
        }
    });

    //reset previously set border colors and hide all password on .keyup()
    $("#contact_form  input[required=true], #contact_form textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#contact_results").slideUp();
    });
});
</script>

		
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

</body>
</html>
