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
require_once('routes/root.php');
require_once('routes/event.php');
require_once('routes/login.php');
require_once('routes/member.php');
require_once('routes/shift.php');
require_once('routes/signup.php');
require_once('routes/term.php');
require_once('routes/waitlist.php');

// PHP Sandbox
$app->get('/test', function () use ($app) {
    
    echo date("n/j/y", 1267516800);
     
});

// Run application
$app->run();

?>