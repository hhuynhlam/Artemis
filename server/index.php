<?php

// Require
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

// Instantiate
$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');

// Helper Functions
require_once('helpers/helpers.php');

// Define API routes
require_once('routes/event.php');
require_once('routes/term.php');

// Run application
$app->run();

?>