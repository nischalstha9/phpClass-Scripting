<?php
$file = "example.txt";
if ($handle = fopen($file, 'w')) {
    fwrite($handle, " I am awesome!");
    fclose($handle);
} else {
    echo "Error opening file!";
}
