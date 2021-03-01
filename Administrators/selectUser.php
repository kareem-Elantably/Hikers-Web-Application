
<?php session_start();?>
<!DOCTYPE html>
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
  margin-left: 50px;
}

table, th, td {
  padding: 5px;
  margin: 0;
  text-align: center;
  font-size: 15px;
  color:white;
}

th, td {
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    border-color:white;
}

table {
  width: 90%;
  margin: 0 auto;
    color:white;
  max-width: 80%;
}
h3, p, h1, h2, b
{    color:white;}


	</style>
</head>
<body class="header" style="background-color:grey;" class="header">


         <?php include("../nav-bar.php");  ?>

     
		 
<form action="" method="post">
<?php require('../login/db.php');?>
<?php
$gID= $_GET['groupID'];
$sql="select * from users where type='hiker'";
$result= mysqli_query($conn,$sql);


    
if ($result->num_rows > 0) 
  {
   
    $check = 0;
      while($row = $result->fetch_assoc()) 
      {
        $uID=$row["ID"];
        $sql="select * from members where userID='$uID' and groupID='$gID'";
$rep= mysqli_query($conn,$sql);

if ($rep->num_rows <= 0) 
  {
    $check++;
    if($check==1)
    { echo'
      <div class="col-12">
      
       <table>
         <tr>
            <th>ID</th>
           <th>Username</th>
           <th>Email</th>
           <th>Age</th>
           <th>Add</th>
           
         </tr>
     </div>
      ';}
      echo'

    
    <tr>
	    <td>'.$row["ID"].'</td>
      <td>'.$row["username"].'</td>
      <td>'.$row["Email"].'</td>
      <td>'.$row["age"].'</td>
      <td><button class="new-btn" name="userID" value="'.$row["ID"].'">Add user to this group</button></td>
    </tr>

  ';
   
  }
  
  
}
if($check == 0)      
{
  echo"<h1>All users are in this group</h1>";
}

}         

       


else {echo"<h1>No users to add</h1>";}
     

if(isset($_POST['userID']))
{
  
  $query    = "SELECT * FROM `members` WHERE groupID='$gID'
  AND userID='".$_POST['userID']."'";
   $repeted = mysqli_query($conn, $query) or die(mysql_error());
   if ($repeted->num_rows > 0)
   {
    echo  '<script> alert("the user is in this group already")
    location.href="http://localhost/hikers/Administrators/groupUsers.php?groupID='.$gID.'";
    
    </script>';
   }
   else{
  $sql="insert into members (groupID,userID) values ('".$gID."','".$_POST['userID']."')";
  $result= mysqli_query($conn,$sql);
  if($result)
  {
    mysqli_close($conn); 
    echo  '<script> 
    location.href="http://localhost/hikers/Administrators/groupUsers.php?groupID='.$gID.'";
    
    </script>'; 
    exit;

  }
}

}

      
      
      
?>

</table>
   
	
	
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
