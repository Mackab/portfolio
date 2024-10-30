<?php
// project.php

require 'views/layout/head.php';

// Inclusie van de database connectie
require_once 'controllers/connect.php'; // Zorg ervoor dat dit pad correct is

// Verkrijg het ID van de URL
if (isset($_GET['id'])) {
    $projectId = intval($_GET['id']); // Beveiliging tegen XSS

    // Hier zou je normaal gesproken de gegevens van het project ophalen uit de database
    // Voorbeeld: $project = $database->getProjectById($projectId);
} else {
    echo "Geen project ID opgegeven.";
    exit;
}

// Hier ga je de projectinformatie weergeven
?>


    <h1>Project Details</h1>
    <!-- Hier zou je projectdetails invoegen -->
    <p>Project ID: <?= htmlspecialchars($projectId) ?></p>



<?php

require 'views/layout/foot.php';

?>