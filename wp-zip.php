

<?php
//http://domain.com/makezip.php?file=../internetgrinding&name=internetgrinding.zip

function addZip($fileName, $folder) {

  // Adding files to a .zip file, no zip file exists it creates a new ZIP file

  // increase script timeout value
  ini_set('max_execution_time', 5000);

  // create object
  $zip = new ZipArchive();

  // open archive 
  if ($zip->open($fileName, ZIPARCHIVE::CREATE) !== TRUE) {
      die ("Could not open archive");
  }

  // initialize an iterator
  // pass it the directory to be processed
  $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder));

  // iterate over the directory
  // add each file found to the archive
  foreach ($iterator as $key=>$value) {
      $index=strpos(strrev($key), '.');
      if ($index === 0) {
        continue;
      }
      echo "<br/>process: ".$key;
      $zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
  }

  // close and save archive
  $zip->close();
  echo "<br/>Archive created successfully.";

}
///////////////////////////////

function createZipFromDir($dir, $zip_file) {
    $zip = new ZipArchive;
    if (true !== $zip->open($zip_file, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE)) {
        return false;
    }
    zipDir($dir, $zip);
    return $zip;
}

function zipDir($dir, $zip, $relative_path = DIRECTORY_SEPARATOR) {
    $dir = rtrim($dir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            if (is_file($dir . $file)) {
                $zip->addFile($dir . $file, $file);
            } elseif (is_dir($dir . $file)) {
                zipDir($dir . $file, $zip, $relative_path . $file);
            }
        }
    }
    closedir($handle);
}

$file="";
if(isset($_REQUEST['file'])) {
	$file = $_REQUEST['file'];
}

$name="testZip.zip";
if(isset($_REQUEST['name'])) {
	$name = $_REQUEST['name'];
}


if(strlen($file) !== 0) {
  
  
 // createZipFromDir($file, 'test.zip');
 
 addZip($name, $file);
  
  /**
  $zip = new ZipArchive;
  $res = $zip->open('test.zip', ZipArchive::CREATE);
  if ($res === TRUE) {
   //   $zip->addFromString('test.txt', 'file content goes here');
      $zip->addFile($file);
      $zip->close();
      echo 'ok';
  } else {
      echo 'failed';
  }
  * 
  */

} else {
  echo 'Please, add the file to make zip.';
}

?>
