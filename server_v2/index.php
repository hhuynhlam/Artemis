<?php
// // Require
// require 'vendor/Slim/Slim.php';
// \Slim\Slim::registerAutoloader();

// $app = new \Slim\Slim();
// $app->response->headers->set('Content-Type', 'application/json');

// // Helper Functions
// require_once('helpers/helpers.php');

// // Define API routes
// require_once('routes/shift.php');

// // Run application
// $app->run();

require('vendor/autoload.php');
require_once('app/config.php');
require_once('helpers/helpers.php');

$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');

// // Define API routes
require_once('routes/shift.php');

$app->run();