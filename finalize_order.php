<?php
// Inclure la connexion à la base de données
include('dbconnect.php');

// Vérifier si l'utilisateur est connecté (par exemple, via une session)
session_start();

// Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupérer l'ID de l'utilisateur connecté
$user_id = $_SESSION['user_id'];

// Vérifier si le panier existe dans la session
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Votre panier est vide.";
    header("refresh:2;url=command.php");
    exit;
}

// Créer la commande
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity']; // Calculer le total de la commande
}

// Insérer la commande dans la table 'orders'
$query_insert_order = "
    INSERT INTO orders (user_id, total) 
    VALUES ($user_id, $total)
";
$result_insert_order = mysqli_query($connect, $query_insert_order);

if (!$result_insert_order) {
    die("Erreur lors de l'insertion de la commande: " . mysqli_error($connect));
}

// Récupérer l'ID de la commande nouvellement insérée
$order_id = mysqli_insert_id($connect);

// Insérer les articles de la commande dans la table 'order_items'
foreach ($_SESSION['cart'] as $item) {
    $car_id = $item['car_id'];
    $quantity = $item['quantity'];
    $price = $item['price'];

    // Vérifier si le car_id existe dans la table 'cars'
    $query_check_car = "SELECT id FROM cars WHERE id = $car_id";
    $result_check_car = mysqli_query($connect, $query_check_car);

    if (mysqli_num_rows($result_check_car) > 0) {
        // La voiture existe, on peut ajouter l'article dans 'order_items'
        $query_insert_order_item = "INSERT INTO order_items (order_id, car_id, quantity, price) VALUES ($order_id, $car_id, $quantity, $price)";

        $result_insert_order_item = mysqli_query($connect, $query_insert_order_item);

        if (!$result_insert_order_item) {
            die("Erreur lors de l'ajout de l'article dans la commande: " . mysqli_error($connect));
        }
    } else {
        echo "Erreur: La voiture avec l'ID $car_id n'existe pas dans la table 'cars'.";
        exit;
    }
}

// Vider le panier après la commande
unset($_SESSION['cart']);

// Confirmer la commande
echo "Votre commande a été passée avec succès !";

// Optionnellement, rediriger vers une page de confirmation ou la page d'accueil
header('refresh:2;url-index.php');
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalisation de la Commande</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
        
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
                <li class="nav-item"><a href="about.php" class="nav-link">À propos</a></li>
                <li class="nav-item"><a href="car.php" class="nav-link">Nos voitures</a></li>
                <li class="nav-item"><a href="command.php" class="nav-link">Commande</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

                <?php
                // Vérifier si l'utilisateur est connecté et s'il est un admin
                if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                    echo '<li class="nav-item"><a href="add.php" class="nav-link">Ajout voiture</a></li>';
                }

                // Vérifier si l'utilisateur est connecté pour afficher le panier
                if (isset($_SESSION['user_id'])) {
                    echo '<li class="nav-item" active><a href="cart.php" class="nav-link">Panier</a></li>';
                } else {
                    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
                    echo '<li class="nav-item"><a href="connect.php" class="nav-link">Se connecter</a></li>';
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

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('uploads/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Acceuil <i class="ion-ios-arrow-forward"></i></a></span> <span>Paiement <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Mon paiement</h1>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section contact-section">
    <div class="container mt-5">
        <?php if ($is_admin): ?>
            <h2>Commandes des utilisateurs</h2>
            <p>Voici toutes les commandes passées par les utilisateurs.</p>
            
            <!-- Affichage des commandes sous forme de tableau -->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Commande</th>
                        <th>Utilisateur (Email)</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $order['order_id']; ?></td>
                            <td><?php echo $order['email']; ?></td>
                            <td>$<?php echo $order['total_price']; ?></td>
                            <td><?php echo $order['order_date']; ?></td>
                            <td><a href="order_details.php?order_id=<?php echo $order['order_id']; ?>" class="btn btn-info">Voir Détails</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        <?php else: ?>
            <h2>Finalisation de la commande</h2>
            <p>Merci pour votre achat ! Votre commande a été validée.</p>
            <a href="order_history.php" class="btn btn-primary">Voir mes commandes</a>
        <?php endif; ?>
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
                <li><a href="#" class="py-2 d-block">Termes et Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Garantie du meilleur prix</a></li>
                <li><a href="#" class="py-2 d-block">Vie privée &amp; cookies police</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Support Client</h2>
              <ul class="list-unstyled">
                <li><a href="faq.php" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Option de paiement</a></li>
                <li><a href="#" class="py-2 d-block">Conseils de réservation</a></li>
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
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer><script src="js/jquery.min.js"></script>


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
