<?php session_start();?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="layout/css/groups.css">
	
	 <link rel="stylesheet" href="layout/css/nav-bar.css">
	 <link rel="stylesheet" href="layout/css/footer.css">
<style>

.header{
    background: none;
  background-color:grey;
  margin-left: 0px;
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
</style>
</head>
<body style="background-color:grey;"class="header">
	<?php
include("nav-bar.php"); 
	include("chaticon.php"); ?>

           
             


<div class="row">
<form action="" method="post">
<?php
try{
require('login/db.php');

$gID= $_GET['groupID'];



$sql= "Select * from groups WHERE ID = '$gID' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);



if(isset($check))
               
                    {
                  
                    $name= $check['name'];
                    $des = $check['description'];
                    $loc= $check['location'];
                  

                 
               echo'  <img src="layout/photos/'.$check['imgName'].'" width="700" height="400">';
			 
               
                    echo ' 
                                        <h2> '.$name.'</h2>
                    <h3>Group Description</h3>
                    <h3>  '.$des.' <br></h3>
                    <h3>Location: '.$loc.' <br></h3>
                    
                    <p><input type="submit" class="new-btn" name="joined" value="Join This Group"></p>
                    
                   
                   ';
                  
                }
                else{
                    echo '<h2> please select the group you want to join </h2>';
                }

               
                if(isset($_SESSION['ID'])) 
                {

                if(isset($_POST['joined']))
{
  joined($gID, $conn);
}


                }
                else
                {
                 
                  echo'<script>
     alert("Please login")
     window.location.href="login/login.php";
     </script>';
                }


                function joined($gID, $conn){
                  $query    = "SELECT * FROM `members` WHERE groupID='$gID'
                  AND userID='".$_SESSION['ID']."'";
                   $repeted = mysqli_query($conn, $query) or die(mysql_error());
                   if ($repeted->num_rows > 0)
                   {
                    echo  '<script> alert("You are in this group already")
                    window.location.href="groups.php";
                    
                    </script>';
                   }
                   else{
                  $sql= "insert into members (userID,groupID) VALUES ('".$_SESSION['ID']."','$gID') ";
                  $result = mysqli_query($conn,$sql);
                  echo'<script>
                     alert("Congratulation!!! you are a part of this group now!")
                     window.location.href="groups.php";
                     </script>';
                }}

?>

                    <p><input type="button" class="new-btn" onclick="window.location.href='groups.php'" value="select another group" /></p>
</form>
<form method="get" action="groups_rating.php">
<?php
echo'
<p><button class="new-btn" name="groupID" value="'.$gID.'">Rating</button></p>
';

}catch(exception $e){

  echo'Message: an error has occured';
  

}
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
      <p> Copyright Reserverd<b> @MIU Hikers 2021</b></p>
    </div>
    
  </div>

  </footer>
</section>



</body>
</html>