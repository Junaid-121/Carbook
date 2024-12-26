<?php
include "dbconnect.php"; // Connexion à la base de données

// Traitement du formulaire de recherche
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search_query = mysqli_real_escape_string($connect, $_GET['query']); // Sécurisation de la saisie de l'utilisateur

    // Calcul des pages
    $limit = 6; // Nombre de voitures par page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Numéro de la page actuelle
    $offset = ($page - 1) * $limit;

    // Requête SQL pour rechercher les voitures disponibles en commande
    $sql = "
        SELECT ca.name, ca.brand, ca.price, ca.image, ca.id
        FROM cars ca
        JOIN cart c ON ca.id = c.car_id
        WHERE ca.name LIKE '%$search_query%' OR ca.brand LIKE '%$search_query%'
        GROUP BY ca.id
        LIMIT $limit OFFSET $offset
    ";

    // Exécuter la requête
    $result = mysqli_query($connect, $sql);

    // Requête pour compter le nombre total de résultats
    $count_query = "
        SELECT COUNT(*) as total
        FROM cars ca
        JOIN cart c ON ca.id = c.car_id
        WHERE ca.name LIKE '%$search_query%' OR ca.brand LIKE '%$search_query%'
    ";
    $count_result = mysqli_query($connect, $count_query);
    $total_rows = mysqli_fetch_assoc($count_result)['total'];
    $total_pages = ceil($total_rows / $limit); // Calcul du nombre total de pages
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Voitures</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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

<!-- Formulaire de recherche -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">À propos</a></li>
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


<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('uploads/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Acceuil <i class="ion-ios-arrow-forward"></i></a></span> <span>recherche <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Resulat de recherche</h1>
          </div>
        </div>
      </div>
</section>



<!-- Résultats de recherche -->
<section class="ftco-section bg-light">
    <div class="container mt-5">
        <h2 style="text-align:center;">Resultat</h2>
        <div class="row">
            <?php while ($car = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $car['image']; ?>" class="card-img-top" alt="<?php echo $car['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $car['name']; ?></h5>
                            <p class="card-text">Marque : <?php echo $car['brand']; ?></p>
                            <p class="card-text">Montant : $<?php echo number_format($car['price'], 2); ?></p>
                            <a href="command.php?car_id=<?php echo $car['id']; ?>" class="btn btn-primary">Ajouter au panier</a>
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
                        <a class="page-link" href="search.php?query=<?php echo urlencode($search_query); ?>&page=<?php echo $page - 1; ?>">Précédent</a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                        <a class="page-link" href="search.php?query=<?php echo urlencode($search_query); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="search.php?query=<?php echo urlencode($search_query); ?>&page=<?php echo $page + 1; ?>">Suivant</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
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
