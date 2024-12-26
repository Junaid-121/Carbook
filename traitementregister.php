<?php
include "dbconnect.php";  // Connexion à la base de données
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    // Récupération des données
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $role = mysqli_real_escape_string($connect, $_POST['role']);
    
    // Vérifier si l'email existe déjà
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);
    
    if (mysqli_num_rows($result) > 0) {
        
        echo '<script>
                alert("Un utilisateur existe deja avec cet email");
                window.location.href = "register.php";  // Redirige vers le formulaire de connexion
              </script>';
    exit();
    }
    
    // Hashage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Si un admin n'existe pas, donner le rôle admin au premier inscrit
    if (!isset($role)) {
        $role = 'user'; // Par défaut, les autres utilisateurs seront des 'user'
    }

    // Insertion dans la base de données
    $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$hashed_password', '$role')";
    
    if (mysqli_query($connect, $query)) {
        
        echo '<script>
                alert("Inscription reussie!");
                window.location.href = "connect.php";  // Redirige vers le formulaire de connexion
              </script>';
        exit();
    } else {
        
        echo '<script>
                alert("Erreur lors de l\'inscription. Veuillez reesayer");
                window.location.href = "register.php";  // Redirige vers le formulaire de connexion
              </script>';
    exit();

    }
}
?>
