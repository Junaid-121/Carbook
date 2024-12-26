<?php
session_start();
include "dbconnect.php";

// Vérifie si l'utilisateur est administrateur
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo '<script>
            alert("Accès refusé ! Seuls les administrateurs peuvent accéder à cette page.");
            window.location.href = "index.php";
          </script>';
    exit();
}

// Pagination
$limit = 5; // Nombre d'utilisateurs par page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

// Compte le nombre total d'utilisateurs
$total_query = "SELECT COUNT(*) AS total FROM users";
$total_result = mysqli_query($connect, $total_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_users = $total_row['total'];

// Calcul du nombre total de pages
$total_pages = ceil($total_users / $limit);

// Récupère les utilisateurs pour la page actuelle
$query = "SELECT * FROM users LIMIT $limit OFFSET $offset";
$result = mysqli_query($connect, $query);

// Suppression d'un utilisateur
if (isset($_POST['delete_user_id'])) {
    $user_id = (int)$_POST['delete_user_id'];

    // Supprimer les enregistrements liés dans la table notifications (en fonction de la clé étrangère)
    $delete_notifications_query = "DELETE FROM notifications WHERE user_id = $user_id";
    mysqli_query($connect, $delete_notifications_query);

    // Supprimer les enregistrements liés dans la table cart
    mysqli_query($connect, "DELETE FROM cart WHERE user_id = $user_id");

    // Supprimer l'utilisateur
    $delete_query = "DELETE FROM users WHERE id = $user_id";
    if (mysqli_query($connect, $delete_query)) {
        echo '<script>
                alert("Utilisateur supprimé avec succès.");
                window.location.href = "gerer.php?page=' . $page . '";
              </script>';
    } else {
        echo '<script>alert("Erreur lors de la suppression de l\'utilisateur.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les utilisateurs</title>
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
                <li class="nav-item"><a href="car.php" class="nav-link">voitures</a></li>
                <li class="nav-item"><a href="command.php" class="nav-link">Commande</a></li>
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="add.php" class="nav-link">Ajoutvoiture</a></li>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item active"><a href="cart.php" class="nav-link">Panier</a></li>
                <?php else: ?>
                    <li class="nav-item"><a href="connect.php" class="nav-link">Se connecter</a></li>
                <?php endif; ?>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li class="nav-item"><a href="gerer.php" class="nav-link">Gérer utilisateurs</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>



<div class="container mt-5">
    <h2 class="text-center">Gestion des utilisateurs</h2>
    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                        <?php if ($user['role'] !== 'admin'): ?>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="delete_user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</button>
                            </form>
                        <?php else: ?>
                            <span class="text-muted">Action indisponible</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item"><a class="page-link" href="gerer.php?page=<?php echo $page - 1; ?>">Précédent</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                    <a class="page-link" href="gerer.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($page < $total_pages): ?>
                <li class="page-item"><a class="page-link" href="gerer.php?page=<?php echo $page + 1; ?>">Suivant</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
