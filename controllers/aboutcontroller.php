<?php
require_once __DIR__ . '/../core/controller.php';

class AboutController extends Controller {
    public function index() {
        $this->render('about'); // Laad de about view
    }
}
?>