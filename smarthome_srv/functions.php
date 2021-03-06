<?php

/*
  General functions
*/


function readMsg($fp) {
  $app = \Slim\Slim::getInstance();

  $i = 0;
  $msg = '';
  $read = '';
  while (($read != "\n") && ($i<200)) {
    $read = fread($fp, 1);
    if ($read != "\n") $msg .= $read;
    $i++;
  }
  $app->log->info("SmartHome 'msg' =".$msg);
  $data = explode("|", $msg);
  $ret = array();
  if (is_array($data) && (count($data)>2)) {
    foreach ($data as $value) {
      list($k, $v) = split("=",$value);
      $k=trim($k);
      $ret[$k] = trim($v);  
    }
    $ret['msg'] = $msg;
    return $ret;
  } else {
    return false;
  }
}


function readStream(){
  exec("stty -F ".ARDUINO_PORT." cs8 9600 ignbrk -brkint -imaxbel -opost -onlcr -isig -icanon -iexten -echo -echoe -echok -echoctl -echoke noflsh -ixon -crtscts");
  $fp =fopen(ARDUINO_PORT, "r");
  if( !$fp) {
        echo "Error";die();
  }
  $i = 0;
  while ((($data = readMsg($fp))==false) && (count($data)<14) && ($i<5)) $i++;
  fclose($fp);
  return $data; 
}


function decodeMsgIn($msgIn) {
	$cmd = substr($msgIn, 0, 1);
	$val = substr($msgIn, 1);
	switch ($cmd) {
		case 'H':
			  $ret = 'Tmax='.$val; 
			break;
		case 'L':
			  $ret = 'Tmin='.$val; 
			break;
		case 'S':
			  $ret = 'S=';
			  $ret .= ($val=='1') ? 'summer' : 'winter'; 
			break;
		case 'F':
			  $ret = 'FAN=';
			  $ret .= ($val=='1') ? 'ON' : 'OFF'; 
			break;
		case 'M':
			  $ret = 'MS=';
			  $ret .= ($val=='1') ? 'ON' : 'OFF'; 
			break;
    case 'C':
    // to do
        break;  
	}
	return $ret;
}

function writeStream($msgIn) {
  $app = \Slim\Slim::getInstance();

  $i = 0;
  $iter_max = 10;
  $checkCmd = false; 
  while (($checkCmd==false) && ($i<$iter_max)) {    
    $fp =fopen(ARDUINO_PORT, "w");
    if( !$fp) {
        echo "Error";die();
    }
/*   In case Arduino resetting  
    for($j=0; $j<strlen($msgIn); $j++) {
      fwrite($fp, $msgIn[$j]);
      sleep(1);
    }
    fwrite($fp, "\r");  
*/    
    fwrite($fp, $msgIn."\r");
    fclose($fp);
//    sleep(2); in case Arduino resetting
    if (substr($msgIn, 0, 1)=='C') {
      $checkCmd = true;
    } else {
      $data = readStream();
      $decodeMsg = decodeMsgIn($msgIn);
      list($k, $v) = split("=",$decodeMsg);
      $checkCmd = ($data[$k]==$v);
      $i++;
      $app->log->info("SmartHome 'writeStream' iteration: $i, msg in: $msgIn, decode msg: $decodeMsg");
      $app->log->info("SmartHome 'writeStream' iteration: $i, k=$k, v=$v, data[k]=".$data[$k]);
    }  
    if ($checkCmd) $app->log->info("SmartHome 'writeStream' iteration: $i - message sent to Arduino");
  }
  return true;
}


?>
