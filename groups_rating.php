<?php session_start();

if(!isset($_SESSION['ID']))
{ 
  echo'<script>
alert("Please login")
window.location.href="login/login.php";
</script>';
} 

?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
</head>
       <link rel="stylesheet" href="layout/css/rating.css">
	
	 <link rel="stylesheet" href="layout/css/nav-bar.css">
	 <link rel="stylesheet" href="layout/css/footer.css">
<style>

.header{
    background: none;
background-color:grey;
  margin-left: 50px;
}
div {

  background-color: grey;
}

</style>
</head>
<body class="header" style= "background-color:grey">

           	<?php 
			include("nav-bar.php");
			
			include("chaticon.php"); ?>
              
			

  <?php require('login/db.php');?>
  
  <?php
  
if(isset($_GET['groupID']))
  {
	   $gID= $_GET['groupID'];
  
$query = mysqli_query($conn,"SELECT count(rating) as TOTAL from groups_rating where groupID='$gID'");
    $row = mysqli_fetch_array($query);
    $G_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from groups_rating where groupID='$gID' and rating='1'");
    $row = mysqli_fetch_array($query);
    $one_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from groups_rating where groupID='$gID'and rating='2'");
    $row = mysqli_fetch_array($query);
    $two_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from groups_rating where groupID='$gID'and rating='3'");
    $row = mysqli_fetch_array($query);
    $three_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from groups_rating where groupID='$gID'and rating='4'");
    $row = mysqli_fetch_array($query);
    $four_TOTAL=$row['TOTAL'];
    $query = mysqli_query($conn,"SELECT count(rating) as TOTAL from groups_rating where groupID='$gID'and rating='5'");
    $row = mysqli_fetch_array($query);
    $five_TOTAL=$row['TOTAL'];


 $sql= "Select * from groups WHERE ID = '$gID' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
$query = mysqli_query($conn,"SELECT AVG(rating) as AVGRATE from groups_rating where groupID='$gID'");
            $row = mysqli_fetch_array($query);
            $G_AVGRATE=$row['AVGRATE'];


if(isset($check))
                  {     $rate = $check['rating'];
				    
				 echo' <div class="container" >
    
		<div class="row" >			
          <div class="col-sm-4" >
			<div class="rating-block" >
			 <h4> The total number of reviews: </h4>
			  <h2 class="bold padding-bottom-7"> '.$G_TOTAL.' reviews</h2>
					

          <h4>Average user rating:</h4>
          <h2 class="bold padding-bottom-7"> '.intval($G_AVGRATE).'<small style="color:white"> /5</small></h2>
			   <input id="rate" name="rate" disabled class="rating rating-loading" value="'.$G_AVGRATE.'"  data-max="5" data-step="1" data-size="xs">
				</div></div>
				';
				 }
			

echo'<div class="col-sm-3">	
<br><br>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width:20%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$one_TOTAL.'</div>
				</div>
			';
echo'<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$two_TOTAL.'</div>
					</div>';
echo' 	<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$three_TOTAL.'</div>
				</div>';
echo'<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$four_TOTAL.'</div>
				</div>
				';
echo'<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">'.$five_TOTAL.'</div>
				</div>
				
				
					</div>			
		</div></div></div>';	?>
<br><br><br>

<div class="row" style= "background-color:grey">
<form  method ="POST" action="">
  <div class="rate">
  <div class="container">
  <table>
  <tr> 

   
    <td> <input id="rate" name="rate" class="rating rating-loading" value="0" data-min="0" data-max="5" data-step="1" data-size="xs"></td>

   
</div>

  </tr>
  </table>
<br>
<table>
<tr>
<td><div class="media mt-3 shadow-textarea">
      
      <div class="media-body">
        
        <div class="form-group basic-textarea rounded-corners">
          <input class="form-control z-depth-1" name="comment" id="exampleFormControlTextarea345" rows="3" placeholder="Write your comment..."></input>
   
	  </div>
      </div>
    </div> </td>
	
</tr>
<tr>
<td><input class="new-btn " type="submit"> </td> 
</tr>
 </table>


</form>

                   
                   </div>



</div>
      

    <br><br>
			
		
	<?php
$query    = "SELECT * FROM `groups_rating` WHERE groupID='$gID'";
$result=mysqli_query($conn,$query);
//$check = mysqli_fetch_array($result);

if ($result->num_rows > 0) 
  {
while($check = $result->fetch_assoc())
{
$sql= "SELECT * FROM users WHERE ID='".$check['userID']."'";
$us=mysqli_query($conn,$sql);
$userName = mysqli_fetch_array($us);
$today = date("F j, Y, g:i a");
   echo '

  <br>
  <tr> 
 <td> <div class="review-block" style="background-color: grey;" >
          <div class="row">
            <div class="col-sm-3">
              
              <div class="review-block-name"><a href="#"><h3> '.$userName["username"].' : </h3></a></div>
              <div class="review-block-date">'.$today.'<br/></div>
            </div>
  <input id="rate" name="rate" disabled class="rating rating-loading" value="'.$check["rating"].'"  data-max="5" data-step="1" data-size="xs">
              <div class="review-block-title">'.$check["comment"].'</div>
              
            </div>
          </div>
          
          </div></td> 
          </tr>

  ';
}
  }
  else{echo'<center><h2>Be the first to rate this group</h2></center>';}
  }

?>




  <?php




     if($_POST)
{
  $rate= $_POST['rate'];
  $comment= $_POST['comment'];
  $comment=filter_var($comment, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
              if(isset($_GET['groupID']))
              {
                $gID= $_GET['groupID'];
        
                $query    = "SELECT * FROM `groups_rating` WHERE groupID='$gID'
                AND userID='".$_SESSION['ID']."'";
                 $repeted = mysqli_query($conn, $query) or die(mysql_error());
                 if ($repeted->num_rows > 0)
                 {
                   $sql= "update `groups_rating` set  rating='$rate',comment='$comment' where userID= '".$_SESSION['ID']."' and groupID='$gID' ";
                   $result = mysqli_query($conn,$sql); 

                   $sql="SELECT AVG(rating) as AVGRATE from groups_rating where groupID='$gID'";
                $query = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($query);
                $G_AVGRATE=$row['AVGRATE'];
          
            $q= "update groups set rating ='$rate' WHERE ID = '$gID' ";
            $resultt = mysqli_query($conn,$q);

            echo '<script> location.href="http://localhost/hikers/rating.php?productID='.$pID.'";
            alert("Thank you for your opinion !");
          </script>';
                 }
                 else{
                $sql= "INSERT INTO `groups_rating` ( `userID`, `groupID`, `rating`,comment) VALUES ( '".$_SESSION['ID']."', '$gID', '$rate','$comment') ";
                $result = mysqli_query($conn,$sql); 

                $sql="SELECT AVG(rating) as AVGRATE from groups_rating where groupID='$gID'";
                $query = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($query);
                $G_AVGRATE=$row['AVGRATE'];

                $q= "update groups set rating ='$G_AVGRATE' WHERE ID = '$gID' ";
                $resultt = mysqli_query($conn,$q);
                echo '<script> location.href="http://localhost/hikers/rating.php?productID='.$pID.'";
             alert("Thank you for your opinion !");
          </script>';
                   }
              $qq= "update `groups` set  rating='$G_AVGRATE' where ID='$gID' ";
              $rr = mysqli_query($conn,$qq); 
            
            
            }
              else{echo'<script>alert("Error")</script>';}
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