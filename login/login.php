<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="../layout/css/login.css">
  <link rel="stylesheet" href="../layout/css/nav-bar.css">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
</head>
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
<body  style="background: url(../layout/photos/hikers.jpg) center center fixed;">
  
  	  
<?php
    require('db.php');
   
    // When form submitted, check and create user session.
    if (isset($_POST['Login'])) {
     // Check user is exist in the database
        $userE = $_POST['email'];
        $pass = $_POST['password'];
        //prevent SQL injection.
        $query    = $conn->prepare("SELECT * FROM users WHERE Email=?
                     AND password = ?");
        $query -> bind_param("ss",$userE,$pass);
        $query-> execute();
        $result =  $query->get_result();
      
        if ($row=mysqli_fetch_array($result)) {
            $_SESSION['Email'] = $userE;
            $_SESSION['ID'] = $row[0];
            $_SESSION['username']=$row[1];
           
            if($row['type']=="hiker")
            {
            // Redirect to user dashboard page
            header("Location:../home.php");
            }
            elseif($row['type']=="admin")
            {
               
            // Redirect to user dashboard page
            header("Location:../Administrators/adminGroups.php");
            
            }
            elseif($row['type']=="auditor")
            {
               
            // Redirect to user dashboard page
            header("Location:../auditor/formView.php");
            
            }
            elseif($row['type']=="HR")
            {
               
            // Redirect to user dashboard page
            header("Location:../hr/investigation.php");
            
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Email/password.</h3><br/>
                  <p class='link'>Click <a href='login.php'>here</a> to login again.</p>
                  </div>";
        }
    } else {
?> 

<section class="header" >
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
                                       
                                        <li><a href="registration.php">Profile</a></li>
                                        <li><a href="../groups.php">Groups</a></li>
                                        <li><a href="../productPage.php">Shop</a></li>
                                        <li><a href="../trips.php">Trips</a></li>
                                      </ul>
                                    
                                      
                                    
                                
                            </div>
                         


  


               </div>
                 
                
                
               
        
                
                
                
                
            
			
		
			
       </div> 
	   </div>
	   </div>	 
	
    <div id="contact_form">
  <form class="form" method="post" action="" name="Login" style="border: 1px solid #fff;">
        <h1 class="login-title">Login</h1>
    
      
		 <label>
		<div class="input-group-prepend" style="margin-bottom: 15px;">
		<div class="input-group form-group">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						
						<input type="text" class="form-control"  required="true"  name="email" placeholder="Email Adress" autofocus="false">
						
					</div> 
					</label>
					
					
		 <label>
	
        <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control"required="true" name="password" placeholder="password" autofocus="false">
					</div>
				</label>	
					
					
					
        <input type="submit" id="Login" name="Login"onsubmit="return false" value="submit" class="login-button">
        <p class="link">Don't have an account? <a href="registration.php">Register Now</a></p>
  </div>
	  
	  </form>   </div>	 </section>
<?php
    }
?>


<!-- include Google hosted jQuery Library -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Start jQuery code -->
<script type="text/javascript">
$(document).ready(function() {
    $("#Login").click(function() { 

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
                'email'    : $('input[name=email]').val(), 
                'password'           : $('input[name=password]').val()
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

</body>
</html>
