<?php

/** 
 * D&C method
 * @see https://www.geeksforgeeks.org/binary-search/
 */

function binarySearch(array $arr, int $l, int $r, int $x): int
{
    if ($l<=$r) {
        $m = ceil($r- (($r-$l)/2));

        if ($x<$arr[$m]) {
            return binarySearch($arr, $l, $m-1, $x);
        }
        if ($x>$arr[$m]) {
            return binarySearch($arr, $m+1, $r, $x);
        }
        return $m;
    }
    return -1;
}

// Driver Code 
$arr = [2, 3, 4, 10, 40]; 
$n = count($arr); 
$x = 10; // index 3

$result = binarySearch($arr, 0, $n - 1, $x); 

validates($result, 3);
