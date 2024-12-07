<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../app/Controllers/VoteController.php';
use App\Controllers\VoteController;
$config = require __DIR__ . '/../config/config.php';

$pdo = new Database($config['database']);

$_SESSION['id'] = 5;
if($_SERVER['REQUEST_METHOD'] === "POST") {
    $category = $_POST['category'];
    $nominee = $_POST['nominee'];
    $user_id = $_SESSION['id'];
    $created_at = date('Y-m-d H:i:s');
    $comment = $_POST['comment'];

    $vote = new VoteController($pdo);
    try {
        $vote->store($user_id, $nominee, $comment, $created_at, $category);
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}
