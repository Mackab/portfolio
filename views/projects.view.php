<?php

require 'layout/head.php';

?>
    
    <main>
    <h1>Projecten</h1>
    <?php if (isset($projects) && !empty($projects)): ?>
        <ul>
            <?php foreach ($projects as $project): ?>
                <li>
                    <a href="project.php?id=<?= htmlspecialchars($project['id']) ?>">
                        <img src="<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="project-image">
                        <h2><?= htmlspecialchars($project['title']) ?></h2>
                        <p><?= htmlspecialchars($project['description']) ?></p>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Geen projecten gevonden.</p>
    <?php endif; ?>
    </main>

<?php

require 'layout/foot.php';

?>