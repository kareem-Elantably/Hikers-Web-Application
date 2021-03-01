
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
<body class="header" style="background-color:grey;" class="header">


           <?php include("../nav-bar.php");  ?>

         <?php require('../login/db.php');?>
<?php

$uID= $_GET['userID'];
$q="select type from users where ID='$uID'";
$adm=mysqli_query($conn, $q);
$ifAdm=mysqli_fetch_array($adm);

if($ifAdm['type']=='admin'||$ifAdm['type']=='auditor')
{
  echo'<form action="" method="post">';
  $sql="select * from messages ";
  $result= mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
  {

    //$uID=$row["ID"];
  echo'
  <table>
         <tr>
            <th>name</th>
           <th>subject</th>
           <th>message</th>
           <th>Show history</th>
           
           
         </tr>';

         while($row = $result->fetch_assoc()) 
         {

if($row['name']!="")
{
  if($row["status"]== 'unseen'){
   echo'
   <td>'.$row["name"].'</td>
    <td>'.$row["subject"].'</td>
    <td><b>'.$row["message"].'</b></td>
    
    
  ';
}else {
  echo'
  <td>'.$row["name"].'</td>
   <td>'.$row["subject"].'</td>
   <td>'.$row["message"].'</td>
   
 ';

}
echo'<td><button class="new-btn" name="show" value="'.$row["hikerID"].'">show </button></td>
    
</tr>';
}





}   

echo'</table>';
  }


  
  if (isset($_POST['show']))
  {

  
   
$sql="select * from messages where hikerID='".$_POST['show']."' ORDER BY time DESC ";
$query="update messages set status ='seen' where hikerID='".$_POST['show']."'  ";
$r= mysqli_query($conn,$sql);
$result=mysqli_query($conn,$query);
if ($r->num_rows > 0) 
  {
echo'<table>
         <tr>
         <th>Time</th>
            <th>Name</th>
           <th>Message</th>
           </tr><tr>';
while($row = $r->fetch_assoc()) 
{
  $uID=$row["ID"];
if($row['adminID']!=0 )
{
	if($row['adminID']==0){
		echo'<td>'.$row["time"].'</td><td>AUDITOR</td><td>'.$row["message"].'</td>';
	}
	else 
	{
		echo'<td>'.$row["time"].'</td><td>ADMIN</td><td>'.$row["message"].'</td>';
	}

  
}
else{
  echo'<br>
  <td>'.$row["time"].'</td><td>'.$row["name"].' </td><td> '.$row["message"].'</td> ';

}
echo'</tr>';
  }
 echo' <tr> <td> <input  class="inputFields"  type="text" name="message" value="" id="Message" placeholder="Message" /></td>
 <td><button class="new-btn" name="respond" value="'.$_POST['show'].'">Respond </button></td></tr>';
}else{echo'error';}
  echo'</table>';
}
}

else {echo"<h1>No members in this group</h1>";}

      echo'</form>
      ';
      
if(isset($_POST['respond']))
{

	$check="SELECT * FROM users WHERE ID='$uID'";

	$res=mysqli_query($conn, $check);
	if($res->num_rows>0){
		while($x = $res->fetch_assoc()) {
			if($x['type']=="auditor"){
				  $mess=$_POST['message'];
  $sql = "INSERT INTO   messages (hikerID,message, time,aID)  VALUES ('".$_POST['respond']."','$mess',NOW(),'$uID');";
  if (mysqli_query($conn, $sql)) {
          echo '<script> location.href=http://localhost/hikers/history.php?userID='.$uID.'";
           alert("Message Sent !!!");
         </script>';
          
     } else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
     }

			}
			else if($x['type']=="admin"){
				  $mess=$_POST['message'];
  				$sql = "INSERT INTO   messages (hikerID,message, time,adminID)  VALUES ('".$_POST['respond']."','$mess',NOW(),'$uID');";
  			if (mysqli_query($conn, $sql)) {
         		 echo '<script> location.href=http://localhost/hikers/history.php?userID='.$uID.'";
           		alert("Message Sent !!!");
        		 </script>';
          
     } else {
      echo "Error: " . $sql . "" . mysqli_error($conn);
     }
			}

		}


	}

 
     mysqli_close($conn);

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
