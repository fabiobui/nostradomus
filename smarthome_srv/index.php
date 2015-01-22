<?php
date_default_timezone_set('Europe/Rome');
require 'vendor/autoload.php';

function readMsg($fp) {
  $i = 0;
  $msg = '';
  $read = '';
  while (($read != "\r") && ($i<80)) {
    $read = fread($fp, 1);
    if ($read != "\r") $msg .= $read;
    $i++;
  }
  $data = explode("|", $msg);
  $ret = array();
  if (is_array($data) && (count($data)==6)) {
    foreach ($data as $value) {
      list($k, $v) = split("=",$value);
      $ret[$k] = $v;  
    }
    $ret['msg'] = $msg;
    return $ret; 
  } else {
    return false;
  }
}


function readStream(){
  $fp =fopen("/dev/ttyUSB0", "r");
  if( !$fp) {
        echo "Error";die();
  }
// fwrite($fp, $_SERVER['argv'][1] . 0x00);
  $i = 0;
  while ((($data = readMsg($fp))==false) && ($i<3)) $i++;
  fclose($fp);
  return $data; 
}


function writeStream($msgIn) {
  $fp =fopen("/dev/ttyUSB0", "w");
  if( !$fp) {
        echo "Error";die();
  }
  $i = 0;
  $m0 = $m1 = '';
  while (($m0==$m1) && ($i<5)) {
    $data = readMsg($fp);
    // remove variable temperature
    $m0 = preg_replace("/^T=(.*?)\|/i", "", $data['msg']);
    sleep(2);
    fwrite($fp, $msgIn."\r");
    $data = readMsg($fp);
    $m1 = preg_replace("/^T=(.*?)\|/i", "", $data['msg']);
    $i++;
  }  
  fclose($fp);
  return true;
}

// Prepare app
$app = new \Slim\Slim();


// handle GET requests for /arduino
$app->get('/arduino', function () use ($app) {  
  $data = readStream();

  $callback = $app->request()->get('callback');

   //Check for null here...

  //Set content type to javascript
  $app->response()->header('Content-Type', 'text/javascript');

    //Generate our JSONP output
  echo "$callback(" . json_encode($data) . ");";

});


// handle GET requests for /postino
$app->get('/postino', function () use ($app) {  

  $callback = $app->request()->get('callback');
  $sensor = $app->request()->get('sensor');
  $state  = $app->request()->get('state');
  
  $msg = $sensor.$state;

  writeStream($msg);

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
