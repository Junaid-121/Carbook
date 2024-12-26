<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Vérifier si tous les champs sont remplis
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // Validation supplémentaire de l'email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Configuration pour envoyer un email
            $to = "junaidniktab@gmail.com"; // Remplacez par votre adresse email
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            // Corps du message
            $email_body = "Nom: $name\n";
            $email_body .= "Email: $email\n";
            $email_body .= "Sujet: $subject\n\n";
            $email_body .= "Message:\n$message\n";

            // Envoi de l'email
            if (mail($to, $subject, $email_body, $headers)) {
                echo "<p style='color: green;'>Votre message a été envoyé avec succès !</p>";
            } else {
                echo "<p style='color: red;'>Une erreur s'est produite lors de l'envoi de votre message.</p>";
            }
        } else {
            echo "<p style='color: red;'>Veuillez entrer une adresse email valide.</p>";
        }
    } else {
        echo "<p style='color: red;'>Tous les champs sont obligatoires.</p>";
    }
} else {
    echo "<p style='color: red;'>Le formulaire n'a pas été soumis correctement.</p>";
}
?>
