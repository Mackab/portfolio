<?php


require_once __DIR__ . '/../core/controller.php';
require_once __DIR__ . '/../models/projectmodel.php';

class ProjectsController extends Controller {
    public function index() {
        $projectModel = $this->loadModel('Project');
        $projects = $projectModel->getAllProjects();
        $this->render('projects', ['projects' => $projects]);
    }

    public function show($slug) {
        $projectModel = $this->loadModel('Project');
        $project = $projectModel->getProjectBySlug($slug);
        $this->render('project', ['project' => $project]);
    }
}
