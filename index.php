<?php
// Configuration
$to_email = "votre-email@entreprise.com"; // Remplacez par votre adresse email
$subject_prefix = "Nouveau message de contact - ";

// Vérification que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Récupération et nettoyage des données
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $company = htmlspecialchars(trim($_POST['company']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Validation basique
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Le nom est requis.";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Une adresse email valide est requise.";
    }
    
    if (empty($subject)) {
        $errors[] = "Le sujet est requis.";
    }
    
    if (empty($message)) {
        $errors[] = "Le message est requis.";
    }
    
    // Si pas d'erreurs, envoi de l'email
    if (empty($errors)) {
        // Construction du message
        $email_subject = $subject_prefix . $subject;
        
        $email_body = "
        Nouveau message de contact reçu:\n\n
        Nom: $name\n
        Email: $email\n
        Téléphone: " . ($phone ?: "Non fourni") . "\n
        Entreprise: " . ($company ?: "Non fournie") . "\n\n
        Sujet: $subject\n\n
        Message:\n$message\n
        ";
        
        // En-têtes
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Tentative d'envoi
        if (mail($to_email, $email_subject, $email_body, $headers)) {
            // Succès
            echo json_encode([
                'success' => true,
                'message' => 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.'
            ]);
        } else {
            // Échec de l'envoi
            echo json_encode([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.'
            ]);
        }
    } else {
        // Retour des erreurs de validation
        echo json_encode([
            'success' => false,
            'message' => 'Veuillez corriger les erreurs suivantes: ' . implode(' ', $errors)
        ]);
    }
} else {
    // Méthode non autorisée
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Méthode non autorisée.'
    ]);
}
?>