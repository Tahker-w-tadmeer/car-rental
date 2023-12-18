<?php

use App\Response;
use App\Route;

// I use composer auto-loading. `composer dump-autoload`
require_once "vendor/autoload.php";

$request_uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Import all routes here from routes.php
include "routes.php";
session_start();

$matched = false;

foreach (Route::routes() as $route) {
    // Fadi Sarwat - 7432
    $args = $route->is($request_uri, $method);
    if ($args !== false) {

        $response = $route->handle(...$args);

        if($response instanceof Response) {
            $response->handle();
        }

        echo $response;
        $matched = true;
        break;
    }
}

if (!$matched) {
    http_response_code(404);
    echo "404 Not Found";
}

// Clear the response from session array after displaying it to the user.
clearResponse();