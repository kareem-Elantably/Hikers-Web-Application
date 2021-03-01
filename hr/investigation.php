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
  margin-right: 50px;
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

.new-btn {
  border: 1px solid rgba(255, 255, 255, 1);
  background: grey;
  font-size: 18px;
  color: white;
  margin-top: 20px;
  padding: 10px 50px;
  cursor: pointer;
  transition: .4s;
  margin-bottom:10px;
	  }
	  .new-btn:hover {
	background-color: black;
  opacity: 0.7;

}	

	</style>
</head>
<body class="header" style="background-color:grey;" class="header">
	

           <?php include("../nav-bar.php");  ?>
	
	

          <form action="" method="post">

<?php
try{
 require('../login/db.php');

//$gID= $_GET['groupID'];
$sql="select * from investigation where approval='0' ORDER BY ID DESC ";
$result= mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
  {
    echo'
    <div class="col-12">
   
    <table>
      <tr>
         
        <th>auditor ID</th>
        <th>Admin ID</th>
        <th>Admin Name</th>
        <th>Complain</th>
        <th>Accept</th>
        <th>Reject</th>
        
      </tr>
  </div>
  ';
      while($row = $result->fetch_assoc()) 
      {
echo'
  
  <tr>
    <td>'.$row["auditorID"].'</td>
    <td>'.$row["adminID"].'</td>
    <td>'.$row["adName"].'</td>
    <td>'.$row["Description"].'</td>
    <td><button class="new-btn" name="accept" value="'.$row["ID"].'">Accept </button></td>
    <td><button class="new-btn" name="reject" value="'.$row["ID"].'">Reject </button></td>
  </tr>
  
';

   
}
echo'</table>';
}
else {echo"<center><h2>There are no problems to investigate</h2></center>";}

      echo'</form>
      ';
      
      if(isset($_POST['reject']))
      {
        $sql="delete from investigation where ID='".$_POST['reject']."' ";
        $result= mysqli_query($conn,$sql);
        if($result)
        {
          echo  '<script> 
           location.href="http://localhost/hikers/hr/investigation.php";
          
          </script>'; 
           exit;
        }
 
      }
      if(isset($_POST['accept']))
      {

        

            $queryy="update investigation set approval='1' where ID='".$_POST['accept']."'";
            
            if(mysqli_query($conn,$queryy)){

              echo  '<script> 
              location.href="http://localhost/hikers/hr/investigation.php";
             alert("Penalty added");
             </script>'; 
            }

            
          }
        

            
   }catch(exception $e){

  echo'Message: an error has occured';
  

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