<?php
include "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    // Requête pour insérer les données dans la base de données
    $sql = "INSERT INTO cars (name, brand, price, image, description) VALUES ('$name', '$brand', '$price', '$image', '$description')";

    if ($connect->query($sql) === TRUE) {
        // echo "Nouveau véhicule ajouté avec succès!";
        // header("refresh:0;url=add.php");
        echo '<script>
                alert("Nouveau vehicule ajouté avec succès");
                window.location.href = "command.php";  // Redirige vers le formulaire de connexion
              </script>';
    exit();
    } else {
        echo "Erreur: " . $sql . "<br>" . $connectect->error;
    }
}

$connect->close();
?>
