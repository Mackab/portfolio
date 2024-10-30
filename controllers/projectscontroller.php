<?php
// controllers/projectcontroller.php


require_once __DIR__ . '/../core/controller.php'; // Zorg ervoor dat dit pad correct is

class ProjectsController extends Controller {
    public function index() {
        // Laad het projectmodel
        $projectModel = $this->loadModel('Project');
        // Verkrijg projecten van het model
        $projects = $projectModel->getAllProjects();
        // Render de view met de projecten
        $this->render('projects', ['projects' => $projects]);
    }
}