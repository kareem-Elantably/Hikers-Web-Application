<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <title>Hikers</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="layout/css/footer.css">
	 
    <link rel="stylesheet" href="layout/css/nav-bar.css">
    <link href="layout/owl-carousel/owl.theme.css" rel="stylesheet">
	
	<style>
.header{
  
background-color:grey;
  margin-left: 0px;
}

footer{
background-color:grey;}

</style>
</head>

<body  class="header">



  

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
                                        
                                        <li><a href="groups.php">Groups</a></li>
                                        <li><a href="productPage.php">Shop</a></li>
                                        <li><a href="trips.php">Trips</a></li>
                                      </ul>
									   <ul class="nav navbar-nav navbar-right">
                     <?php
                    
                    if(isset($_SESSION['ID'])) 
                    {
                     
                      echo'
                     
                     
                      <li><a href="login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a></li>
                      <li><a href="myGroups.php"> My Groups</a></li>
                      <li><a href="myTrips.php"> My Trips</a></li>
                        ';
                      
                    }
                    else
                    {
                    echo'       
                    <li><a href="login/registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                    }
                    ?>
    </ul>
                                    </div>
                                    
                               
                              
                            </div>
                         
  </div>
               </div>
                 </div>

		
    <div class="page-width text-center" style="color:white;">
    
							
							<br><br><br><br>
				<h3 style="font-size: 50px;">OOOPS..!!</h3>			
        <h1 style="font-size: 80px;">404</h1>
		<br>			<h5 style="font-size: 30px;">PAGE NOT FOUND</h5>
 
  </div>

</body>
</html>