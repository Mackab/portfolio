<?php

require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../models/contactmodel.php';

class ContactController extends Controller {
    public function index() {
        // Laad de contact view
        $this->render('contact');
    }

    public function submit() {
        // Controleer of het formulier is verzonden
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verwerk de formuliergegevens
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            
            // Voorbeeld van het opslaan van gegevens in de database
            $contactModel = $this->loadModel('Contact');
            $contactModel->saveContact($name, $email, $message);

            // Redirect of toon een succesbericht na het indienen
            header("Location: /contact.php?controller=Contact&action=index"); // Terug naar contactpagina
            exit;
        }
    }
}