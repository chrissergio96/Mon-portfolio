<?php 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupération des données
    $name = $_GET['name'] ?? '';
    $email = $_GET['email'] ?? '';
    $subject = $_GET['subject'] ?? '';
    $message = $_GET['message'] ?? '';

    // Validation simple
    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        $to = 'safou.christiansergio@gmail.com';
        $headers = 'From: ' . $email . "\r\n" .
                   'Reply-To: ' . $email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
        
        if (mail($to, $subject, $message, $headers)) {
            echo "✅ Message envoyé avec succès !";
        } else {
            echo "❌ Erreur lors de l'envoi du message (fonction mail bloquée ?).";
        }
    } else {
        echo "⚠️ Tous les champs sont obligatoires.";
    }
}
?>
