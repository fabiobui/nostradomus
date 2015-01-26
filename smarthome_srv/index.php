<?php

//define("ARDUINO_PORT", "/dev/ttyUSB0");  linux serial
//define("ARDUINO_PORT", "/dev/tty.usbmodem1431"); // mac
define("ARDUINO_PORT", "/dev/ttyACM0"); // linux direct

date_default_timezone_set('Europe/Rome');
require 'vendor/autoload.php';
require 'functions.php';


// Prepare app
$app = new \Slim\Slim();


// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('SmartHome Log');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});


// handle GET requests for /arduino
$app->get('/arduino', function () use ($app) {  
  $app->log->info("SmartHome '/arduino' route");

  $data = readStream();

  $app->log->info("SmartHome msg from Arduino: ".$data['msg']);

  $callback = $app->request()->get('callback');

   //Check for null here...

  //Set content type to javascript
  $app->response()->header('Content-Type', 'text/javascript');

    //Generate our JSONP output
  echo "$callback(" . json_encode($data) . ");";

});


// handle GET requests for /postino
$app->get('/postino', function () use ($app) {  
  $app->log->info("SmartHome '/postino' route");

  $callback = $app->request()->get('callback');
  $sensor = $app->request()->get('sensor');
  $state  = $app->request()->get('state');
  $tmin   = $app->request()->get('tmin');
  $tmax   = $app->request()->get('tmax');  

  if (isset($sensor)) $app->log->info("SmartHome parameter sensor: ".$sensor);
  if (isset($state)) $app->log->info("SmartHome parameter state:  ".$state);
  if (isset($tmin)) $app->log->info("SmartHome parameter tmin:   ".$tmin);
  if (isset($tmax)) $app->log->info("SmartHome parameter tmax:   ".$tmax);
  
  if ($sensor=='T') {
    if ($tmin>0) {
      $msg1 = 'L'.$tmin;
      writeStream($msg1);
    }
    if ($tmax>0) {
      $msg2 = 'H'.$tmax;
      writeStream($msg2);
    }
    $msg = "$msg1 - $msg2";
  } else {
    $msg = $sensor.$state;
    writeStream($msg);
  }

  $app->log->info("SmartHome postino msg: ".$msg);

 //Read sensors
  $i=0;
  while ((($data = readStream())==false) && ($i<3)) $i++;
  $data['msg'] = $msg;

  //Set content type to javascript
  $app->response()->header('Content-Type', 'text/javascript');

    //Generate our JSONP output
  echo "$callback(" . json_encode($data) . ");";

});


// Run app
$app->run();
