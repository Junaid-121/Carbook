<?php
session_start();
include "dbconnect.php";

// Vérification si l'utilisateur est administrateur
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo '<script>
            alert("Accès refusé !");
            window.location.href = "index.php";
          </script>';
    exit();
}

// Suppression de l'utilisateur
if (isset($_GET['delete_user_id'])) {
    $user_id = (int)$_GET['delete_user_id'];

    // Vérifier si l'utilisateur à supprimer n'est pas un administrateur
    $check_query = "SELECT role FROM users WHERE id = $user_id";
    $check_result = mysqli_query($connect, $check_query);
    $user_data = mysqli_fetch_assoc($check_result);

    if ($user_data && $user_data['role'] === 'admin') {
        echo '<script>
                alert("Impossible de supprimer un administrateur.");
                window.location.href = "gerer.php";
              </script>';
    } else {
        $delete_query = "DELETE FROM users WHERE id = $user_id";
        if (mysqli_query($connect, $delete_query)) {
            echo '<script>
                    alert("Utilisateur supprimé avec succès.");
                    window.location.href = "gerer.php?page=' . $_GET['page'] . '";
                  </script>';
        } else {
            echo '<script>
                    alert("Erreur lors de la suppression de l\'utilisateur.");
                    window.location.href = "gerer.php?page=' . $_GET['page'] . '";
                  </script>';
        }
    }
} else {
    header("Location: gerer.php");
}
?>
