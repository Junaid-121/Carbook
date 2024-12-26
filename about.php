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
                <li class="nav-item active"><a href="about.php" class="nav-link">À propos</a></li>
                <li class="nav-item"><a href="car.php" class="nav-link">Nos voitures</a></li>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Acceuil <i class="ion-ios-arrow-forward"></i></a></span> <span>A propos <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">A propos</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(uploads/aboutus.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">A propos de nous</span>
	            <h2 class="mb-4">Bienvenue chez Carbook</h2>

	            <p>Explorez la ville en une journée, en commençant par les ruelles historiques du vieux quartier, où l'architecture ancienne se mêle aux petites boutiques artisanales. C'est un pays paradisiaque, où des morceaux de phrases grillées volent dans votre bouche.</p>
	            <p>Sur son chemin, elle rencontra une copie. La copie avertissait le Petit Texte Aveugle que là d'où il venait, il aurait été réécrit mille fois et que tout ce qui resterait de son origine serait le mot "et" et le Petit Texte Aveugle devrait faire demi-tour et retourner dans son propre pays, en sécurité. Explorez la ville en une journée, en commençant par les ruelles historiques du vieux quartier, où l'architecture ancienne se mêle aux petites boutiques artisanales. C'est un pays paradisiaque, où des morceaux de phrases grillées volent dans votre bouche.</p>
	            <p><a href="#search" class="btn btn-primary py-3 px-4">Rechercher de vehicule</a></p>
	          </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-intro" style="background-image: url(uploads/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">Vous voulez gagner de l'argent avec nous ? Alors ne soyez pas en retard.</h2>
            <a href="#" class="btn btn-primary btn-lg">Devenir chauffeur</a>
          </div>
				</div>
			</div>
		</section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-3">Clients content</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(uploads/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Découvrez l'élégance et la performance de cette voiture exceptionnelle, conçue pour allier confort, sécurité et puissance sur chaque route</p>
                    <p class="name">Fred Swaniker</p>
                    <span class="position">Responsable marketing</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(uploads/person_2.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Découvrez l'élégance et la performance de cette voiture exceptionnelle, conçue pour allier confort, sécurité et puissance sur chaque route</p>
                    <p class="name">Osborne Macharia</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(uploads/person_3.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Découvrez l'élégance et la performance de cette voiture exceptionnelle, conçue pour allier confort, sécurité et puissance sur chaque route</p>
                    <p class="name">Laduma Ngxokolo</p>
                    <span class="position">Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(uploads/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Découvrez l'élégance et la performance de cette voiture exceptionnelle, conçue pour allier confort, sécurité et puissance sur chaque route</p>
                    <p class="name">Iyinoluwa Aboyeji</p>
                    <span class="position">Developpeur web</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(uploads/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Découvrez l'élégance et la performance de cette voiture exceptionnelle, conçue pour allier confort, sécurité et puissance sur chaque route</p>
                    <p class="name">Nii Quaynor</p>
                    <span class="position">Analyste systeme</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="ftco-counter ftco-section img" id="section-counter">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="60">0</strong>
                <span>Year <br>Experienced</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1090">0</strong>
                <span>Total <br>Cars</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="2590">0</strong>
                <span>Happy <br>Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="67">0</strong>
                <span>Total <br>Branches</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>	

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
    
  </body>
</html>