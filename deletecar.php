<?php
include "dbconnect.php";
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    echo "Vous devez vous connecter.";
    header('refresh:2,url=connect.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Vérifie si l'ID de l'élément à supprimer est passé
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Sécurisation de l'ID pour éviter les injections SQL
    $delete_id = mysqli_real_escape_string($connect, $delete_id);

    // Vérifier si l'élément appartient bien à l'utilisateur
    $query = "SELECT * FROM cart WHERE id = $delete_id AND user_id = $user_id";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        // Si l'élément existe, on le supprime
        $delete_query = "DELETE FROM cart WHERE id = $delete_id";
        if (mysqli_query($connect, $delete_query)) {
            // Redirige vers la page du panier après la suppression
            header('Location: cart.php');
            exit();
        } else {
            // Message d'erreur si la suppression échoue
            echo '<script>
                alert("Erreur lors de la suppression de l\'élément ");
                window.location.href = "cart.php";  
              </script>';
        exit();
        }
    } else {
        // Message d'erreur si l'élément n'appartient pas à l'utilisateur
        echo '<script>
                alert("Cet élément n\'existe pas dans votre panier ou il ne vous appartient pas.");
                window.location.href = "cart.php"; 
              </script>';
        exit();
    }
} else {
    // Si aucun ID n'est passé dans l'URL
    echo '<script>
                alert("Aucun élément à supprimer");
                window.location.href = "cart.php";  
              </script>';
        exit();
}

?>
