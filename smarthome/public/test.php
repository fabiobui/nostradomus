<?php  

function readStream(){
  $fp =fopen("/dev/ttyUSB0", "w+");
  if( !$fp) {
        echo "Error";die();
  }
// fwrite($fp, $_SERVER['argv'][1] . 0x00);
  $i = 0;
  $msg = '';
  $read = '';
  while (($read != "\r") && ($i<80)) {
    $read = fread($fp, 1);
    $msg .= $read;
    $i++;
  }
  fclose($fp);
  $data = explode("|", $msg);
  if (is_array($data) && (count($data)==6)) {
    return $data; 
  } else {
    return false;
  }
}

$i=0;
while ((($data = readStream())==false) && ($i<3)) $i++;

print_r($data);

?>  