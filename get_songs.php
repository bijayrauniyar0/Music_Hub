<?php
$directory = "./songs";
$files = scandir($directory);
$fileNames = array();

foreach($files as $file) {
    if($file != '.' && $file != '..') {
        $fileNames[] = $file;
    }
}

echo json_encode($fileNames);
?>
