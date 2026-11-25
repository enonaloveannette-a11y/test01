<?php
// Endpoint de health check (utile pour Cloud Run, GKE ou Load Balancer GCP)
if ($_SERVER['REQUEST_URI'] === '/health') {
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode(['status' => 'healthy', 'timestamp' => time()]);
    exit;
}

// Récupération des variables d'environnement et infos système
$hostname = gethostname();
$env = getenv('APP_ENV') ?: 'production';
$phpVersion = phpversion();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Test DevOps GCP</title>
</head>
<body>
    <h1>Déploiement PHP réussi sur GCP</h1>
    <ul>
        <li><strong>Hôte / Conteneur :</strong> <?= htmlspecialchars($hostname) ?></li>
        <li><strong>Environnement :</strong> <?= htmlspecialchars($env) ?></li>
        <li><strong>Version PHP :</strong> <?= htmlspecialchars($phpVersion) ?></li>
    </ul>
    <p>Tester le health check : <a href="/health">/health</a></p>
</body>
</html>
