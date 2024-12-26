<?php
include "dbconnect.php";

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="./css/modal.css">
	
  </head> 

  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index.php" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">À propos</a></li>
                <li class="nav-item active"><a href="car.php" class="nav-link">Nos voitures</a></li>
                <li class="nav-item"><a href="command.php" class="nav-link">Commande</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <?php
                // Vérifier si l'utilisateur est connecté et s'il est un admin
                session_start();
                if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                    echo '<li class="nav-item"><a href="add.php" class="nav-link">Ajouter une voiture</a></li>';
                }
                ?>
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a href="connect.php" class="nav-link">Se connecter</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Se déconnecter</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('uploads/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Acceuil <i class="ion-ios-arrow-forward"></i></a></span> <span>Voitures <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Visitez nos voitures</h1>
          </div>
        </div>
      </div>
    </section>
		

	<section class="ftco-section bg-light" id="page-1">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-1.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mercedes Grand Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mercedes</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-2.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Range Rover</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Subaru</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-3.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Ferrari 448 GTB</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Ferrari</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-4.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Chevrolet Maverick</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-5.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">BMW M3</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">BMW</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-6.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Porche</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-7.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mercedes-benz C-Class</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mercedes</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-8.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Rubicon</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Subaru</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-9.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mercedes 4matic</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mercedes</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-10.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mercedes-benz AMG GT</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mercedes</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-11.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mercedes 300 SL</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mercedes</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-12.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi A3</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    		</div>
    		
    	</div>
    </section>

	<!-- page 2 -->
	<section class="ftco-section bg-light" id="page-2" style="display:none;">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Ferrari/Ferrari\ 812\ Superfast.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Ferrari F8 Tributo</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Ferrari</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Lamborghini/Lamborghini\ Avantador\ S.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lamborghini Reventon</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lamborghini</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Lexus/pexels-brice-122958-376674.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lexus LC</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lexus</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Ferrari/pexels-autorecords-10292237.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Ferrari Testarossa</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Ferrari</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Lamborghini/Lamborghini\ Hypercar\ V12.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lamborghini Huraçan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lamborghini</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Lexus/pexels-garvin-st-villier-719266-3972750.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lexus GS</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lexus</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Ferrari/pexels-dante-juhasz-62201650-12964228.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Ferrari Enzo</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Ferrari</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Lamborghini/Lamborghini\ Mucielago.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lamborghini Diablo</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lamborghini</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Lexus/pexels-kadin-eksteen-85582952-14790154.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lexus IS</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lexus</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Ferrari/pexels-dimkidama-18479749.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Porche SE</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Porche</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Lamborghini/Lamborghini\ Urus.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Chevrolet Pathinder</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Chevrolet</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/Images/Lexus/pexels-svonhorst-2684218.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lexus UX</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lexus</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    		</div>
    		
    	</div>
    </section>

	<!-- Page 3 -->

	<section class="ftco-section bg-light" id="page-3" style="display:none;">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-1.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mercedes Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mercedes</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(uploads/car-2.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Range Rover</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Subaru</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-16-53.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lamborghini Urus</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lamborghini</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-16-35.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Rolle Royce Phantom</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">RR</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-16-13.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi TT</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-16-06.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi RS6</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-15-54.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Rolle Royce phamtom GWD</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">RR</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-15-48.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lexus RX</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lexus</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-15-40.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lamborghini Venovo</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Lamborghini</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-15-17.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">BMW Z4</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">BMW</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-14-35.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mazda V8</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mazda</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./autre/photo_2024-11-14_17-14-26.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">BMW LC</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">BMW</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    		</div>
    		
    	</div>
    </section>
	<!-- page 4 -->

	<section class="ftco-section bg-light" id="page-4" style="display:none;">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/Audi/pexels-rodrigo-chable-380091428-18502430.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi LCZ</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/BMW/pexels-maria-geller-801267-2127039.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">BMW Class- F</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">BMW</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/MERCO/pexels-mikebirdy-215529.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mercedes ML 4Matic</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mercedes</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/Audi/pexels-sofianunezph-18167337.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/BMW/pexels-mikebirdy-170811.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">BMW 2002 Turbo</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">BMW</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/MERCO/pexels-mikebirdy-26691362.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mercedes-Benz</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mercedes</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/Audi/pexels-alex-amorales-321095-909907.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi lan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/BMW/pexels-107932638-27366038.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">BMW SE</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">BMW</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/MERCO/pexels-chizon-14877006.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi C4</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/BMW/pexels-cordero-12073269.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">BMW4</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">BMW</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/Audi/pexels-pixabay-38637.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi 44</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/MERCO/pexels-mikebirdy-112460.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mercedes 4matic Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Mercedes</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="row mt-5">
          
        </div>
    	</div>
    </section>

	<!-- page 5 -->
	<section class="ftco-section bg-light" id="page-5" style="display: none;">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/ncm1.png);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Chevrolet</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/ncm2.png);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">BMW 90</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Subaru</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/ncm3.png);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Porche 43</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Porche</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/featured-cars/fc1.png);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">BMW 70</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">BMW</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/featured-cars/fc2.png);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Chevrolet LC</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Chevrolet</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/featured-cars/fc3.png);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Lamborghini 33</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/featured-cars/fc4.png);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/featured-cars/fc5.png);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Mazda LE</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Subaru</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/bg_2.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Porche 4</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Porche</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./uploads/bg_1.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi Grand Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/Audi/pexels-garvin-st-villier-719266-14277561.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi RD</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(./car/BMW/pexels-107932638-27366038.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.php">Audi BL</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Audi</span>
	    						<p class="price ml-auto">50000 CFA <span>/jour</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="car-single.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    		</div>
    		
    	</div>
    </section>

	<div class="col text-center">
		<div class="block-27">
			<ul>
				<!-- <li><a href="#" class="page-link" data-page="1">&lt;</a></li> -->
				<li><a href="#" class="page-link" data-page="1">1</a></li>
				<li><a href="#" class="page-link" data-page="2">2</a></li>
				<li><a href="#" class="page-link" data-page="3">3</a></li>
				<li><a href="#" class="page-link" data-page="4">4</a></li>
				<li><a href="#" class="page-link" data-page="5">5</a></li>
				<!-- <li><a href="#" class="page-link" data-page="4">&gt;</a></li> -->
			</ul>
		</div>
	</div>
	
    
	<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
              <p>Découvrez l'élégance et la performance de cette voiture exceptionnelle, conçue pour allier confort, sécurité et puissance sur chaque route</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="about.php" class="py-2 d-block">A propos</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
                <li><a href="termes.php" class="py-2 d-block">Termes et Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Garantie du meilleur prix</a></li>
                <li><a href="vie.php" class="py-2 d-block">Vie privée &amp; cookies police</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Support Client</h2>
              <ul class="list-unstyled">
                <li><a href="faq.php" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Option de paiement</a></li>
                <li><a href="conseils.php" class="py-2 d-block">Conseils de réservation</a></li>
                <li><a href="comment.php" class="py-2 d-block">Comment ça marche</a></li>
                <li><a href="contact.php #contact" class="py-2 d-block">Contactez-nous</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Avez-vous de question ?</h2>
                <div class="block-23 mb-3">
                  <ul>
                    <li><span class="icon icon-map-marker"></span><span class="text"> Benin, Suite 721 Porto-Novo 10016</span></li>
                    <li><a href="tel://43452406"><span class="icon icon-phone"></span><span class="text">+229 0143452406</span></a></li>
                    <li><a href="mailto:junaidniktab121@gmail.com"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                  </ul>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Car<span>Book</span></p>

          </div>
        </div>
      </div>
    </footer>







  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Fenêtre modale
  <div id="orderModal" class="modal" style="display:none;">
	<div class="modal-content">
	  <span class="close">&times;</span>
	  <h4>Commander une voiture</h4>
	  <form action="submit-order.php" method="POST">
		<input type="hidden" name="car_name" id="modal-car-name">
		<p>Vous commandez : <strong id="modal-car-title"></strong></p>
		<div class="mb-3">
			<label for="name" class="form-label">Votre nom :</label>
			<input type="text" id="name" name="name" class="form-control" required>
		</div>
		<br>
		<div class="mb-3">
			<label for="date" class="form-label">Date de réservation :</label>
			<input type="date" id="date" name="date" class="form-control" required>
		</div>
		<br>
		<button type="submit" class="btn btn-secondary">Confirmer la commande</button>
	  </form>
	</div>
  </div>
  
   -->
  

  <!-- <script src="./js/modal.js"></script> -->
  <script src="./js/pagination.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  <script>
	// Récupérer le paramètre de recherche depuis l'URL
	const params = new URLSearchParams(window.location.search);
	const query = params.get('query') ? params.get('query').toLowerCase() : "";
  
	// Tous les éléments des sections de voitures
	const sections = document.querySelectorAll("section[id^='page']");
	const pagination = document.querySelector(".pagination");
  
	if (query) {
	  let found = false;
  
	  // Masquer toutes les sections et vérifier les correspondances
	  sections.forEach(section => {
		const cars = section.querySelectorAll(".car-wrap");
		let sectionHasMatch = false;
  
		cars.forEach(car => {
		  const carName = car.querySelector("h2 a").textContent.toLowerCase();
		  if (carName.includes(query)) {
			car.style.display = ""; // Afficher la voiture correspondante
			sectionHasMatch = true;
			found = true;
		  } else {
			car.style.display = "none"; // Masquer les voitures non correspondantes
		  }
		});
  
		// Masquer ou afficher la section en fonction des correspondances
		section.style.display = sectionHasMatch ? "" : "none";
	  });
  
	  // Si aucun résultat trouvé
	  if (!found) {
		const noResult = document.createElement("div");
		noResult.innerHTML = `<p style="text-align: center; font-size: 20px; margin-top: 20px;">
								Aucun résultat trouvé pour "<strong>${query}</strong>".
							  </p>`;
		document.body.insertBefore(noResult, sections[0]);
	  }
  
	  // Masquer la pagination pendant la recherche
	  if (pagination) pagination.style.display = "none";
	}
  </script>
  

  
  </body>
</html>