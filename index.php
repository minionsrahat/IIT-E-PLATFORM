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
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-between">
				<div class="banner-content col-lg-9 col-md-12">
					<h1 class="text-uppercase">
						We Ensure better education
						for a better world
					</h1>

				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start feature Area -->
	<section class="feature-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="single-feature">
						<div class="title">
							<h4>Event Calendar</h4>
						</div>
						<div class="desc-wrap">
							<p>
								There are a lot of events always occur in IIT. So, students and teachers find it difficult to manage all the event according to their free time. Our event calendar will throw update to everyone if any event is happening soon..
							</p>
							<a href="event-calendar.php">View Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-feature">
						<div class="title">
							<h4>Online Forums</h4>
						</div>
						<div class="desc-wrap">
							<p>
								From enhancing engagement to making thinking visible and helping build community, discussion forums can have a tremendous impact on our online course. Considering its importance in our institution we make a discussion forums.
							</p>
							<a href="discussion-question-list.php">Join Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-feature">
						<div class="title">
							<h4>Online Library</h4>
						</div>
						<div class="desc-wrap">
							<p>
								Internal library inside the institute does not have a automation system. Students find it difficult to get books from it. So our Online library will provide a manageable system for the users
							</p>
							<a href="#">View Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End feature Area -->

	<!-- Start popular-course Area -->

	<!-- End popular-course Area -->


	<!-- Start search-course Area -->
	<section class="search-course-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-6 col-md-6 search-course-left">
					<h1 class="text-white">
						Get reduced fee <br>
						during this Summer!
					</h1>
					<p>
						inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
						standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on
						the job is beyond reproach.
					</p>
					<div class="row details-content">
						<div class="col single-detials">
							<span class="lnr lnr-graduation-hat"></span>
							<a href="#">
								<h4>Expert Instructors</h4>
							</a>
							<p>
								Usage of the Internet is becoming more common due to rapid advancement of technology and
								power.
							</p>
						</div>
						<div class="col single-detials">
							<span class="lnr lnr-license"></span>
							<a href="#">
								<h4>Certification</h4>
							</a>
							<p>
								Usage of the Internet is becoming more common due to rapid advancement of technology and
								power.
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 search-course-right section-gap">
					<form class="form-wrap" action="#">
						<h4 class="text-white pb-20 text-center mb-30">Search for Available Course</h4>
						<input type="text" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'">
						<input type="phone" class="form-control" name="phone" placeholder="Your Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Phone Number'">
						<input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'">
						<div class="form-select" id="service-select">
							<select>
								<option datd-display="">Choose Course</option>
								<option value="1">Course One</option>
								<option value="2">Course Two</option>
								<option value="3">Course Three</option>
								<option value="4">Course Four</option>
							</select>
						</div>
						<button class="primary-btn text-uppercase">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End search-course Area -->


	<!-- Start upcoming-event Area -->
	<section class="upcoming-event-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Upcoming Events of our Institute</h1>

					</div>
				</div>
			</div>
			<div class="row">
				<div class="active-upcoming-event-carusel">
					<?php
					$sql = "SELECT event_details.Event_id as event_id,event_details.Event_title as 
					event_title,event_details.Event_details as event_details, 
					event_type.Type_Image as event_type_pic,event_details.event_front_page as front_page,venue.Venue_name as venue_name,
					event_type.Type_name as event_type,event_details.Start_time as time
					 FROM event_details,event_type,venue WHERE event_details.venue_id=venue.venue_id and event_details.event_type_id=event_type.event_type_id limit 6";
					$result = $con->query($sql);
					while ($row_event = mysqli_fetch_array($result)) {
					?>

						<div class="single-carusel row align-items-center">
							<div class="col-12 col-md-6 thumb">
								<img class="img-fluid" style="height:300px" src="img/events/
								<?php
								if ($row_event['front_page'] == '') {
									echo $row_event['event_type_pic'];
								} else {
									echo $row_event['front_page'];
								}
								?>" alt="">
							</div>
							<div class="detials col-12 col-md-6">
								<p><?php echo date('F j, Y', strtotime($row_event['time'])) ?></p>
								<a href="single-event-details.php?event_id=<?php echo $row_event['event_id'] ?>">
									<h4><?php echo $row_event['event_title'] ?></h4>
								</a>
								<p>
									<?php echo substr($row_event['event_details'], 0, 200) ?>
								</p>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- End upcoming-event Area -->

	<!-- Start review Area -->
	<section class="review-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row">
				<div class="active-review-carusel">
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Anwar Kabir</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
							</div>
						</div>
						<p>
						IIT Automation System is a clever, versatile, and cost-effective solution for our Institute.
						It’s a whole end-to-end system that takes care of every detail of an Institute workflow, which is exactly what we needed.
						</p>
					</div>
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Rahat Uddin Azad</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
							</div>
						</div>
						<p>
						What is absent here? You have dynamic routine, notice, a ow-full event calendar, accommodation of having online result, a discussion forum and you have a online library to take and return book ! you may enjoy your online campus from home in  a word.
						</p>
					</div>
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Shuvra Adittya</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
							</div>
						</div>
						<p>
						IIT Automation System is a clever, versatile, and cost-effective solution for our Institute.
						It’s a whole end-to-end system that takes care of every detail of an Institute workflow, which is exactly what we needed.
						</p>
					</div>
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Tahrim Kabir</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
						<p>
						IIT e-platform is a dynamic way of being updated with IIT always. Here, the whole institute has been brought under a family where office, teachers and student are connected with each other.
						</p>
					</div>
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Fannie Rowe</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
						<p>
							Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
							scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
							printer, scanner, speaker.
						</p>
					</div>
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Hulda Sutton</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
						<p>
							Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
							scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
							printer, scanner, speaker.
						</p>
					</div>
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Fannie Rowe</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
						<p>
							Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
							scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
							printer, scanner, speaker.
						</p>
					</div>
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Hulda Sutton</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
						<p>
							Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
							scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
							printer, scanner, speaker.
						</p>
					</div>
					<div class="single-review item">
						<img src="img/r1.png" alt="">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Fannie Rowe</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
						<p>
							Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
							scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
							printer, scanner, speaker.
						</p>
					</div>
					<div class="single-review item">
						<div class="title justify-content-start d-flex">
							<a href="#">
								<h4>Hulda Sutton</h4>
							</a>
							<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
						</div>
						<p>
							Accessories Here you can find the best computer accessory for your laptop, monitor, printer,
							scanner, speaker. Here you can find the best computer accessory for your laptop, monitor,
							printer, scanner, speaker.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End review Area -->

	<!-- Start cta-one Area -->
	<section class="cta-one-area relative section-gap">
		<div class="container">
			<div class="overlay overlay-bg"></div>
			<div class="row justify-content-center">
				<div class="wrap">
					<h1 class="text-white">Facing Problems!!!!!!</h1>
					<p>
						Discussion forums are a common tool in the online classroom. From enhancing engagement to making thinking visible and helping build community, discussion forums can have a tremendous impact on our online course. Considering its importance in our institution we make a discussion forums.
					</p>
					<a class="primary-btn wh" href="discussion-question-list.php">Discussion Forum</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End cta-one Area -->



	<section class="section-gap" id="mu-our-teacher">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mu-our-teacher-area">
						<!-- begain title -->
						<div class="mu-title text-center">
							<h2>Our Teachers</h2>
						</div>
						<!-- end title -->
						<!-- begain our teacher content -->
						<div class="mu-our-teacher-content">
							<div class="row">
								<div class="col-lg-3 col-md-3  col-sm-6">
									<div class="mu-our-teacher-single">
										<figure class="mu-our-teacher-img">
											<img src="img/teachers/NuzuzzamanBhuiyan.jpg" alt="teacher img">
											<div class="mu-our-teacher-social">
												<a href="#"><span class="fa fa-facebook"></span></a>
												<a href="#"><span class="fa fa-twitter"></span></a>
												<a href="#"><span class="fa fa-linkedin"></span></a>
												<a href="#"><span class="fa fa-google-plus"></span></a>
											</div>
										</figure>
										<div class="mu-ourteacher-single-content">
											<h4>Md. Nuruzzaman Bhuiyan
											</h4>
											<span>Assistant Professor (On Study Leave)</span>
										

										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="mu-our-teacher-single">
										<figure class="mu-our-teacher-img">
											<img src="img/teachers/AuhidurRahman.jpg" alt="teacher img">
											<div class="mu-our-teacher-social">
												<a href="#"><span class="fa fa-facebook"></span></a>
												<a href="#"><span class="fa fa-twitter"></span></a>
												<a href="#"><span class="fa fa-linkedin"></span></a>
												<a href="#"><span class="fa fa-google-plus"></span></a>
											</div>
										</figure>
										<div class="mu-ourteacher-single-content">
											<h4>Md. Auhidur Rahman</h4>
											<span>Assistant Professor(Acting Director)</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="mu-our-teacher-single">
										<figure class="mu-our-teacher-img">
											<img src="img/teachers/DipannitaSaha.jpg" alt="teacher img">
											<div class="mu-our-teacher-social">
												<a href="#"><span class="fa fa-facebook"></span></a>
												<a href="#"><span class="fa fa-twitter"></span></a>
												<a href="#"><span class="fa fa-linkedin"></span></a>
												<a href="#"><span class="fa fa-google-plus"></span></a>
											</div>
										</figure>
										<div class="mu-ourteacher-single-content">
											<h4>Dipannita Saha</h4>
											<span>Assistant Professor</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="mu-our-teacher-single">
										<figure class="mu-our-teacher-img">
											<img src="img/teachers/FalguniRoy.jpg" alt="teacher img">
											<div class="mu-our-teacher-social">
												<a href="#"><span class="fa fa-facebook"></span></a>
												<a href="#"><span class="fa fa-twitter"></span></a>
												<a href="#"><span class="fa fa-linkedin"></span></a>
												<a href="#"><span class="fa fa-google-plus"></span></a>
											</div>
										</figure>
										<div class="mu-ourteacher-single-content">
											<h4>Falguni Roy</h4>
											<span>Assistant Professor</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="mu-our-teacher-single">
										<figure class="mu-our-teacher-img">
											<img src="img/teachers/DipokChandra.jpg" alt="teacher img">
											<div class="mu-our-teacher-social">
												<a href="#"><span class="fa fa-facebook"></span></a>
												<a href="#"><span class="fa fa-twitter"></span></a>
												<a href="#"><span class="fa fa-linkedin"></span></a>
												<a href="#"><span class="fa fa-google-plus"></span></a>
											</div>
										</figure>
										<div class="mu-ourteacher-single-content">
											<h4>Dipok Chandra Das</h4>
											<span>Assistant Professor</span>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="mu-our-teacher-single">
										<figure class="mu-our-teacher-img">
											<img src="img/teachers/IftekharAlam.jpg" alt="teacher img">
											<div class="mu-our-teacher-social">
												<a href="#"><span class="fa fa-facebook"></span></a>
												<a href="#"><span class="fa fa-twitter"></span></a>
												<a href="#"><span class="fa fa-linkedin"></span></a>
												<a href="#"><span class="fa fa-google-plus"></span></a>
											</div>
										</figure>
										<div class="mu-ourteacher-single-content">
											<h4>Md. Iftekharul Alam Efat</h4>
											<span>Assistant Professor</span>
										</div>
									</div>
								</div>

								<div class="col-lg-3 col-md-3 col-sm-6">
									<div class="mu-our-teacher-single">
										<figure class="mu-our-teacher-img">
											<img src="img/teachers/TasniyaAhmed.jpg" alt="teacher img">
											<div class="mu-our-teacher-social">
												<a href="#"><span class="fa fa-facebook"></span></a>
												<a href="#"><span class="fa fa-twitter"></span></a>
												<a href="#"><span class="fa fa-linkedin"></span></a>
												<a href="#"><span class="fa fa-google-plus"></span></a>
											</div>
										</figure>
										<div class="mu-ourteacher-single-content">
											<h4>Tasniya Ahmed Neela</h4>
											<span>Lecturer</span>
										</div>
									</div>
								</div>


							</div>
						</div>
						<!-- End our teacher content -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Start blog Area -->
	<section class="blog-area section-gap" id="blog">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Recent Notices For Our Institute</h1>
					</div>
				</div>
			</div>
			<div class="row">


				<?php
				$sql = "SELECT notices.*,notice_category.category_name as cat_name FROM notices,notice_category
				WHERE notices.notice_category=notice_category.id LIMIT 6";
				$result = $con->query($sql);
				while ($row_notice = mysqli_fetch_array($result)) {
				?>
					<div class="col-lg-3 col-md-6 single-blog">


						<div class="thumb">

							<img class="img-fluid" style="height:360px;" src="img/notices/<?php echo $row_notice['notice_img']  ?>" alt="">
						</div>
						<p class="meta"><?php echo date('F j, Y', strtotime($row_notice['post_date']))  ?> |By <a href="#"><?php echo $row_notice['post_by']  ?></a></p>
						<a href="blog-single.html">
							<h5><?php echo $row_notice['notice_title']  ?></h5>
						</a>
						<p>
							<?php echo substr($row_notice['notice_content'], 0, 100) ?>
						</p>
						<a href="view-single-notice.php?notice_id=<?php echo $row_notice['id'] ?>" class="details-btn d-flex justify-content-center align-items-center"><span class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
					</div>

				<?php
				}
				?>
			</div>
		</div>
	</section>
	<!-- End blog Area -->

	



	<!-- Start cta-two Area -->
	<section class="cta-two-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 cta-left">
					<h1>Do You Want To About Ourself??</h1>
				</div>
				<div class="col-lg-4 cta-right">
					<a class="primary-btn wh" href="abous-us.php">view Details</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End cta-two Area -->

	<!-- start footer Area -->
	<?php include('layout-files/footer.php') ?>
	<!-- End footer Area -->

	<?php include('layout-files/js-links.php') ?>

</body>

</html>