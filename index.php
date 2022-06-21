<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ":");
$route->namespace("Source\Controllers\Web");
$route->group(null);

/** Web */
$route->get("/", "Web:index");



$route->namespace("Source\Controllers\App");
$route->group("/app");

/** App */
$route->get("/", "App:index");

/** Login */
$route->get("/login", "Login:index");
$route->post("/validateLogin", "Login:validadeLogin");

/** Change Company */
$route->post("/changeCompany", "App:changeCompany");



/** End App */
$route->namespace("Source\Controllers\App");

/** Error Route */
$route->group("/ops");
$route->get("/{errcode}", "Error:index");

$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
