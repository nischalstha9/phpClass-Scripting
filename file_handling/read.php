<?php
$file = "example.txt";
if ($handle = fopen($file, 'r')) {
    echo "File Size is " . filesize($file);
    echo "<br>";
    echo $content = fread($handle, filesize($file));
    fclose($handle);
} else {
    echo "Error opening file!";
}
