<?php
require('vendor/autoload.php');
require_once('app/config.php');
require_once('helpers/helpers.php');

// Setup app
$app = new \Slim\Slim();
$app->response->headers->set('Content-Type', 'application/json');

// // Define API routes
require_once('routes/contact.php');
require_once('routes/content.php');
require_once('routes/email.php');
require_once('routes/event.php');
require_once('routes/login.php');
require_once('routes/member.php');
require_once('routes/pdf.php');
require_once('routes/shift.php');
require_once('routes/signup.php');
require_once('routes/waitlist.php');

$app->run();