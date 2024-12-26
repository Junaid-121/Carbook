<?php
include "dbconnect.php";

?>

<?php
session_start(); // Assurez-vous que la session est démarrée

// Vérifiez si l'utilisateur est connecté et admin
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vie Privée & Cookies | CarBook</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
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
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        
        

        h2 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        h3 {
            font-size: 1.8rem;
            margin-top: 30px;
            color: #f8c102;
            font-weight: 600;
        }

        p {
            font-size: 1rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 15px;
        }

       
        .text-center {
            text-align: center;
            color: #f8c102;
        }

        .text-muted {
            color: #aaa !important;
        }

        
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-dark" id="ftco-navbar">
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
                    echo '<li class="nav-item"><a href="cart.php" class="nav-link">Panier</a></li>';
                } else {
                    // Si l'utilisateur n'est pas connecté, rediriger vers la page de connexion
                    echo '<li class="nav-item"><a href="connect.php" class="nav-link">Se connecter</a></li>';
                }
                ?>
                <?php
                  if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                    echo '<li class="nav-item"><a href="gerer.php" class="nav-link">Gérer utilisateurs</a></li>';
                  }
                ?>

                <?php if (isset($_POST['role']) && $_SESSION['role'] === 'user') {
                    echo '<li class="nav-item"><a href="order.php" class="nav-link">Mes commandes</a></li>';
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

<!-- Politique de Vie Privée Section -->
<section class="container">
    <h2>Politique de Vie Privée & Cookies</h2>
    <div class="content">
        <h3>Introduction</h3>
        <p>Chez CarBook, la confidentialité de nos utilisateurs est une priorité. Cette politique de vie privée décrit comment nous collectons, utilisons et protégeons vos informations personnelles lorsque vous utilisez notre site.</p>

        <h3>Informations Collectées</h3>
        <p>Nous collectons des informations personnelles lorsque vous vous inscrivez sur notre site, effectuez une commande, ou interagissez autrement avec nos services. Ces informations incluent notamment votre nom, votre adresse e-mail, votre adresse de livraison, et vos informations de paiement.</p>

        <h3>Utilisation des Informations</h3>
        <p>Les informations que nous collectons sont utilisées pour fournir nos services, traiter vos commandes, améliorer l'expérience utilisateur et vous contacter en cas de besoin. Nous pouvons également utiliser vos données pour vous envoyer des informations marketing, avec votre consentement.</p>

        <h3>Protection des Données</h3>
        <p>Nous mettons en œuvre des mesures de sécurité pour protéger vos données contre tout accès non autorisé, toute altération ou toute divulgation. Cependant, aucun système n'est complètement sécurisé, et nous ne pouvons garantir une protection totale contre les violations de sécurité.</p>

        <h3>Cookies</h3>
        <p>Nous utilisons des cookies pour améliorer votre expérience sur notre site. Les cookies nous aident à analyser l'utilisation de notre site, à personnaliser le contenu et à fournir des publicités ciblées. Vous pouvez contrôler l'utilisation des cookies en ajustant les paramètres de votre navigateur.</p>

        <h3>Partage des Informations</h3>
        <p>Nous ne partageons vos informations personnelles avec des tiers que dans la mesure où cela est nécessaire pour fournir nos services (par exemple, avec nos prestataires de paiement et de livraison). Nous ne vendons ni ne louons vos données à des tiers.</p>

        <h3>Vos Droits</h3>
        <p>Vous avez le droit de consulter, corriger ou supprimer les informations personnelles que nous détenons à votre sujet. Si vous souhaitez exercer l'un de ces droits, veuillez nous contacter via notre page de contact.</p>

        <h3>Modifications de cette Politique</h3>
        <p>Nous nous réservons le droit de mettre à jour cette politique de vie privée. Les changements seront publiés sur cette page avec la date de la dernière mise à jour.</p>
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
