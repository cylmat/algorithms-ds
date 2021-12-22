<?php
/**
 * Get maximum value of an array
 * 
 * - recursive
 * 
 * ref: https://www.geeksforgeeks.org/c-program-find-largest-element-array/
 */

// return max value of array
function getMax(array $array, int $n): int
{
    if($n==0) {
        return $array[0];
    }
    
    $current = $array[$n-1];
    $previous = getMax($array, $n-1);
    
    return max($current, $previous); 
}

$input = [52,85,23,98,71,34];
$res = getMax($input, count($input));
$expect = 98;

validates ($res, $expect);
