<?php include('layout-files/import_files.php') ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Education</title>

	<?php
	include('layout-files/css-links.php')
	?>

</head>

<body>




	<?php include('layout-files/navigation-menu.php') ?>

	<!-- start banner Area -->
	<section class="banner-area relative about-banner" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						 Upcoming Events
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->


	<!-- Start content Area -->
	<section class="events-list-area section-gap event-page-lists">
		<div class="container">


			<?php
			$sql = "SELECT event_details.Event_id as event_id,event_details.Event_title as 
				event_title,event_details.Event_details as event_details, 
				event_type.Type_Image as event_type_pic,event_details.event_front_page as front_page,venue.Venue_name as venue_name,
				event_type.Type_name as event_type,event_details.Start_time as time
				 FROM event_details,event_type,venue WHERE event_details.venue_id=venue.venue_id and event_details.event_type_id=event_type.event_type_id";
			$result = $con->query($sql);
			// echo $con->error;
			?>
			<div class="row align-items-center">

				<?php
				while ($row = mysqli_fetch_array($result)) {
				?>
					<div class="col-lg-6 pb-30">
						<div class="single-carusel row align-items-center">
							<div class="col-12 col-md-6 thumb">
								<img class="img-fluid" src="img/events/
								<?php 
								if($row['front_page']=='')
								{
									echo $row['event_type_pic'];
								}
								else{
									echo $row['front_page'];
								}
								?>" alt="">
							</div>
							<div class="detials col-12 col-md-6">
								<p><?php echo $row['time'] ?></p>
								<a href="single-event-details.php?event_id=<?php echo $row['event_id'] ?>">
									<h4><?php echo $row['event_title'] ?></h4>
								</a>
								<p>
								<?php echo substr($row['event_details'],0,200) ?>
								</p>
							</div>
						</div>
					</div>

				<?php
				}
				?>

				
			</div>
		</div>
	</section>



	<!-- End ccontent Area -->



	<!-- start footer Area -->
	<?php include('layout-files/footer.php') ?>
	<!-- End footer Area -->

	<?php include('layout-files/js-links.php') ?>



</body>

</html>