<?php
require('vendor/autoload.php');
require_once('app/config.php');
require_once('helpers/helpers.php');

// Setup app
$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');

// // Define API routes
require_once('routes/shift.php');
require_once('routes/waitlist.php');

$app->run();