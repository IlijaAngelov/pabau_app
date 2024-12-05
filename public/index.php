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
$query = new UserController($pdo);
$users = $query->getAllUsers();

$getCategories = new CategoryController($pdo);
$categories = $getCategories->getAllCategories();

// Test Data
$category = 'Team Player';
$nominee = '1';
$user_id = '1';
$created_at = date('Y-m-d H:i:s');
$comment = 'Oi';
$vote = new VoteController($pdo);
//print_r($vote->store($category, $nominee, $user_id, $created_at, $comment));





















// Pass the PDO instance to Delight\Auth\Auth
$auth = new Auth($pdo);
//die($auth);
// Use the $auth object for authentication