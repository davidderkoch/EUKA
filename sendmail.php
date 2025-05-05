<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten holen
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // E-Mail-Empfänger (dein Freund)
    $to = "derschuler265@gmail.com"; // Ersetze dies mit der E-Mail-Adresse deines Freundes

    // Betreff
    $subject = "Neue Nachricht von $name über EUKA Kontaktformular";

    // Nachricht zusammenstellen
    $body = "Name: $name\n";
    $body .= "E-Mail: $email\n\n";
    $body .= "Nachricht:\n$message";

    // Header für die E-Mail
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // E-Mail senden
    if (mail($to, $subject, $body, $headers)) {
        // Erfolgreiche Nachricht: Weiterleitung mit Erfolgsmeldung
        header("Location: index.html?status=success");
    } else {
        // Fehler beim Senden: Weiterleitung mit Fehlermeldung
        header("Location: index.html?status=error");
    }
} else {
    // Ungültige Anfrage
    header("Location: index.html?status=invalid");
}
?>