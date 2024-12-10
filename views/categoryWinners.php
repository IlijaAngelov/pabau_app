<?php

require_once "../vendor/autoload.php";
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../app/Controllers/VoteController.php';
require_once __DIR__ . '/../app/Controllers/CategoryController.php';
$config = require __DIR__ . '/../config/config.php';
error_reporting(E_ALL); ini_set('display_errors',1);

use App\Controllers\CategoryController;
use App\Controllers\VoteController;

$pdo = new Database($config['database']);
$query = new VoteController($pdo);
$category_query = new CategoryController($pdo);

try {
    $voter = $query->whoVoted();
} catch(PDOException $e) {
    die($e->getMessage());
}

$allCategories = $category_query->getAllCategories();
$makeWorkFunCategory = implode($allCategories[0]);
$teamPlayerCategory = implode($allCategories[1]);
$cultureChampionCategory = implode($allCategories[2]);
$differenceMakerCategory = implode($allCategories[3]);

$makeWorkFunWinner = $query->categoryWinner(substr($makeWorkFunCategory, 1));
$teamPlayerWinner = $query->categoryWinner(substr($teamPlayerCategory, 1));
$cultureChampionWinner = $query->categoryWinner(substr($cultureChampionCategory, 1));
$differenceMakerWinner = $query->categoryWinner(substr($differenceMakerCategory, 1));

?>
<?php require_once __DIR__ . '/partials/header.php'; ?>
<div class="container container_winners">

    <div class="container_row">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/images/makesworkfun.jpg" alt="Makes Fun Work Person">
            <div class="card-body">
                <h5 class="card-title">Makes Fun Work Winner!</h5>
                <p class="card-text" ><?= $makeWorkFunWinner[0]['firstname'] . ' ' . $makeWorkFunWinner[0]['lastname']; ?></p>
                    <a class="btn btn-primary"
                        href="/generate?winner=<?= $makeWorkFunWinner[0]['firstname'] . ' ' . $makeWorkFunWinner[0]['lastname']; ?>">
                        Get Certificate</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/images/teamplayer.jpg" alt="Team Player Person">
            <div class="card-body">
                <h5 class="card-title">Team Player Winner!</h5>
                <p class="card-text" ><?= $teamPlayerWinner[0]['firstname'] . ' ' . $teamPlayerWinner[0]['lastname']; ?></p>
                <a class="btn btn-primary"
                   href="/generate?winner=<?= $teamPlayerWinner[0]['firstname'] . ' ' . $teamPlayerWinner[0]['lastname']; ?>">
                    Get Certificate</a>
            </div>
        </div>
    </div>

    <div class="container_row">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/images/culturechampion.jpg" alt="Culture Champion">
            <div class="card-body">
                <h5 class="card-title">Culture Champion!</h5>
                <p class="card-text" ><?= $cultureChampionWinner[0]['firstname'] . ' ' . $cultureChampionWinner[0]['lastname']; ?></p>
                <a class="btn btn-primary"
                   href="/generate?winner=<?= $cultureChampionWinner[0]['firstname'] . ' ' . $cultureChampionWinner[0]['lastname']; ?>">
                    Get Certificate</a>
            </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/images/differncemaker.jpg" alt="Differnce Maker">
            <div class="card-body">
                <h5 class="card-title">Difference Maker!</h5>
                <p class="card-text" ><?= $differenceMakerWinner[0]['firstname'] . ' ' . $differenceMakerWinner[0]['lastname']; ?></p>
                <a class="btn btn-primary"
                   href="/generate?winner=<?= $differenceMakerWinner[0]['firstname'] . ' ' . $differenceMakerWinner[0]['lastname']; ?>">
                    Get Certificate</a>
            </div>
            </div>
        </div>

        <div class="most_voting_emp">
            <h3>Employee who voted the most:</h3>
            <p><?= $voter[0]['firstname'] . ' ' . $voter[0]['lastname'] ?></p>
        </div>
    </div>
</div>
</body>
<script src="/js/generateCertificate.js"></script>