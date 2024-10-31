<?php

require 'layout/head.php';

require_once 'controllers/connect.php';

// Verwerk het formulier als het is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Valideer invoer
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Voorbeeld voor het valideren van e-mailadres
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Voeg de gegevens toe aan de database
            $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            
            if ($stmt->execute()) {
                $successMessage = "Bedankt voor uw bericht, we nemen spoedig contact met u op!";
            } else {
                $errorMessage = "Er is een fout opgetreden bij het verzenden van uw bericht. Probeer het later opnieuw.";
            }
        } else {
            $errorMessage = "Voer een geldig e-mailadres in.";
        }
    } else {
        $errorMessage = "Vul alstublieft alle velden in.";
    }
}

?>

<main>
    <div class="contact-index">
        <div class="contact-form"> 
            <h2>Neem contact op</h2>
            <form method="POST" action="">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Bericht:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Verstuur</button>
            </form>

            <?php if (isset($successMessage)) echo "<p>$successMessage</p>"; ?>
            <?php if (isset($errorMessage)) echo "<p>$errorMessage</p>"; ?>
        </div>
    <div class="google-map"> 
        <a class="title">Huidige Werkplek</a>
        <iframe class="google-integration" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d608.9833861623969!2d5.218585628575091!3d52.371624998244144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c617fb7563a475%3A0xf0dd02fb37cb486!2sWindesheim%20in%20Almere%20locatie%20Circus!5e0!3m2!1snl!2snl!4v1730312314695!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
        <div class="social-index"> 
            <a class="title">Social Media</a>
            <ul>
                <li><a class="social-icons" href="https://www.instagram.com/abel.mack/" target="_blank" rel="noopener noreferrer"><i class="fa fa-instagram"></i> Instagram</a></li>
                <li><a class="social-icons" href="https://www.linkedin.com/in/abel-mackenbach/" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin-square"></i> LinkedIn</a></li>
                <li><a class="social-icons" href="https://github.com/Mackab" target="_blank" rel="noopener noreferrer"><i class="fa fa-github"></i> GitHub</a></li>
            </ul>
        </div>
    </div>
</main>

<?php

require 'layout/foot.php';

?>
