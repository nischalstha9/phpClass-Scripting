<?php
function isPrime($num)
{
    $prime = true;
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i == 0) {
            $prime = false;
        }
    }
    return $prime;
}
echo isPrime(7) ? "7 is prime number" : "7 is not prime number";
