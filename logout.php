<?php
session_start();

// Détruire toutes les données de la session
session_unset();
session_destroy();

// Rediriger l'utilisateur vers la page de connexion
header("refresh:1;url=index.php");
exit();
?>
