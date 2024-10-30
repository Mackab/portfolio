<?php
// controllers/contactcontroller.php
require_once __DIR__ . '/../core/controller.php'; // Correct pad naar controller.php

class ContactController extends Controller {
    public function index() {
        // Logica voor de contactpagina
        $this->render('contact'); // Zorg ervoor dat je een render-methode hebt
    }
}