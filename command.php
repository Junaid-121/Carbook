<?php

include "dbconnect.php";
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo '<script>
                alert("Vous devrez vous connecter");
                window.location.href = "connect.php";  // Redirige vers le formulaire de connection
              </script>';
    exit();
}

// Ajouter une voiture au panier
if (isset($_GET['car_id'])) {
    $car_id = (int)$_GET['car_id'];
    $user_id = $_SESSION['user_id'];

    // Vérifier si la voiture est déjà dans le panier de l'utilisateur
    $check_query = "SELECT * FROM cart WHERE user_id = $user_id AND car_id = $car_id";
    $check_result = mysqli_query($connect, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Si la voiture est déjà dans le panier, augmenter la quantité
        $update_query = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = $user_id AND car_id = $car_id";
        mysqli_query($connect, $update_query);
    } else {
        // Ajouter la voiture au panier
        $insert_query = "INSERT INTO cart (user_id, car_id, quantity) VALUES ($user_id, $car_id, 1)";
        mysqli_query($connect, $insert_query);
    }

    // Rediriger vers la page du panier ou la page de commande
    header('Location: cart.php');
    exit();
}

// Définir le nombre de voitures par page
$limit = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Compter le nombre total de voitures
$total_query = "SELECT COUNT(*) AS total FROM cars";
$total_result = mysqli_query($connect, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_cars = $total_row['total'];

// Calcul du nombre total de pages
$total_pages = ceil($total_cars / $limit);

// Récupérer les voitures pour la page actuelle
$query = "SELECT * FROM cars LIMIT $limit OFFSET $offset";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

<!-- Navigation -->
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
                <li class="nav-item"><a href="car.php" class="nav-link">Nos voitures</a></li>
                <li class="nav-item active"><a href="command.php" class="nav-link">Commande</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

                <?php
                if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                    echo '<li class="nav-item"><a href="add.php" class="nav-link">Ajout voiture</a></li>';
                }

                if (isset($_SESSION['user_id'])) {
                    echo '<li class="nav-item"><a href="cart.php" class="nav-link">Panier</a></li>';
                    echo '<li class="nav-item"><a href="logout.php" class="nav-link">Se déconnecter</a></li>';
                } else {
                    echo '<li class="nav-item"><a href="connect.php" class="nav-link">Se connecter</a></li>';
                }
                ?>
                
            </ul>
        </div>
    </div>
</nav>


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('uploads/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Acceuil <i class="ion-ios-arrow-forward"></i></a></span> <span>Commander <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Commandez votre voiture</h1>
          </div>
        </div>
      </div>
</section>


<section class="ftco-section bg-light">
    <div class="container mt-5">
        <h2 style="text-align:center;">Voitures disponibles</h2>
        <div class="row">
            <?php while ($car = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">
                        <img src="<?php echo $car['image']; ?>" class="card-img-top" alt="<?php echo $car['name']; ?>">
                        <div class="text">
                            <h5 class="card-title"><?php echo $car['name']; ?></h5>
                            <div class="d-flex mb-3">
                              <span class="cat">Marque : <?php echo $car['brand']; ?></span>
                              <p class="price ml-auto">Montant : $<?php echo $car['price']; ?></p>
                            </div>
                            <a href="command.php?car_id=<?php echo $car['id']; ?>" class="btn btn-primary" style="width:100%">Ajouter au panier</a>
                            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                                <a href="deletecar.php?id=<?php echo $car['id']; ?>" class="btn btn-danger mt-2" style="width:100%">Supprimer</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="command.php?page=<?php echo $page - 1; ?>">Précédent</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="command.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="command.php?page=<?php echo $page + 1; ?>">Suivant</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</section>

<footer class="ftco-footer ftco-bg-dark ">
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
				  <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
				  <li><a href="#" class="py-2 d-block">Garantie du meilleur prix</a></li>
				  <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
				</ul>
			  </div>
			</div>
			<div class="col-md">
			   <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2">Support Client</h2>
				<ul class="list-unstyled">
				  <li><a href="faq.php" class="py-2 d-block">FAQ</a></li>
				  <li><a href="#" class="py-2 d-block">Option de paiement</a></li>
				  <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
				  <li><a href="#" class="py-2 d-block">Comment ça marche</a></li>
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
  
				<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés | Ce modèle est réalisé avecE <i class="icon-heart color-danger" aria-hidden="true"></i> par <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		  </div>
		</div>
	</footer>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
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
