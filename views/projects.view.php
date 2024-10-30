<?php

require 'layout/head.php';

?>

    <h1 class="project-top">Projecten</h1>
    <div class="project-list">
        <?php if (isset($projects) && !empty($projects)): ?>
            <?php foreach ($projects as $project): ?>
                    <div class="project">
                            <img src="<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="project-image">
                        <div class="project-details">
                            <a href="project.php?id=<?= htmlspecialchars($project['id']) ?>" class="project-title"><?= htmlspecialchars($project['title']) ?></a>
                            <p class="project-description"><?= htmlspecialchars($project['description']) ?></p>
                        </div>
                    </div>
            <?php endforeach; ?>
    </div>
    <?php else: ?>
        <p>Geen projecten gevonden.</p>
    <?php endif; ?>

<?php

require 'layout/foot.php';

?>



