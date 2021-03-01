
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HIKERS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="layout/css/nav-bar.css">
  <style>
  	
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



.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: grey;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
	background-color: black; color:white;}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

 <section >
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
                                <a class="navbar-brand" href="http://localhost/hikers/home.php">HIKERS</a>
                            </div>
                          
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                          
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <div class="col-lg-8">
                                     
									   
                     <?php
                   
			

require('login/db.php');
                                
$sql= "Select * from users WHERE ID =".$_SESSION['ID']." ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);

    $ID=$_SESSION['ID'];
                                    if($check['type']=='hiker')
{
     if(isset($_SESSION['ID'])) 
                    {
                     
                                
   echo '  

          
                    <ul class="nav navbar-nav nav-links">
                                        
                                        <li><a href="http://localhost/hikers/login/profile.php?prof=0">Profile</a></li>
                                        <li><a href="http://localhost/hikers/groups.php">Groups</a></li>
                                        <li><a href="http://localhost/hikers/productPage.php">Shop</a></li>
                                        <li><a href="http://localhost/hikers/trips.php">Trips</a></li>
                                      </ul>
									  
									   <ul class="nav navbar-nav navbar-right" >
             
            	<div class="dropdown">
         <li >	    <img class="img-thumbnail rounded-circle" style=" border-radius: 50%; width: 50px; height: 50px;" src="http://localhost/hikers/layout/photos/'.$check['profilePic'].'"> '.$check['username'].' 
         </li>
				

  <div class="dropdown-content">

 <a href="http://localhost/hikers/myGroups.php"> My Groups</a>
<a href="http://localhost/hikers/myTrips.php"> My Trips</a>
<a href="http://localhost/hikers/cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a>
 <a href="http://localhost/hikers/login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a>
  </div>
</div>
			 
                      </ul>
 
 
   	
                      </div>
                     </div>  
                
					
	
        ';} 
                                  }
                                  
                                  else if($check['type']=='admin')
                                  {
                                    
     if(isset($_SESSION['ID'])) 
                    {
                     
                                
   echo '  

          
                       <ul class="nav navbar-nav nav-links">
             
                                      <li><a href="http://localhost/hikers/login/profile.php?prof=0">Profile</a></li>
                                      <li><a href="Administrators/admins.php">Admins</a></li>
                                      <li><a href="Administrators/adminTrips.php">Trips</a></li>
                                      <li><a href="Administrators/adminUsers.php">Users</a></li>
                                      <li><a href="Administrators/adminGroups.php">Groups</a></li>
                                      <li><a href="Administrators/adminProducts.php">Products</a></li>
									  </ul>
									    <ul class="nav navbar-nav navbar-right" >
            	<div class="dropdown">
         <li >	    <img class="img-thumbnail rounded-circle" style=" border-radius: 50%; width: 50px; height: 50px;" src="../layout/photos/'.$check['profilePic'].'"> '.$check['username'].' 
         </li>
				

  <div class="dropdown-content">
 <a href="http://localhost/hikers/login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a>
 <li><a href="Administrators/adminProducts.php">Products</a></li>
  <li><a href="history.php">Messages History</a></li>

  </div>
</div>
			 
                      </ul>
 
 
   	
                      </div>
                     </div>  
                
					
	
        ';} 
								  }
 else if($check['type']=='auditor')
                                  {
                               
     if(isset($_SESSION['ID'])) 
                    {
                     
                                
                                       
   echo '  

          <ul class="nav navbar-nav nav-links">
                                         
                                  
                                        <li><a href="http://localhost/hikers/auditor/investigationS.php?userID='.$ID.'">Investigation Requests</a></li>
                                        <li><a href="http://localhost/hikers/auditor/formView.php">Form view</a></li>
										 <li><a href="http://localhost/hikers/auditor/auditorHis.php?userID= '.$ID.'">Messages </a></li>

                                      </ul>
                                     
                                      <ul class="nav navbar-nav navbar-right">
                     
                   
             
            	<div class="dropdown">
         <li >	    <img class="img-thumbnail rounded-circle" style=" border-radius: 50%; width: 50px; height: 50px;" src="../layout/photos/'.$check['profilePic'].'"> '.$check['username'].' 
         </li>
				

  <div class="dropdown-content">
 <a href="http://localhost/hikers/login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a>
  </div>
</div>
			 
                      </ul>
 
 
   	
                      </div>
                     </div>  
                
					
	
        ';} 
								  }

 else if($check['type']=='HR')
                                  
     if(isset($_SESSION['ID'])) 
                    {
                     
                                
   echo '  

                     <ul class="nav navbar-nav nav-links">
                                         <li><a href="http://localhost/hikers/login/profile.php?prof=0">Profile</a></li>
                                      <li><a href="http://localhost/hikers/auditor/auditorHis.php?userID='.$ID.'">Messages </a></li>
                                        <li><a href="http://localhost/hikers/hr/investigationS.php?userID='.$ID.'>">Investigation Requests</a></li>
                                       

                                      </ul>
									  
									    <ul class="nav navbar-nav navbar-right">
                   
             
            	<div class="dropdown">
         <li >	    <img class="img-thumbnail rounded-circle" style=" border-radius: 50%; width: 50px; height: 50px;" src="layout/photos/'.$check['profilePic'].'"> '.$check['username'].' 
         </li>
				

  <div class="dropdown-content">
 <a href="http://localhost/hikers/login/logout.php"><span class="glyphicon glyphicon-user"></span> Sign out</a>

  </div>
</div>
			 
                      </ul>
 
 
   	
                      </div>
                     </div>  
                
					
	
        ';} 


                                  
                                  
				?>
										
										
										
      
                                       
                                   
                         


  

               </div>
                 </div>
                
                
                </div>
        
                
                
                
                
            </div>
			
			
        </section>
  
  

</body>
</html>
