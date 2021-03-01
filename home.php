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
	<link rel="stylesheet" href="layout/css/home.css">
    <link href="layout/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="layout/owl-carousel/owl.theme.css" rel="stylesheet">
	
	<style>
.header{
  
background: url(../layout/photos/hikers.jpg) ;
  margin-left: 0px;
}

footer{
background-color:grey;}
</style>
</head>

<body class="index-page">
	<section class="main-header">
		
		
		<?php include("nav-bar.php"); ?>  
	
</section>
	






	<div id="page-content">
		
	
	
	
	
	
		<section class="box-content box-1 box-style-1">
			<div class="container">
				<div class="row">
					<div class="heading">
						
						<h1 class="title">How We Work</h1>
						<hr class="line">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-3 col-md-6 ">
						<div class="box-item">
							<div class="wrap-icon">
								<div class="hexagon">
									<div class="hexagon-inner">
										<div class="hexagon-inner-content">
											<i class="fa fa-calendar fa-3x"></i>
										</div>
									</div>
									<span></span>
								</div>
							</div>
							<h3>TRIPS</h3>
							<p>Many trips that you can join with our expert team </p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-3 col-md-6 ">
						<div class="box-item">
							<div class="wrap-icon">
								<div class="hexagon">
									<div class="hexagon-inner">
										<div class="hexagon-inner-content">
											<i class="fa fa-check-square-o fa-3x"></i>
										</div>
									</div>
									<span></span>
								</div>
							</div>
							<h3>SHOP</h3>
							<p>We have a big shop selling all the hiking equipments you are going to need</p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-3 col-md-6 ">
						<div class="box-item">
							<div class="wrap-icon">
								<div class="hexagon">
									<div class="hexagon-inner">
										<div class="hexagon-inner-content">
											<i class="fa fa-book fa-3x"></i>
										</div>
									</div>
									<span></span>
								</div>
							</div>
							<h3>GROUPS</h3>
							<p>you can join a hiking group and be with them in your upcoming hiking and share your experience</p>
						</div>
					</div>
					<div class="col-lg-3 col-sm-3 col-md-6 ">
						<div class="box-item">
							<div class="wrap-icon">
								<div class="hexagon">
									<div class="hexagon-inner">
										<div class="hexagon-inner-content">
											<i class="fa fa-diamond fa-3x"></i>
										</div>
									</div>
									<span></span>
								</div>
							</div>
							<h3>EXPERIENCE</h3>
							<p>All the the information that  you wan t to know can be collected through you group mates</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		
		
		
		
		
		
		
		
		
		<section class="box-content box-2 box-style-2">
			<div class="container">
				<div class="row">
					<div class="heading">
						<h1 class="title">OUR TRIPS</h1>
						<hr class="line">
					</div>
				</div>
				<div class="row">
					<div id="owl-travel" class="owl-carousel">
					

 <?php

   require('login/db.php');

  $sql = "Select * from trips";
  $result = $conn->query($sql);
  

 if ($result->num_rows > 0) 
  {
    

 while($row = $result->fetch_assoc()) 
      {
        echo '
       
       
	   <a href="http://localhost/hikers/joinTrips.php?tripID='.$row['ID'].'">
					<div class="item">
							<div class="box-entry home-post " style="background:url(layout/photos/'.$row['tripImg'].')  ">
								
								<div class="box-entry-inner"> 
								
									<div class="entry-details">
									
										<div class="entry-des">
											<h3>'.$row["location"].'</h3>
											
											<ul class="fancy-list">
												
												<li>'.$row["distance"].' KILOMETER</li>
												<li>'.$row["description"].'</li>
											</ul>
										</div>
										<div class="entry-bottom clearfix">
											<p class="pro-price-content" >
												<span class="price">  '.$row["fees"].'EGP </span>
											
											</p>
										</div>
									</div>
								
								</div>
							</div>
						</div>
						</a> 
	   ';
        
      }
    
  } 
  else {
      echo "0 results";
  }
  
  ?>			 
						 
					</div>
				</div>
			</div>
		</section>
		
		
		
	
	
	
	
	
	
		<section class="box-content box-3">
			<div class="container">
				<div class="row">
					<div class="heading">
						<h1 class="title">OUR GROUPS</h1>
						<hr class="line">
					</div>
				</div>
			
 <?php

  

  $sql = "Select * from groups";
  $result = $conn->query($sql);
  

 if ($result->num_rows > 0) 
  {
    

 while($row = $result->fetch_assoc()) 
      {
        echo '
       
        

  
 	   <a href="http://localhost/hikers/join.php?groupID='.$row['ID'].'">

				<div class="isotopeContainer">
				
					<div class="col-lg-4 col-sm-4 col-md-6 isotopeSelector art">
						<div class="portfolio-box zoom-effect">
							<img src="layout/photos/'.$row['imgName'].'" class="img-responsive" alt="" style="width:100%; height:100%; object-fit:cover;" >
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-name">
									'.$row["name"].'
									</div>
									<div class="project-category">
								'.$row["location"].'<br>Rated: '.$row["rating"].'/5 Stars
									</div>
								</div>
							</div>
						</div>
					</div>
				
				
			
				</div>
				</a>
				';
			
			      }
     
  } 
  else {
      echo "0 results";
  }
			//$conn->close();
  ?></div> 
		</section>
		
		<!-- ////////////Content Box 04 -->
	
		
	</div>
	

		</div><!-- .Wrap footer -->
	</footer>

	<script>
	jQuery(document).ready(function($) {
		var myTheme = window.myTheme || {},
		$win = $( window );
		myTheme.Isotope = function () {
			// 4 column layout
			var isotopeContainer = $('.isotopeContainer');
			if( !isotopeContainer.length || !jQuery().isotope ) return;
			$win.load(function(){
				isotopeContainer.isotope({
					itemSelector: '.isotopeSelector'
				});
			$('.isotopeFilters').on( 'click', 'a', function(e) {
					$('.isotopeFilters').find('.active').removeClass('active');
					$(this).parent().addClass('active');
					var filterValue = $(this).attr('data-filter');
					isotopeContainer.isotope({ filter: filterValue });
					e.preventDefault();
				});
			});
		};
		myTheme.Isotope();

	});</script>
	
	<!-- carousel -->
	<script src="layout/owl-carousel/owl.carousel.js"></script>
    <script>
    $(document).ready(function() {
	  $("#owl-travel").owlCarousel({
        autoPlay: 3000,
        items : 4,
		itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,2],
		navigation: false,
		pagination: true
      });
      $("#owl-brand").owlCarousel({
        autoPlay: 3000,
        items : 6,
		itemsDesktop : [1199,4],
        itemsDesktopSmall : [979,2],
		navigation: false,
		pagination: false
      });
    });
    </script>
	
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
