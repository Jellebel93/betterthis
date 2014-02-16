<?php

function utf8_urldecode($str) {
  $str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str));
  return html_entity_decode($str,null,'UTF-8');;
}
  
$file="";
if(isset($_REQUEST['file'])) {
	$file = $_REQUEST['file'];
}

$save = "false";
if(isset($_REQUEST['save'])) {
	$save = $_REQUEST['save'];
}

function getContent($file) {
  $body = file_get_contents($file);
  header("HTTP/1.1 200 OK");
  header("Content-Type:text/plain");
  echo $body;
}

if(strlen($file) === 0) {
  $file=$_POST["file"];
}

if(strlen($file) > 0) {
  if($save === "save") {
    $value=$_POST["content"];
    $value = utf8_urldecode($value);
    //
    file_put_contents($file, str_replace('\"', '"', str_replace("\'" , "'", $value)));
    header("HTTP/1.1 200 OK");
    header("Content-Type:text/plain");
    echo "{status : 'saved'}";
  } else {
   getContent($file);
  }
}
  

?>
