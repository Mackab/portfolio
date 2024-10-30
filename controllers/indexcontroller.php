<?php
// controllers/indexcontroller.php

require_once __DIR__ . '/../core/controller.php';

class IndexController extends Controller {
    public function index() {
        // Render de index view
        $this->render('index'); // Dit zou index.view.php moeten laden
    }
}