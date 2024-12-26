<?php
// checkout.php
include "dbconnect.php";
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo '<script>
        alert("Vous devez vous connecter pour continuer.");
        window.location.href = "connect.php";
    </script>';
    exit();
}

$user_id = $_SESSION['user_id'];
$car_id = isset($_GET['car_id']) ? (int)$_GET['car_id'] : 0;

// Récupérer les informations sur la voiture pour le paiement
$query = "SELECT ca.name, ca.brand, ca.price, c.quantity FROM cart c JOIN cars ca ON c.car_id = ca.id WHERE c.id = $car_id AND c.user_id = $user_id";
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) === 0) {
    echo '<script>
        alert("Article introuvable dans votre panier.");
        window.location.href = "cart.php";
    </script>';
    exit();
}

$item = mysqli_fetch_assoc($result);
$total_price = $item['price'] * $item['quantity'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer à la caisse</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Formulaire de paiement</h2>
        <p class="text-muted">Veuillez remplir vos informations pour compléter l'achat.</p>

        <form action="process_checkout.php" method="POST">
            <div class="mb-3">
                <label for="full_name" class="form-label">Nom complet</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <h4>Détails de l'achat</h4>
                <div class="border p-3 bg-light rounded">
                    <p><strong>Voiture :</strong> <?php echo $item['brand'] . " " . $item['name']; ?></p>
                    <p><strong>Prix unitaire :</strong> $<?php echo $item['price']; ?></p>
                    <p><strong>Quantité :</strong> <?php echo $item['quantity']; ?></p>
                    <p><strong>Total :</strong> $<?php echo $total_price; ?></p>
                </div>
            </div>

            <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
            <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">

            <button type="submit" class="btn btn-success w-100">Payer</button>
        </form>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
