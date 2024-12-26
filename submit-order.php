<?php
// Inclure la connexion à la base de données
include('dbconnect.php');

// Vérifier si les données sont envoyées par le formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_id = $_POST['car_id'];
    $car_name = $_POST['car_name'];
    $car_price = $_POST['car_price'];
    $customer_name = $_POST['name'];
    $reservation_date = $_POST['date'];

    // Vérifier si la voiture existe dans la base de données
    $check_car_sql = "SELECT id FROM cars WHERE id = '$car_id'";
    $check_car_result = $connect->query($check_car_sql);

    if ($check_car_result->num_rows > 0) {
        // La voiture existe, procéder à l'insertion de la commande
        $sql = "INSERT INTO orders (car_id, car_name, car_price, customer_name, reservation_date)
                VALUES ('$car_id', '$car_name', '$car_price', '$customer_name', '$reservation_date')";

        if ($connect->query($sql) === TRUE) {
            echo '<script>
                alert("Commande reussie");
                window.location.href = "index.php";  // Redirige vers le formulaire de connexion
              </script>';
    exit();
        } else {
            echo "Erreur : " . $connect->error;
        }

        // Rediriger vers une page de confirmation ou de remerciement
        header("Location: confirmation.php");
        exit();
    } else {
        // La voiture n'existe pas dans la base de données
        echo "Erreur : La voiture que vous avez sélectionnée n'existe pas.";
    }
}

?>
