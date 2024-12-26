<?php
include "dbconnect.php"; // Connexion à la base de données
session_start();

// Vérification de la soumission du formulaire
if (isset($_POST['login'])) {
    // Récupération des valeurs du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sécurisation des entrées pour éviter les injections SQL
    $email = mysqli_real_escape_string($connect, $email);
    $password = mysqli_real_escape_string($connect, $password);

    // Requête pour vérifier si l'utilisateur existe
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Vérification du mot de passe
        if (password_verify($password, $user['password'])) {
            // Connexion réussie : création de la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role']; // Récupérer le rôle de l'utilisateur (admin ou utilisateur simple)

            // Redirection vers la page d'accueil ou tableau de bord en fonction du rôle
            if ($_SESSION['role'] === 'admin') {
                // Si l'utilisateur est admin, redirigez-le vers la page d'administration
                header("Location: adminindex.php");
                exit();
            } else {
                // Si l'utilisateur est un utilisateur normal, redirigez-le vers la page principale
                header("Location: index.php");
                exit();
            }
        } else {
            // $error_message = "Mot de passe incorrect.";
            // header("refresh:2;url=connect.php");
            echo '<script>
                alert("Mot de passe incorrect.");
                window.location.href = "connect.php";  // Redirige vers le formulaire de connexion
              </script>';
    exit();
        }
    } else {
        // $error_message = "Aucun utilisateur trouvé avec cet email.";
        // header("refresh:2;url=connect.php");
        echo '<script>
                alert("Aucun utilisateur trouvé avec cet email.");
                window.location.href = "connect.php";  // Redirige vers le formulaire de connexion
              </script>';
    exit();
    }
}
?>

<?php
if (isset($error_message)) {
    echo $error_message; // Affichage des erreurs si elles existent
}
?>
