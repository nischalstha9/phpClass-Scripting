<?php
function factorial($num)
{
    if ($num < 2) {
        return 1;
    }
    return $num * factorial($num - 1);
}

$num = 5;

echo "Factorial of $num is " . factorial($num);
