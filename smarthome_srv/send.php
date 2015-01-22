<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "PhpSerial.php";

function writeStream2($msg) {
$serial = new phpSerial;
$serial->deviceSet("/dev/ttyUSB0");
$serial->confBaudRate(9600);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->deviceOpen();
$serial->sendMessage($msg."\r");

$serial->deviceClose();
}

function writeStream($msg) {
  $fp =fopen("/dev/ttyUSB0", "w");
  if( !$fp) {
        echo "Error";die();
  }
  fwrite($fp, $msg."\r");
  fclose($fp);
  return true;
}

$msg = $argv[1];

for($i=0; $i<3; $i++) {
    writeStream2($msg);
    sleep(1);
}

echo "I've sended a message: $msg \n\r";
?>