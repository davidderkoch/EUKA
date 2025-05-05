<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten holen und validieren
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        die("Bitte füllen Sie alle Felder aus.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Bitte geben Sie eine gültige E-Mail-Adresse ein.");
    }

    // Empfängeradresse
    $to = "d.koch@julabo.com"; // Zieladresse anpassen

    // E-Mail-Betreff
    $subject = "Neue Nachricht von $name über EUKA Kontaktformular";

    // Nachrichtentext
    $body = "Name: $name\n";
    $body .= "E-Mail: $email\n\n";
    $body .= "Nachricht:\n$message";

    // Header setzen
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Mail senden
    if (mail($to, $subject, $body, $headers)) {
        echo "Vielen Dank! Ihre Nachricht wurde erfolgreich gesendet.";
    } else {
        echo "Fehler beim Senden der Nachricht. Bitte versuchen Sie es später erneut.";
    }
} else {
    echo "Ungültige Anfrage.";
}
?>
