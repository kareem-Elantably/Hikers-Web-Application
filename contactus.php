<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
   
<title>update</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
         <link rel="stylesheet" href="layout/css/nav-bar.css">
	 
		  <link rel="stylesheet" href="layout/css/contactus.css">
		  	<style>
	
.header{
    background: none;
  background-color:grey;
  margin-left: 10px;
}

#history {
  height: 380px;
  overflow-y: auto;
}

	</style>
</head>


<body class="header">
<?php 
include("nav-bar.php");
require('login/db.php');?>


  	
	
  <div class="contactusSection">	
	  
    <div class="info">
   <div id="history">
     <?php
     try{
   $sql="select * from messages where hikerID='$ID' ORDER BY time DESc; ";
$r= mysqli_query($conn,$sql);
if ($r->num_rows > 0) 
  {

while($row = $r->fetch_assoc()) 
{
  
if($row['adminID']!=0) 
{

  
  echo'<div class="message">
  ADMIN:'.$row["message"].'
</div>';
}
else{
 
  echo'<div class="message">
  '.$row["name"].' : '.$row["message"].'
</div>';
}

  }

}else{echo'How can we help you';}
}catch(exception $e){

  echo'Message: an error has occured';
  

}
?>
</div>
</div>
<form class="contactus" action="" method="POST" name="contactus" >
<h2>Contact us</h2>

  <ul class="noBullet">
  
 
    <li>
        <label for="subject"></label>
  <input  class="inputFields"  type="text" name="subject" value="" id="subject" placeholder="Subject" oninput="return userNameValidation(this.value)" required/>
     </li>
  
 
  
      <li>
        <label for="Message"></label>
  <input  class="inputFields"  type="text" name="message" value="" id="Message" placeholder="Message" oninput="return userNameValidation(this.value)" required/>
     </li>
	 
	 <li id="center-btn">
<input type="submit"   id="send-btn" alt="send"   name="send" value="submit" >
  </li>
  
  </ul>
</form>
</div>



<?php 
try{
    require('login/db.php');
    
    
    if(isset($_POST['send']))
    {  
    $ID=$_SESSION['ID'];
    $mess=$_POST['message'];
    $sub=$_POST['subject'];
    $name=$_SESSION['username'];
    $t = date('Y-d-m H:i:s');


     $sql = $conn->prepare("INSERT INTO   messages (hikerID,message, time,subject,name,status,adminID)  VALUES ('$ID',?,NOW(),?,?,'unseen','0')");
     $sql -> bind_param('sss',$mess,$sub,$name);
     $sql-> execute();
     $sql->get_result();

    
            echo '<script> window.location.href="contactus.php";
             alert("Message Sent !!!");
           </script>';
     
       mysqli_close($conn);
    }catch(exception $e){

  echo'Message: an error has occured';
  

}
    
    }
    
    


/*
    $ID=$_SESSION['ID'];
    $q="select type from users where ID='$ID'";
$adm=mysqli_query($conn, $q);
$ifAdm=mysqli_fetch_array($adm);
if(isset($_POST['send']))
{  
$mess=$_POST['message'];
$sub=$_POST['subject'];
$name=$_POST['name'];
$t = date('Y-d-m H:i:s');

$sql = "INSERT INTO   messages (hikerID,message, time,subject,name)  VALUES ('$ID','$mess',NOW(),'$sub','$name');";
//$sql1= "INSERT INTO   mhistory (UserID,Message, Time)  VALUES ('$ID','$mess',NOW());";
if (mysqli_query($conn, $sql)) {
        echo '<script> window.location.href="contactus.php";
         alert("Message Sent !! !");
       </script>';
        
   } else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
   }
   mysqli_close($conn);


}

if($ifAdm['type']=='admin')
{
  echo'<form action="" method="post">';
  $sql="select * from messages ";
  $result= mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
  {
  echo'
  <table>
         <tr>
            <th>name</th>
           <th>subject</th>
           <th>message</th>
           <th>respond</th>
           
           
         </tr>';
         while($row = $result->fetch_assoc()) 
         {
   echo'
   <td>'.$row["name"].'</td>
    <td>'.$row["subject"].'</td>
    <td>'.$row["message"].'</td>
    
    <td><button class="button" name="show" value="'.$row["hikerID"].'">show </button></td>
    <td><button class="button" name="respond" value="'.$row["hikerID"].'">Respond </button></td>

    </tr>
  ';



}   
echo'</table></form>';
  }



  if (isset($_POST['show']))
  {
   
$sql="select * from messages where hikerID='".$_POST['show']."' ORDER BY time ASC; ";
$r= mysqli_query($conn,$sql);
if ($r->num_rows > 0) 
  {
echo'<table>
         <tr>
            <th>name</th>
           <th>message</th>
           </tr>';
while($row = $r->fetch_assoc()) 
{
  
if($row['adminID']!=0)
{
  echo'<td>ADMIN:'.$row["message"].'</td>';
}
else{
  echo'<br>
<td>'.$row["name"].' : '.$row["message"].'</td> ';

}
echo'</tr>';
  }

}else{echo'error';}
  echo'</table>';
}
}


*/
?>

</body>
</html>