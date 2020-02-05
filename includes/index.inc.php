<?php
// Ze zeggen dat je de gebruiker nooit mag vertrouwen
// daarom gaan we direct wat meer controleren

// Een beetje configuratie
$conf = array(
    'mail' => 'hamza.games2000@hotmail.com'
);

// Deze functie doet een snelle check op lege waarden.
// Zoals de naam beschrijft is een waarde vereist.
function validate_required($value)
{
    if (is_null($value)) {
        return false;
    } elseif (is_string($value) and trim($value) === '') {
        return false;
    }
    return true;
}

// Ik kijk mijn drie specifieke velden na, ander zouden ze misschien
// nog met iets anders kunnen afkomen. Ik ga niet nakijken of de knop
// ingedrukt is.
if ('POST' === $_SERVER['REQUEST_METHOD'] and isset($_POST['inputName'], $_POST['inputEmail'], $_POST['inputMessage'])) {
    // Even zorgen dat de overbodige spaties weggehaald worden.
    $name = trim($_POST['inputName']);
    $email = trim($_POST['inputEmail']);
    $message = trim($_POST['inputMessage']);

    // Aanmaken van een array voor de foutmeldingen
    $errors = array();

    if (!validate_required($name) or strlen($name) < 2) {
        $errors[] = "Gelieve een naam op te geven.";
    }
    if (!validate_required($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Gelieve een geldige e-mail op te geven.";
    }
    if (!validate_required($message) or strlen($message) < 20) {
        $errors[] = "Gelieve een bericht op te geven dat langer is dan 20 karakters.";
    }

    // Als het aantal errors 0 is dan kunnen we een mailtje versturen
    if (0 == count($errors)) {
        // Dit is voor een mooi mailtje.
        $headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
        $headers .= 'Reply-To: ' . $name . ' <' . $email . '>' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion() . "\r\n";

        $isSent = mail($conf['mail'], 'Berichtje van je site', $message, $headers);

        if ($isSent):
            ?>
            <div class="alert alert-success">
                Je berichtje is goed verzonden!
            </div>
        <?php else:
            ?>
            <div class="alert alert-danger">
                Er ging iets mis, probeer het straks nog eens.
            </div>
        <?php
        endif;
    } else {
        ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }
}
