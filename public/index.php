<?php
require_once "../vendor/autoload.php";
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../app/Controllers/UserController.php';
require_once __DIR__ . '/../app/Controllers/CategoryController.php';
require_once __DIR__ . '/../app/Controllers/VoteController.php';

error_reporting(E_ALL); ini_set('display_errors',1);
session_start();

use App\Controllers\CategoryController;
use App\Controllers\UserController;
use App\Controllers\VoteController;
use Delight\Auth\Auth;

$pdo = new Database();

// To get User id and imitate as logged-in user
$_SESSION['id'] = 5;

if($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['action'] === "vote"){
    $category = $_POST['category'];
    $nominee = $_POST['nominee'];
    $user_id = $_SESSION['id'];
    $created_at = date('Y-m-d H:i:s');
    $comment = $_POST['comment'];

    $vote = new VoteController($pdo);
    $vote->store($user_id, $nominee, $comment, $created_at, $category);
}

$query = new UserController($pdo);
$users = $query->getAllUsers();

$getCategories = new CategoryController($pdo);
$categories = $getCategories->getAllCategories();


// Pass the PDO instance to Delight\Auth\Auth
//$auth = new Auth($pdo);
//die($auth);
// Use the $auth object for authentication