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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
</head>
<body>
    <h1>Project Details</h1>
    <!-- Hier zou je projectdetails invoegen -->
    <p>Project ID: <?= htmlspecialchars($projectId) ?></p>
</body>
</html>

<?php

require 'views/layout/foot.php';

?>