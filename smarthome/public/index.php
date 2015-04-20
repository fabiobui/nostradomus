<?php
date_default_timezone_set('Europe/Rome');

require_once '../lib/dbHandler.php';
require_once '../lib/common.php';
require_once '../lib/class-phpass.php';
require '../vendor/autoload.php';


// route middleware for simple API authentication
function authenticate(\Slim\Route $route) {
    $app = \Slim\Slim::getInstance();
    $db = new DbHandler();
    $session=  $db->getSession();
    if (!$session['uid']) { 
      $app->flash('error', 'Login required');  
      $app->redirect('/login');
    } else {
      return true;
    }  
}

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));


// User id from db - Global Variable
$user_id = NULL;
require_once '../lib/authentication.php';

//Start Sessions
$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'SmartHomeSecret123')));

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../templates/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);

$app->view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
    new \JSW\Twig\TwigExtension());

// Define routes
$app->get('/', 'authenticate', function () use ($app) {
    // Sample log message
    $app->log->info("SmartHome '/' route");
    $env = $app->environment();         
    // Render index view
    $app->render('index.html.twig', array('ip_server' => $_SESSION['server_url']));
});

$app->get('/sensors', 'authenticate', function () use ($app) {
    // Sample log message
    $app->log->info("SmartHome '/sensors' route");
    $env = $app->environment(); 
    // Render index view
    $app->render('sensors.html.twig', array('ip_server' => $_SESSION['server_url']));
});

$app->get('/settings', 'authenticate', function () use ($app) {
    // Sample log message
    $app->log->info("SmartHome '/settings' route");
    $env = $app->environment(); 
    // Render index view
    $app->render('settings.html.twig', array('ip_server' => $_SESSION['server_url']));
});

// Define 404 template
$app->notFound(function () use ($app) {
    $app->render('404.html.twig');
});

// Run app
$app->run();
