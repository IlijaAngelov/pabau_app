<?php

use JetBrains\PhpStorm\NoReturn;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'views/home.php',
    '/vote' => 'views/votingForm.php',
    '/winners' => 'views/categoryWinners.php',
    '/submitVote' => 'views/submitVote.php',
    '/generate' => 'views/generate.php',
];

function routeToController($uri, $routes): void
{
    if(array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

#[NoReturn]
function abort($code = 404): void
{
    http_response_code($code);

    require __DIR__ . '/views/404.php';

    die();
}

routeToController($uri, $routes);