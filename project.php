<?php

require 'views/layout/head.php';

// Inclusie van de database connectie
require_once 'controllers/connect.php';
require_once 'models/projectmodel.php';

// Verkrijg het ID van de URL
if (isset($_GET['id'])) {
    $projectId = intval($_GET['id']); // Beveiliging tegen XSS

    // Maak een instantie van het ProjectModel
    $projectModel = new ProjectModel();
    
    // Haal het project op op basis van het ID
    $project = $projectModel->getProjectById($projectId);
    
    // Controleer of het project bestaat
    if (!$project) {
        echo "Project niet gevonden.";
        exit;
    }
} else {
    echo "Geen project ID opgegeven.";
    exit;
}
?>
    <div class="detail-project-container">
    <h1 class="detail-project-title"><?= htmlspecialchars($project['title']) ?></h1>
    <img class="detail-project-image" src="<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>">
    <p class="detail-project-description"> <?= htmlspecialchars($project['long_description']) ?></p>
    <?php if (!empty($project['github_link'])): ?>
        <p class="detail-project-github"><strong>GitHub:</strong> <a href="<?= htmlspecialchars($project['github_link']) ?>" target="_blank"><?= htmlspecialchars($project['github_link']) ?></a></p>
    <?php endif; ?>
    </div>
        <?php if (!empty($project['image2']) || !empty($project['image3']) || !empty($project['image4'])): ?>
            <div class="additional-images">
                <?php if (!empty($project['image2'])): ?>
                    <img src="<?= htmlspecialchars($project['image2']) ?>" alt="Extra afbeelding 2" class="additional-image">
                <?php endif; ?>
                
                <?php if (!empty($project['image3'])): ?>
                    <img src="<?= htmlspecialchars($project['image3']) ?>" alt="Extra afbeelding 3" class="additional-image">
                <?php endif; ?>
                
                <?php if (!empty($project['image4'])): ?>
                    <img src="<?= htmlspecialchars($project['image4']) ?>" alt="Extra afbeelding 4" class="additional-image">
                <?php endif; ?>
            </div>
        <?php endif; ?>

<?php require 'views/layout/foot.php'; ?>