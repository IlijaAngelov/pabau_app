<?php
    require_once "../vendor/autoload.php";
    require_once __DIR__ . '/../config/Database.php';
    require_once __DIR__ . '/../app/Controllers/VoteController.php';

error_reporting(E_ALL); ini_set('display_errors',1);

use App\Controllers\VoteController;

$pdo = new Database();

$query = new VoteController($pdo);

try {
    $voter = $query->whoVoted();
} catch(PDOException $e) {
    die($e->getMessage());
}
?>
<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="container">
    <h1>Here are the winners for each category</h1>
    <h3>Makes Work Fun</h3>
    <p>Winner: </p>
    <h3>Team Player</h3>
    <p>Winner: </p>
    <h3>Culture Champion</h3>
    <p>Winner: </p>
    <h3>Difference Maker</h3>
    <p>Winner: </p>
    <h3>Employee who voted the most:</h3>
    <p><?= $voter[0]['firstname'] . ' ' . $voter[0]['lastname'] ?></p>
</div>
</body>