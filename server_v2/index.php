<?php

// Require
require 'vendor/Slim/Slim.php';
\Slim\Slim::registerAutoloader();

// Instantiate
define('__ROOT__', dirname(dirname(__FILE__))); 

$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');

// Helper Functions
require_once('helpers/helpers.php');

// Define API routes
require_once('routes/shift.php');

// Run application
$app->run();

// Initialize Propel with the runtime configuration
// require_once('vendor/propel/propel/bin/propel.php');
// Propel::init("propel.php");

?>